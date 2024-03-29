@extends('layouts.app')
@section('content')
    <article>
        <section class="main">
            <div class="data">
                <h2 class="book-table-title">Books in Library</h2>
                @if (isset($_GET['action']) && $_GET['action'] == 'detail')
                    @foreach (json_decode($viewData['data'], true) as $book)
                        @if ($book['id'] == $_GET['id'])
                        <div class="detail-board">
                            <div class="detail-header">
                                <h3 class="detail-name"><strong>{{$book['name']}}</strong></h3>
                                <a class="detail-cancel" href="{{ route('home.index') }}">X</a>
                            </div>
                            
                            <table>
                                <tr>
                                    <td class="detail-image"><img class="detail-img" src={{'https://covers.openlibrary.org/b/isbn/' . $book['isbn'] . '.jpg'}} alt={{$book['name']}}></td>
                                    <td class="book-detail">
                                        <strong>Category:</strong> {{$book['category']}}<br>
                                        <strong>Author:</strong> {{$book['author']}}<br>
                                        <strong>Description:</strong> {{$book['description']}}<br>
                                        <strong>Quantity left for borrow:</strong> {{$book['quantity']}}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        @endif
                    @endforeach
                @endif
                
                <table class="book-table">
                    <thead><tr>
                        <th class="table-cover">Cover</th>
                        <th>Title and Author</th>
                        <th>Quantity</th>
                        @if (Auth::user() && Auth::user()->getRole() == 'client')
                            <th>Details</th>
                            <th>Borrow</th>
                        @endif
                    </tr></thead>
                    <tbody>
                        @foreach (json_decode($viewData['data'], true) as $book)
                            <tr>
                                <td class="table-cover"><span><img src={{'https://covers.openlibrary.org/b/isbn/' . $book['isbn'] . '.jpg'}} alt={{$book['name']}}></span></td>
                                <td>
                                    <div class='author'><strong>{{$book['name']}}</strong></div>
                                    
                                    <div>- {{$book['author']}} -</div>
                                </td>
                                <td>{{$book['quantity']}}</td>
                                @if (Auth::user() && Auth::user()->getRole() == 'client')
                                    <td><span class='detail'>
                                        <a href='?action=detail&id={{$book['id']}}'>Detail</a>
                                    </span></td>
                                    <td><span>
                                        <form action="{{ route('home.borrow', $book['id'])}}" method="POST">
                                            @csrf
                                            <button class="borrow">Borrow</button>
                                        </form>
                                    </span></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        <section class="side">
            @if (Auth::user() && Auth::user()->getRole() == 'client')
            <div class="data">
                <h2 class="book-table-title borrow-title">Books borrowing by you</h2>
            <table class="book-table borrow-table">
                <thead><tr>
                    <th class="table-cover">Cover</th>
                    <th>Title and Author</th>
                    <th>Return</th>
                </tr></thead>
                <tbody>
                    @foreach (json_decode($viewData['data'], true) as $book)
                        <tr>
                            <td class="table-cover"><span><img src={{'https://covers.openlibrary.org/b/isbn/' . $book['isbn'] . '.jpg'}} alt={{$book['name']}}></span></td>
                            <td>
                                <div class='author'><strong>{{$book['name']}}</strong></div>
                                    
                                <div>- {{$book['author']}} -</div>
                            </td>
                            <td><span>
                                <form action="{{ route('home.return', $book['id'])}}" method="POST">
                                    @csrf
                                    <button class='detail'>Return</button>
                                </form>
                            </span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            @else
            <h3 style="text-align: center; margin: auto;">Please log in to start borrowing books</h3> 
            @endif
            
        </section>
    </article>
@endsection