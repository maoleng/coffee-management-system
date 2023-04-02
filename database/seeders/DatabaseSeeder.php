<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\AdminRole;
use App\Enums\OrderStatus;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Image;
use App\Models\Import;
use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

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
        $this->createOrders(10);

    }

    private function createOrders($count): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= $count; $i++) {
            $order = Order::query()->create([
                'name' => $faker->name,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'status' => OrderStatus::getRandomValue(),
                'total' => 0,
                'ordered_at' => now(),
            ]);

            $total = 0;
            $products = Product::query()->get();
            foreach ($products as $product) {
                $amount = $faker->numberBetween(1, 5);
                $total += $product->price * $amount;
                DB::table('order_products')->insert([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'amount' => $amount,
                    'price' => $product->price,
                ]);
            }
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
        foreach ($products as $product) {
            $price = (int) ($product->price - ($product->price / random_int(1, 10)));
            $amount = $faker->numberBetween(50, 200);
            $total += $price * $amount;
            DB::table('import_products')->insert([
                'import_id' => $import->id,
                'product_id' => $product->id,
                'amount' => $amount,
                'price' => $price,
            ]);
        }
        $import->update(['total' => $total]);
    }

    private function createProducts($count): void
    {
        $faker = Faker::create();
        $category_ids = Category::query()->inRandomOrder()->get()->pluck('id')->toArray();
        for ($i = 1; $i <= $count; $i++) {
            Product::query()->create([
                'name' => $faker->name,
                'price' => $faker->numberBetween(50000, 100000),
                'description' => $faker->text,
                'expire_month' => $faker->numberBetween(12, 24),
                'category_id' => $faker->randomElement($category_ids),
            ]);
        }

    }

    private function createImages(): void
    {
        $faker = Faker::create();

        $products = Product::query()->get();
        foreach ($products as $product) {
            $count = random_int(2, 4);
            for ($i = 1; $i <= $count; $i++) {
                Image::query()->create([
                    'source' => $faker->imageUrl(1200, 1200),
                    'product_id' => $product->id,
                ]);
            }
        }
    }

    private function createSuppliers($count): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= $count; $i++) {
            Supplier::query()->create([
                'name' => $faker->name,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
            ]);
        }
    }

    private function createCategories($count): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= $count; $i++) {
            Category::query()->create([
                'name' => $faker->name,
            ]);
        }
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
