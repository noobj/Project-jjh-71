@extends('layouts.app')
@section('content')
    <article>
        <section class="main">
            <div class="data">
                @if (Auth::user())
                    <h2 class="book-table-title">Books Available for Borrow</h2>
                @else 
                    <h2 class="book-table-title">Books in Library</h2>
                @endif
                
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
                                    <td class="detail-image"><img class="detail-img" src="{{'https://covers.openlibrary.org/b/isbn/' . $book->getIsbn() . '.jpg'}}" alt="{{$book->getName()}}"></td>
                                    <td class="book-detail">
                                        <div class="show-detail"><strong>Category: </strong> 
                                            @foreach ($viewData['categories'] as $category)
                                            @if ($category->getId() == $book->getCategory())
                                                {{$category->getName()}}
                                            @endif
                                            @endforeach
                                        </div>
                                        <div class="show-detail"><strong>Author:</strong> {{$book->getAuthor()}}</div>
                                        <div class="show-detail"><strong>Description:</strong> {{$book->getDesc()}}</div>
                                        <div class="show-detail"><strong>Quantity left for borrow:</strong> {{$book->getQuantity()}}</div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        @endif
                    @endforeach
                @endif
                
                <table class="book-table">
                    @if (Auth::user() && count($viewData['data']) > 0)
                    <thead><tr>
                        <th class="table-cover">Cover</th>
                        <th>Title and Author</th>
                        <th>Quantity</th>
                        <th>Details</th>
                        <th>Borrow</th>
                    </tr></thead>
                    @endif
                    @if (!Auth::user() && count($viewData['allData']) > 0)
                    <thead><tr>
                        <th class="table-cover">Cover</th>
                        <th>Title and Author</th>
                        <th>Quantity</th>
                    </tr></thead>
                    @endif

                    <tbody>
                        @if (Auth::user())
                            @if (count($viewData['data']) > 0)
                                @foreach ($viewData['data'] as $book)
                                @if ($book->getQuantity() > 0)
                                <tr>
                                <td class="table-cover"><span><img src="{{'https://covers.openlibrary.org/b/isbn/' . $book->getIsbn() . '.jpg'}}" alt="{{$book->getName()}}"></span></td>
                                <td>
                                    <div class='author'><strong>{{$book->getName()}}</strong></div>
                                    
                                    <div>- {{$book->getAuthor()}} -</div>
                                </td>
                                <td>{{$book->getQuantity()}}</td>
                                <td><span class='detail'>
                                    <a href='?action=detail&id={{$book->getId()}}'>Detail</a>
                                </span></td>
                                <td><span>
                                    <form action="{{ route('home.borrow', $book->getId())}}" method="POST">
                                        @csrf
                                        <button class="borrow">Borrow</button>
                                    </form>
                                </span></td>
                                </tr>
                                @endif
                                @endforeach
                            @else
                            <h3 style="text-align: center; margin: auto; margin-top:100px;">No books is available for you to borrow</h3> 
                            @endif
                        @else
                            @if (count($viewData['allData']) > 0)
                            @foreach ($viewData['allData'] as $book)
                            <tr>
                                <td class="table-cover"><span><img src="{{'https://covers.openlibrary.org/b/isbn/' . $book->getIsbn() . '.jpg'}}" alt="{{$book->getName()}}"></span></td>
                                <td>
                                    <div class='author'><strong>{{$book->getName()}}</strong></div>
                                
                                    <div>- {{$book->getAuthor()}} -</div>
                                </td>
                                <td>{{$book->getQuantity()}}</td>
                            </tr>
                            @endforeach
                            @else
                            <h3 style="text-align: center; margin: auto; margin-top:100px;">There is no books in the library right now</h3> 
                            @endif
                        @endif
                    </tbody>
                </table>
            </div>
        </section>
        <section class="side">
            @if (Auth::user() && Auth::user()->getRole() == 'client')
            <div class="data">
                <h2 class="book-table-title borrow-title">Books you are borrowing</h2>
            <table class="book-table borrow-table">
                @if (count($viewData['borrow']) > 0)
                <thead><tr>
                    <th class="table-cover">Cover</th>
                    <th>Title and Author</th>
                    <th>Return</th>
                </tr></thead>
                @endif
                <tbody>
                    @if (count($viewData['borrow']) > 0)
                    @foreach ($viewData['borrow'] as $record)
                    @foreach ($viewData['allData'] as $book)
                        @if ($record->getBookId() == $book->getId())
                        <tr>
                            <td class="table-cover"><span><img src={{'https://covers.openlibrary.org/b/isbn/' . $book->getIsbn(). '.jpg'}} alt={{$book->getName()}}></span></td>
                            <td>
                                <div class='author'><strong>{{$book->getName()}}</strong></div>
                                    
                                <div>- {{$book->getAuthor()}} -</div>
                            </td>
                            <td><span>
                                <form action="{{ route('home.return', $record->getId())}}" method="POST">
                                    @csrf
                                    <button class='detail'>Return</button>
                                </form>
                            </span></td>
                        </tr>
                        @endif
                    @endforeach
                    @endforeach
                    @else 
                        <h3 style="text-align: center; margin: auto; margin-top:100px;">You have not borrowed any books</h3> 
                    @endif
                </tbody>
            </table>
            </div>
            @else
            <h3 style="text-align: center; margin: auto;">Please log in to start borrowing books</h3> 
            @endif
            
        </section>
    </article>
@endsection