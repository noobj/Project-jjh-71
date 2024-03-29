<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBookController extends Controller
{
    public function addBook() {     //add a new book

        return back();
    }

    public function manageBook() {  //switch case "action" & update or delete

        return redirect()->route('home.admin.index');
    }
}
