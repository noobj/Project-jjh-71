<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBookController extends Controller
{
    public function addBook(Request $request) {
        // TODO: validation input


        // TODO: fetch author name from api
        return Book::create([
            'title' => $request->post('name'),
            'description' => $request->post('description'),
            'isbn' => $request->post('isbn'),
            'author' => 'Fetched from API',
            'quantity' => $request->post('quantity'),
            'category_id' => $request->post('category'),
        ]);
    }

    public function manageBook(Request $request, $id) {  //switch case "action" & update or delete
        if ($request->input('action') == 'update') {
            Book::validate($request);
            
            $book = Book::findOrFail($id);
            $book->setName($request->input('name'));
            $book->setCategory($request->input('category'));
            $book->setDesc($request->input('description'));
            $book->setQuantity($request->input('quantity'));
            $book->setIsbn($request->input('isbn'));
            $book->save();
        }
        else if ($request->input('action') == 'delete') {
            Book::destroy($id);
        }
        return redirect()->route('home.admin.index');
    }
}
