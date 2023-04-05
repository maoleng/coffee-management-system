@extends('admin-theme.master')

@section('title')
    Manage Post
@endsection

@section('breadcrumb')
    Edit post
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="author-info">
                            <h6 class="mb-25"></h6>
                        </div>
                    </div>
                    <form action="{{ route('admin.post.update', ['post' => $post]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="mb-2">
                                    <label class="form-label" for="blog-edit-title">Title</label>
                                    <input name="title" value="{{ $post->title }}" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <label class="form-label" for="blog-edit-category">Category</label>
                                    <select name="category" id="blog-edit-category" class="select2 form-select">
                                        @foreach ($categories as $key => $category)
                                            <option @if ($key === $post->category) selected @endif value="{{ $key }}">{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <label class="form-label" for="blog-edit-category">Tags</label>
                                    <select name="tags[]" class="select2 form-select" multiple="multiple">
                                        @foreach ($tags as $tag)
                                            <option @if (in_array($tag->id, $post_tag_ids, true)) selected @endif>{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="border rounded p-2">
                                    <h4 class="mb-1">Banner</h4>
                                    <div class="d-flex flex-column flex-md-row">
                                        <img src="{{ $post->banner }}" id="blog-feature-image" class="rounded me-2 mb-1 mb-md-0" width="170" height="110" alt="Put images here" />
                                        <div class="featured-info">
                                            <small class="text-muted">Required image size lower than 10mb.</small>
                                            <p class="my-50">
                                                <a href="#">Allow 1 image only</a>
                                            </p>
                                            <div class="d-inline-block">
                                                <input name="banner" class="form-control" type="file" id="blogCustomFile" accept="image/*"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-50">
                                <div class="mb-2">
                                    <label class="form-label" for="blog-edit-slug">Content</label>
                                    <textarea name="content" id="myeditorinstance">{!! $post->content !!}</textarea>
                                </div>
                            </div>
                            <div class="col-12 mt-50">
                                <button type="submit" class="btn btn-primary me-1">Save</button>
                                <a href="{{ route('admin.post.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor_style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
@endsection

@section('page_vendor_script')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>

    <script src="{{ asset('app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
@endsection

@section('page_script')
    <script>
        $(document).ready(function() {
            const blogImageInput = $('#blogCustomFile');
            const blogFeatureImage = $('#blog-feature-image');
            const blogImageText = document.getElementById('blog-image-text');
            if (blogImageInput.length) {
                $(blogImageInput).on('change', function (e) {
                    const reader = new FileReader(),
                        files = e.target.files;
                    reader.onload = function () {
                        if (blogFeatureImage.length) {
                            blogFeatureImage.attr('src', reader.result);
                        }
                    };
                    reader.readAsDataURL(files[0]);
                    blogImageText.innerHTML = blogImageInput.val();
                });
            }
        })
    </script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/free/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance',
{{--            @if (isDarkMode())--}}
            content_css: 'tinymce-5-dark',
            skin: 'oxide-dark',
{{--            @endif--}}
            height: 270,
            plugins: 'advcode table checklist image advlist autolink lists link charmap preview codesample imagetool fullscreen',
            toolbar: 'insertfile | blocks| bold italic | fullscreen | image | link | preview | codesample | bullist numlist checklist |  alignleft aligncenter alignright',
            menubar: 'insert view',
            mobile: {
                menubar: true
            },
            setup: function(editor) {
                editor.on('init', function (e) {
                    setTimeout(function() {
                        $("button[tabindex='-1'].tox-notification__dismiss.tox-button.tox-button--naked.tox-button--icon")[0].click()
                    }, 10);

                })
            },
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input')
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*')
                input.onchange = function () {
                    var file = this.files[0];
                    var reader = new FileReader()
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime()
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache
                        var base64 = reader.result.split(',')[1]
                        var blobInfo = blobCache.create(id, file, base64)
                        blobCache.add(blobInfo)
                        cb(blobInfo.blobUri(), { title: file.name })
                    }
                    reader.readAsDataURL(file)
                }
                input.click()
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script>
@endsection
