<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    /**
     * Get the department that owns the section.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the orders for the section
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
