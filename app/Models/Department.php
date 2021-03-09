<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /**
     * Get the sections for the department
     */
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
