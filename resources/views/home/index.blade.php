@extends('layouts.app')
@section('content')
    <article>
        <section class="main">
            <div class="data">
                <h2 class="book-table-title">Books in Library</h2>
                @if (isset($_GET['action']) && $_GET['action'] == 'detail')
                    @foreach ($viewData['data'] as $book)
                        @if ($book->getId() == $_GET['id'])
                        <div class="detail-board">
                            <div class="detail-header">
                                <h3 class="detail-name"><strong>{{$book->getName()}}</strong></h3>
                                <a class="detail-cancel" href="{{ route('home.index') }}">X</a>
                            </div>
                            
                            <table>
                                <tr>
                                    <td class="detail-image"><img class="detail-img" src={{'https://covers.openlibrary.org/b/isbn/' . $book->getIsbn() . '.jpg'}} alt={{$book->getName()}}></td>
                                    <td class="book-detail">
                                        <strong>Category:</strong> {{$book->category->getName()}}<br>
                                        <strong>Author:</strong> {{$book->getAuthor()}}<br>
                                        <strong>Description:</strong> {{$book->getDesc()}}<br>
                                        <strong>Quantity left for borrow:</strong> {{$book->getQuantity()}}
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
                        @foreach ($viewData['data'] as $book)
                            <tr>
                                <td class="table-cover"><span><img src={{'https://covers.openlibrary.org/b/isbn/' . $book->getIsbn() . '.jpg'}} alt={{$book->getName()}}></span></td>
                                <td>
                                    <div class='author'><strong>{{$book->getName()}}</strong></div>
                                    
                                    <div>- {{$book->getAuthor()}} -</div>
                                </td>
                                <td>{{$book->getQuantity()}}</td>
                                @if (Auth::user() && Auth::user()->getRole() == 'client')
                                    <td><span class='detail'>
                                        <a href='?action=detail&id={{$book->getId()}}'>Detail</a>
                                    </span></td>
                                    <td><span>
                                        <form action="{{ route('home.borrow', $book->getId())}}" method="POST">
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
                    @foreach ($viewData['data'] as $book)
                        <tr>
                            <td class="table-cover"><span><img src={{'https://covers.openlibrary.org/b/isbn/' . $book->getIsbn() . '.jpg'}} alt={{$book->getName()}}></span></td>
                            <td>
                                <div class='author'><strong>{{$book->getName()}}</strong></div>
                                    
                                <div>- {{$book->getAuthor()}} -</div>
                            </td>
                            <td><span>
                                <form action="{{ route('home.return', $book->getId())}}" method="POST">
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