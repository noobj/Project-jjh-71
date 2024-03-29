<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller 
{

    public function index() {   //get all books and display
        if (Auth::user() && Auth::user()->getRole() == 'admin') {
            return redirect()->route('home.admin.index');
        } else {
            $viewData = array();
            $viewData['data'] = json_encode(array('book1' => array('id' => 1, 'isbn' => '0385121679', 'name' => 'The Shining', 'category' => 'horror', 'description' => 'horror book', 'quantity' => 5, 'author' => 'Stephen King')));

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