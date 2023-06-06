<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeanimal extends Model
{
    protected $table = 'typeanimals';

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
