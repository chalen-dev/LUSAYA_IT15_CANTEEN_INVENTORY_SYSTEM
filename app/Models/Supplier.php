<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'id',
        'supplier_code', //unique
        'supplier_name',
        'contact_email', //unique
        'contact_number',
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'stock_entries')
            ->withPivot('quantity', 'delivery_reference')
            ->withTimestamps();
    }

    public function stockEntries()
    {
        return $this->hasMany(StockEntry::class);
    }
}
