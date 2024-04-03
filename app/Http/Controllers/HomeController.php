<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Record;
use App\Models\Category;
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
            $viewData['allData'] = Book::all();
            $viewData['categories'] = Category::all();
            
            if (Auth::user()) {
                $viewData['borrow'] = Record::where(['user_id' => Auth::user()->getId(), 'status' => 0])->get();
                $borrowingBookId = array();
                
                foreach($viewData['borrow'] as $record) {
                    $borrowingBookId[] = $record->getBookId();
                }
                $viewData['data'] = $viewData['data']->filter(function($book) use ($borrowingBookId) {
                    return (!in_array($book->getId(), $borrowingBookId) && $book->getQuantity() > 0);
                });
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

            $newRecord->setStatus(0);
            $newRecord->save();

            $book = Book::findOrFail($id);
            $book->setQuantity($book->getQuantity() - 1);
            $book->save();
        }
        return back();
    }

    public function return($record_id) {  //change record status & increase book quantity by 1
        if (Auth::user()) {
            $record = Record::findOrFail($record_id);
            $book = Book::findOrFail($record->getBookId());

            $now = new DateTime();
            $now->format('Y-m-d H:i:s');
            
            $record->setStatus(1);
            $record->setReturnedDate($now);
            $record->save();

            $book->setQuantity($book->getQuantity() + 1);
            $book->save();
        }
        return back();
    }
}

?>