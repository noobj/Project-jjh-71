@extends('layouts.adminapp')
@section('content')
<h2 class="admin-welcome">Welcome Admin. This is where you can manage the books in our library</h2>
<div class="home-container">
    @if (empty(json_decode($viewData['data'], true)))
        <p style="text-align: center; font-size: 1.2em; color: red">There is no books in our library right now. Please add a book</p>
    @else
    @foreach (json_decode($viewData['data'], true) as $book)
    <div class="card">
        <img src={{'https://covers.openlibrary.org/b/isbn/' . $book['isbn'] . '.jpg'}} alt={{$book['name']}}></img>
        <div class="book-info">
            <h2 class="book-title">{{$book['name']}}</h2>
            <p><strong>Author: </strong>{{$book['author']}}</p>
            <p><strong>ISBN: </strong>{{$book['isbn']}}</p>
            <p><strong>Category: </strong>{{$book['category']}}</p>
            <p><strong>Current Quantity: </strong>{{$book['quantity']}}</p>
        </div>
        <a class="manage-btn" href="{{ route('home.admin.showManage', $book['id']) }}"><strong>Manage</strong></a>
    </div>
    @endforeach
    @endif
</div>
    
@endsection