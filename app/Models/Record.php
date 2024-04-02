<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $casts = [
        'borrowed_date' => 'datetime',
        'returned_date' => 'datetime',
    ];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($id)
    {
        $this->attributes['user_id'] = $id;
    }

    public function getBookId()
    {
        return $this->attributes['book_id'];
    }

    public function setBookId($id)
    {
        $this->attributes['book_id'] = $id;
    }

    public function getBorrowedDate()
    {
        return $this->attributes['borrowed_date'];
    }

    public function setBorrowedDate($date)
    {
        $this->attributes['borrowed_date'] = $date;
    }

    public function getReturnedDate()
    {
        return $this->attributes['returned_date'];
    }

    public function setReturnedDate($date)
    {
        $this->attributes['returned_date'] = $date;
    }

    public function getStatus()
    {
        return $this->attributes['status'];
    }

    public function setStatus($status)
    {
        $this->attributes['status'] = $status;
    }

}
