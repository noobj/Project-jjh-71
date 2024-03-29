<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller 
{

    public function index() {   //get all books and display
        if (Auth::user() && Auth::user()->getRole() == 'admin') {
            return redirect()->route('home.admin.index');
        } else {
            $viewData = array();
            $viewData['data'] = Book::all();
           return view('home.index')->with('viewData', $viewData);
        }

    }

    public function borrow() {  //check quantity, add a new record & reduce book quantity by 1

        return back();
    }

    public function return() {  //change record status & increase book quantity by 1

        return back();
    }
}

?>