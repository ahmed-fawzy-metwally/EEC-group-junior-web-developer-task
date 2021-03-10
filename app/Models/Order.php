<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    

    protected $guarded = [];

    /**
     * The products that belong to the ordedr.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity','price', 'comment');
    }

    /**
     * Get the section that have the order.
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * Get the user that have the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
