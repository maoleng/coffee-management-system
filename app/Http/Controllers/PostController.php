<?php

namespace App\Http\Controllers;

use App\Enums\AdminRole;
use App\Enums\OrderStatus;
use App\Enums\PostCategory;
use App\Enums\SupportStatus;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PromotionRequest;
use App\Jobs\SendMail;
use App\Mail\MailCustomerCare;
use App\Models\Admin;
use App\Models\Post;
use App\Models\Promotion;
use App\Models\Support;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index(Request $request): View
    {
        $data = $request->all();
        $builder = Post::query();
        if (isset($data['category'])) {
            $builder->where('category', $data['category']);
        }
        if (isset($data['created_at'])) {
            $split = explode(',', $data['created_at']);
            $builder->whereBetween('created_at', [$split[0], $split[1]]);
        }
        if (isset($data['q'])) {
            $builder->where(function ($q) use ($data) {
                $q->orWhere('title', 'LIKE', "%{$data['q']}%")
                    ->orWhere('category', 'LIKE', "%{$data['q']}%")
                    ->orWhere('created_at', 'LIKE', "%{$data['q']}%");
            });
        }
        $posts = $builder->orderByDesc('created_at')->paginate(12);

        return view('admin.post.index', [
            'posts' => $posts,
            'categories' => PostCategory::getDescriptions(),
        ]);
    }

    public function create(): View
    {
        $categories = PostCategory::getDescriptions();
        $tags = Tag::query()->get();

        return view('admin.post.create', [
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    public function edit(Post $post): View
    {
        $categories = PostCategory::getDescriptions();
        $tags = Tag::query()->get();
        $post_tag_ids = $post->postTags->pluck('id')->toArray();

        return view('admin.post.edit', [
            'categories' => $categories,
            'tags' => $tags,
            'post' => $post,
            'post_tag_ids' => $post_tag_ids,
        ]);
    }

    public function store(PostRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $post = Post::query()->create([
            'title' => $data['title'],
            'content' => '',
            'banner' => '',
            'category' => $data['category'],
            'admin_id' => authed()->id,
            'created_at' => now(),
        ]);
        $post->update([
            'content' => $this->handleImageInContent($data['content'], $post->id),
            'banner' => $this->handleBanner($data['banner'], $post->id),
        ]);

        $this->handleTags($data['tags'] ?? [], $post);

        return redirect()->route('admin.post.index');
    }


    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $data = $request->validated();
        $update_data = [
            'title' => $data['title'],
            'category' => $data['category'],
        ];
        if ($data['content'] !== $post->content) {
            $update_data['content'] = $this->handleImageInContent($data['content'], $post->id);
        }
        if (isset($data['banner'])) {
            $update_data['banner'] = $this->handleBanner($data['banner'], $post->id);
        }
        $post->update($update_data);
        $this->handleTags($data['tags'] ?? [], $post);

        return redirect()->route('admin.post.index');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->postTags()->sync([]);
        $post->delete();

        return redirect()->back();
    }

    private function handleTags($input_tags, Post $post): void
    {
        $tags = Tag::query()->whereIn('name', $input_tags)->get();
        $old_tags = $tags->pluck('name')->toArray();
        $new_tags = array_map(static function ($new_tag) {
            return [
                'id' => Str::uuid()->toString(),
                'name' => $new_tag,
            ];
        }, array_diff($input_tags, $old_tags));
        Tag::query()->insert($new_tags);

        $tag_ids = $tags->pluck('id')->merge(array_column($new_tags, 'id'))->toArray();
        $post->postTags()->sync($tag_ids);

        Tag::query()->doesntHave('postTags')->delete();
    }

    private function handleBanner(UploadedFile $banner, $post_id): string
    {
        $path = "posts/$post_id/.{$banner->getClientOriginalExtension()}";
        Storage::disk('google')->put($path, $banner->getContent());
        $source = Storage::disk('google')->url($path);

        return str_replace('&export=media', '', $source);
    }

    private function handleImageInContent($mail_content, $post_id)
    {
        preg_match_all('/data:image\/[A-Za-z-]+;base64.[A-Za-z+\/0-9=]+/', $mail_content, $matches, PREG_OFFSET_CAPTURE);
        $images = $matches[0];
        if (isset($images)) {
            foreach ($images as $image) {
                $content = base64_decode(explode(';base64,', $image[0])[1]);
                $mime = $this->getMimeType($image[0]);
                if (empty($mime)) {
                    session()->flash('message', 'Sai thể loại ảnh');

                    return redirect()->back();
                }
                $path = '/posts/' . $post_id . '/'. Str::random(15) . '.' . $mime;
                Storage::disk('google')->put($path, $content);
                $source = Storage::disk('google')->url($path);
                $source = str_replace('&export=media', '', $source);
                $mail_content = str_replace($image[0], $source, $mail_content);
            }
        }

        return $mail_content;
    }

    private function getMimeType($base64): ?string
    {
        if (str_starts_with($base64, 'data:image/bmp')) {
            return 'bmp';
        }
        if (str_starts_with($base64, 'data:image/jpeg')) {
            return 'jpg';
        }
        if (str_starts_with($base64, 'data:image/png')) {
            return 'png';
        }
        if (str_starts_with($base64, 'data:image/x-icon')) {
            return 'ico';
        }
        if (str_starts_with($base64, 'data:image/webp')) {
            return 'webp';
        }
        if (str_starts_with($base64, 'data:image/gif')) {
            return 'gif';
        }

        return null;
    }


}
