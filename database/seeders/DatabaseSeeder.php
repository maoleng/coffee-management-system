<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\AdminRole;
use App\Enums\OrderStatus;
use App\Enums\PostCategory;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Image;
use App\Models\Import;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Supplier;
use App\Models\Support;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->createDefault();
        $this->createCategories(5);
        $this->createSuppliers(3);
        $this->createProducts(50);
        $this->createImages();
        $this->createImports();
        $this->createOrders(25);
        $this->createSupports(25);
        $this->createPromotions(25);
        $this->createPosts(25);
    }


    private function createOrders($count): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= $count; $i++) {
            $order = Order::query()->create([
                'name' => $faker->name,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'status' => OrderStatus::getRandomValue(),
                'total' => 0,
                'ordered_at' => now(),
            ]);

            $total = 0;
            $products = Product::query()->get();
            $data = [];
            foreach ($products as $product) {
                $amount = $faker->numberBetween(1, 5);
                $total += $product->price * $amount;
                $data[] = [
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'amount' => $amount,
                    'price' => $product->price,
                ];
            }
            DB::table('order_products')->insert($data);
            $order->update(['total' => $total]);
        }
    }

    private function createImports(): void
    {
        $faker = Faker::create();
        $import = Import::query()->create([
            'total' => 0,
            'admin_id' => Admin::query()->first()->id,
            'supplier_id' => Supplier::query()->first()->id,
            'created_at' => now(),
        ]);

        $total = 0;
        $products = Product::query()->get();
        $data = [];
        foreach ($products as $product) {
            $price = (int) ($product->price - ($product->price / random_int(1, 10)));
            $amount = $faker->numberBetween(50, 200);
            $total += $price * $amount;
            $data[] = [
                'import_id' => $import->id,
                'product_id' => $product->id,
                'amount' => $amount,
                'price' => $price,
            ];
        }
        DB::table('import_products')->insert($data);
        $import->update(['total' => $total]);
    }

    private function createProducts($count): void
    {
        $faker = Faker::create();
        $category_ids = Category::query()->inRandomOrder()->get()->pluck('id')->toArray();
        $data = [];
        for ($i = 1; $i <= $count; $i++) {
            $data[] = [
                'id' => Str::uuid(),
                'name' => $faker->name,
                'price' => $faker->numberBetween(50000, 100000),
                'description' => $faker->text,
                'expire_month' => $faker->numberBetween(12, 24),
                'category_id' => $faker->randomElement($category_ids),
            ];
        }
        Product::query()->insert($data);
    }

    private function createImages(): void
    {
        $faker = Faker::create();

        $products = Product::query()->get();
        $data = [];
        foreach ($products as $product) {
            $count = random_int(2, 4);
            for ($i = 1; $i <= $count; $i++) {
                $data[] = [
                    'id' => Str::uuid(),
                    'source' => $faker->imageUrl(1200, 1200),
                    'product_id' => $product->id,
                ];
            }
        }
        Image::query()->insert($data);
    }

    private function createSuppliers($count): void
    {
        $faker = Faker::create();

        $data = [];
        for ($i = 1; $i <= $count; $i++) {
            $data[] = [
                'id' => Str::uuid(),
                'name' => $faker->name,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
            ];
        }
        Supplier::query()->insert($data);
    }

    private function createSupports($count): void
    {
        $faker = Faker::create();
        $admin_id = Admin::query()->first()->id;
        $data = [];
        for ($i = 1; $i <= $count; $i++) {
            $is_response = (bool) random_int(0, 2);
            $data[] = [
                'id' => Str::uuid(),
                'name' => $faker->name,
                'email' => $faker->email,
                'content' => $faker->text,
                'response' => $is_response ? $faker->text : null,
                'status' => $is_response,
                'admin_id' => $is_response ? $admin_id : null,
                'created_at' => $faker->dateTime,
            ];
        }
        Support::query()->insert($data);
    }

    private function createPosts($count): void
    {
        $faker = Faker::create();
        $admin_id = Admin::query()->first()->id;
        $data = [];
        for ($i = 1; $i <= $count; $i++) {
            $data[] = [
                'id' => Str::uuid(),
                'title' => $faker->sentence(random_int(6, 10)),
                'content' => $faker->randomHtml,
                'banner' => $faker->imageUrl(750, 300),
                'category' => PostCategory::getRandomValue(),
                'admin_id' => $admin_id,
                'created_at' => $faker->dateTime,
            ];
        }
        Post::query()->insert($data);
    }

    private function createPromotions($count): void
    {
        $faker = Faker::create();
        $data = [];
        for ($i = 1; $i <= $count; $i++) {
            $created_at = $faker->dateTime;
            $data[] = [
                'id' => Str::uuid(),
                'name' => $faker->name,
                'description' => $faker->text,
                'code' => strtoupper(Str::random(10)),
                'percent' => random_int(5, 50),
                'active' => (bool) random_int(0, 1),
                'created_at' => $created_at,
                'expired_at' => Carbon::make($created_at)->addDays(random_int(3, 30)),
            ];
        }
        Promotion::query()->insert($data);
    }

    private function createCategories($count): void
    {
        $faker = Faker::create();

        $data = [];
        for ($i = 1; $i <= $count; $i++) {
            $data[] = [
                'id' => Str::uuid(),
                'name' => $faker->name,
            ];
        }
        Category::query()->insert($data);
    }

    private function createDefault(): void
    {
        Admin::query()->create([
            'name' => 'Mao Leng',
            'email' => 'feature451@gmail.com',
            'avatar' => '',
            'role' => AdminRole::ADMIN,
            'active' => true,
            'created_at' => now(),
        ]);

    }
}
