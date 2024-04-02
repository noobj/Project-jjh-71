<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Record;
use DateTime;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller 
{

    public function index() {   //get all books and display
        if (Auth::user() && Auth::user()->getRole() == 'admin') {
            return redirect()->route('home.admin.index');
        } else {
            $viewData = array();
            $viewData['data'] = Book::all();
            
            if (Auth::user()) {
                $viewData['borrow'] = Record::where('user_id', Auth::user()->getId())->get()->toArray();
            }
            return view('home.index')->with('viewData', $viewData);
        }

    }

    public function borrow($id) {  //Add a new record & reduce book quantity by 1
        if (Auth::user()) {
            $newRecord = new Record();
            $newRecord->setUserId(Auth::user()->getId());
            $newRecord->setBookId($id);

            $now = new DateTime();
            $now->format('Y-m-d H:i:s');
            $newRecord->setBorrowedDate($now);

            $newRecord->setReturnedDate();      //PUT SOMETHING IN HERE
            $newRecord->setStatus('borrowing');
            $newRecord->save();

            $book = Book::findOrFail($id);
            $book->setQuantity($book->getQuantity() - 1);
            $book->save();
        }
        return back();
    }

    public function return() {  //change record status & increase book quantity by 1
        if (Auth::user()) {

        }
        return back();
    }
}

?>