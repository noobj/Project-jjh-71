<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBookController extends Controller
{
    public function addBook(Request $request) {
        Book::validate($request);
        $client = new \GuzzleHttp\Client();
        $url = "https://openlibrary.org/search.json?q=";
        $title = str_replace(' ', '+', $request->post('name'));
        $url .= $title;
        $response = $client->request('GET', $url);
        $body = json_decode($response->getBody()->getContents(), true); // '{"id": 1420053, "name": "guzzle", ...}'
        $author = $body['docs'][0]['author_name'][0];
        $isbn = $request->post('isbn');
        $isbn_url ="https://www.googleapis.com/books/v1/volumes?q=isbn:".$isbn;
        $isbn_response = $client->request('GET',$isbn_url);
        $body_isbn = json_decode($isbn_response->getBody()->getContents(),true);
        $name = $body_isbn['items'][0]['volumeInfo']['title'];

        Book::create([
            'title' => $name,
            'description' => $request->post('description'),
            'isbn' => $request->post('isbn'),
            'author' => $author,
            'quantity' => $request->post('quantity'),
            'category_id' => $request->post('category'),
        ]);

        return redirect()->route('home.admin.index');
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
