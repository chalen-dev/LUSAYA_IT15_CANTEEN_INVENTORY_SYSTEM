<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Original 5
            [
                'product_code' => 'PROD001',
                'product_name' => 'Laptop',
                'price' => 999.99,
                'current_stock' => 10,
            ],
            [
                'product_code' => 'PROD002',
                'product_name' => 'Mouse',
                'price' => 19.99,
                'current_stock' => 50,
            ],
            [
                'product_code' => 'PROD003',
                'product_name' => 'Keyboard',
                'price' => 49.99,
                'current_stock' => 30,
            ],
            [
                'product_code' => 'PROD004',
                'product_name' => 'Monitor',
                'price' => 199.99,
                'current_stock' => 15,
            ],
            [
                'product_code' => 'PROD005',
                'product_name' => 'USB Cable',
                'price' => 5.99,
                'current_stock' => 100,
            ],

            // Additional 10
            [
                'product_code' => 'PROD006',
                'product_name' => 'HDMI Cable',
                'price' => 9.99,
                'current_stock' => 75,
            ],
            [
                'product_code' => 'PROD007',
                'product_name' => 'Wireless Headphones',
                'price' => 79.99,
                'current_stock' => 25,
            ],
            [
                'product_code' => 'PROD008',
                'product_name' => 'External Hard Drive 1TB',
                'price' => 59.99,
                'current_stock' => 20,
            ],
            [
                'product_code' => 'PROD009',
                'product_name' => 'Webcam',
                'price' => 39.99,
                'current_stock' => 15,
            ],
            [
                'product_code' => 'PROD010',
                'product_name' => 'USB Hub',
                'price' => 14.99,
                'current_stock' => 40,
            ],
            [
                'product_code' => 'PROD011',
                'product_name' => 'Laptop Stand',
                'price' => 29.99,
                'current_stock' => 12,
            ],
            [
                'product_code' => 'PROD012',
                'product_name' => 'Bluetooth Speaker',
                'price' => 34.99,
                'current_stock' => 18,
            ],
            [
                'product_code' => 'PROD013',
                'product_name' => 'MicroSD Card 64GB',
                'price' => 12.99,
                'current_stock' => 60,
            ],
            [
                'product_code' => 'PROD014',
                'product_name' => 'Gaming Chair',
                'price' => 249.99,
                'current_stock' => 5,
            ],
            [
                'product_code' => 'PROD015',
                'product_name' => 'Mechanical Keyboard',
                'price' => 89.99,
                'current_stock' => 8,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
