<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function getId() {
        return $this->attributes['id'];
    }

    public function getName()
    {
        return $this->attributes['categoryName'];
    }
}
