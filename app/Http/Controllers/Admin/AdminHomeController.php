<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    public function index() {
        $viewData = array();
        $viewData['data'] = Book::all();
        $viewData['categories'] = Category::all();
        return view('home.admin.index')->with('viewData', $viewData);
    }

    public function showAdd() {

        $viewData = array();
        $viewData['categories'] = Category::all();
        return view('home.admin.add')->with('viewData', $viewData);
    }

    public function showManage($id) {
        
        $viewData = array();
        $viewData['data'] = Book::findOrFail($id);
        $viewData['categories'] = Category::all();
        return view('home.admin.manage')->with('viewData', $viewData);
    }
}
