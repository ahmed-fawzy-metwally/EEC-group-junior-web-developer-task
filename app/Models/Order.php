<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    /**
     * The products that belong to the ordedr.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity','price');
    }

    /**
     * Get the department that have the order.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
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
