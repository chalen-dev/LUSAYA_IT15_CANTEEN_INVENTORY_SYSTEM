<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'supplier_code' => 'SUP001',
                'supplier_name' => 'Tech Distributors Inc.',
                'contact_email' => 'info@techdistributors.com',
                'contact_number' => '+1-800-555-0101',
            ],
            [
                'supplier_code' => 'SUP002',
                'supplier_name' => 'Global Electronics Ltd.',
                'contact_email' => 'sales@globalelectronics.co.uk',
                'contact_number' => '+44-20-7946-0123',
            ],
            [
                'supplier_code' => 'SUP003',
                'supplier_name' => 'Computer Parts Direct',
                'contact_email' => 'orders@compartsdirect.com',
                'contact_number' => '+1-888-555-0199',
            ],
            [
                'supplier_code' => 'SUP004',
                'supplier_name' => 'Asia Tech Supplies',
                'contact_email' => 'contact@asiatech.cn',
                'contact_number' => '+86-10-1234-5678',
            ],
            [
                'supplier_code' => 'SUP005',
                'supplier_name' => 'Office & Computer Solutions',
                'contact_email' => 'info@officecomp.com',
                'contact_number' => '+1-877-555-0234',
            ],
            [
                'supplier_code' => 'SUP006',
                'supplier_name' => 'Networking Gear Co.',
                'contact_email' => 'support@networkinggear.de',
                'contact_number' => '+49-30-901820',
            ],
            [
                'supplier_code' => 'SUP007',
                'supplier_name' => 'Mobile Accessories Wholesale',
                'contact_email' => 'sales@mobileaccessories.in',
                'contact_number' => '+91-22-6789-1234',
            ],
            [
                'supplier_code' => 'SUP008',
                'supplier_name' => 'Printer & Supply Ltd.',
                'contact_email' => 'customerservice@printersupply.com',
                'contact_number' => '+1-800-555-0345',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}
