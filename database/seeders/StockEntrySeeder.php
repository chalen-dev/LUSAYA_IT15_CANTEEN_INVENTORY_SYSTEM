<?php

namespace Database\Seeders;

use App\Models\StockEntry;
use App\Models\Product;
use Illuminate\Database\Seeder;

class StockEntrySeeder extends Seeder
{
    public function run(): void
    {
        // Define stock entries
        $entries = [
            [
                'product_id' => 1,
                'supplier_id' => 1,
                'quantity' => 5,
                'delivery_reference' => 'DEL-2023-001',
            ],
            [
                'product_id' => 2,
                'supplier_id' => 2,
                'quantity' => 20,
                'delivery_reference' => 'DEL-2023-002',
            ],
            [
                'product_id' => 3,
                'supplier_id' => 1,
                'quantity' => 10,
                'delivery_reference' => 'DEL-2023-003',
            ],
            [
                'product_id' => 4,
                'supplier_id' => 3,
                'quantity' => 5,
                'delivery_reference' => 'DEL-2023-004',
            ],
            [
                'product_id' => 5,
                'supplier_id' => 4,
                'quantity' => 50,
                'delivery_reference' => 'DEL-2023-005',
            ],
            [
                'product_id' => 6,
                'supplier_id' => 5,
                'quantity' => 30,
                'delivery_reference' => 'DEL-2023-006',
            ],
            [
                'product_id' => 7,
                'supplier_id' => 6,
                'quantity' => 10,
                'delivery_reference' => 'DEL-2023-007',
            ],
            [
                'product_id' => 8,
                'supplier_id' => 7,
                'quantity' => 15,
                'delivery_reference' => 'DEL-2023-008',
            ],
            [
                'product_id' => 9,
                'supplier_id' => 8,
                'quantity' => 5,
                'delivery_reference' => 'DEL-2023-009',
            ],
            [
                'product_id' => 10,
                'supplier_id' => 2,
                'quantity' => 25,
                'delivery_reference' => 'DEL-2023-010',
            ],
        ];

        foreach ($entries as $entry) {
            // Create stock entry
            $stockEntry = StockEntry::create($entry);

            // Update product current stock
            $product = Product::find($entry['product_id']);
            if ($product) {
                $product->current_stock += $entry['quantity'];
                $product->save();
            }
        }
    }
}
