<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public static function validate($request){
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "isbn" => "required|numeric|gt:0",
            "quantity" => "required|numeric",
            "category" => "required"
        ]);
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id');
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['title'];
    }

    public function setName($name)
    {
        $this->attributes['title'] = $name;
    }

    public function getAuthor()
    {
        return $this->attributes['author'];
    }

    public function setAuthor($author)
    {
        $this->attributes['author'] = $author;
    }

    public function getIsbn()
    {
        return $this->attributes['isbn'];
    }

    public function setIsbn($isbn)
    {
        $this->attributes['isbn'] = $isbn;
    }

    public function getCategory()
    {
        return $this->attributes['category_id'];
    }

    public function setCategory($category)
    {
        $this->attributes['category_id'] = $category;
    }

    public function getDesc()
    {
        return $this->attributes['description'];
    }

    public function setDesc($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity)
    {
        $this->attributes['quantity'] = $quantity;
    }
}
