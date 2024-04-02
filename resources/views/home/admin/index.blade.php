@extends('layouts.adminapp')
@section('content')
<h2 class="admin-welcome">Welcome Admin. This is where you can manage the books in our library</h2>
<div class="home-container">
    @if (count($viewData['data']) == 0)
        <p style="text-align: center; font-size: 1.2em; color: red">There is no books in our library right now. Please add a book</p>
    @else
    @foreach ($viewData['data'] as $book)
    <div class="admin-book">
        <img src="{{'https://covers.openlibrary.org/b/isbn/'.$book->getIsbn().'.jpg'}}" alt="{{$book->getName()}}"></img>
        <div class="book-info">
            <h2 class="book-title">{{$book->getName()}}</h2>
            <p><strong>Author: </strong>{{$book->getAuthor()}}</p>
            <p><strong>ISBN: </strong>{{$book->getIsbn()}}</p>
            <p><strong>Category: </strong>{{$book->getCategory()}}</p>
            <p><strong>Current Quantity: </strong>{{$book->getQuantity()}}</p>
        </div>
        <a class="manage-btn" href="{{ route('home.admin.showManage', $book->getId()) }}"><strong>Manage</strong></a>
    </div>
    @endforeach
    @endif
</div>
    
@endsection