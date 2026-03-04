<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'product_code', //unique
        'product_name',
        'price', //decimal
        'current_stock', //int, default 0
    ];

    public function supplier()
    {
        return $this->belongsToMany(Supplier::class, 'stock_entries')
            ->withPivot('quantity', 'delivery_reference')
            ->withTimestamps();
    }

    public function stockEntries()
    {
        return $this->hasMany(StockEntry::class);
    }
}
