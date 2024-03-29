<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    public function index() {
        session_start();
        $_SESSION['username'] = 'admin';
        // unset($_SESSION['username']);

        $viewData = array();
        $viewData['data'] = json_encode(array('book1' => array('id' => 1, 'isbn' => '0385121679', 'name' => 'The Shining', 'category' => 'horror', 'description' => 'horror book', 'quantity' => 5, 'author' => 'Stephen King')));
        return view('home.admin.index')->with('viewData', $viewData);
    }

    public function showAdd() {

        $viewData = array();
        $viewData['categories'] = array();
        return view('home.admin.add')->with('viewData', $viewData);
    }

    public function showManage() {
        
        $viewData = array();
        $viewData['data'] = json_encode(array('book1' => array('id' => 1, 'isbn' => '0385121679', 'name' => 'The Shining', 'category' => 'horror', 'description' => 'horror book', 'quantity' => 5, 'author' => 'Stephen King')));
        $viewData['categories'] = array();
        return view('home.admin.manage')->with('viewData', $viewData);
    }
}
