@extends('layouts.adminapp')
@section('content')
    <div class="add-title">
        <h2>Add a New Book</h2>
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors as $error)
            <li>- {{ $error }}</li>
            @endforeach
        </ul>
        @endif
  
        <form method="POST" action="{{ route('home.admin.add') }}">
            @csrf
            <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label title-label">Title:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12 title-input">
                        <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">ISBN: </label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <input name="isbn" value="{{ old('isbn') }}" type="text" class="form-control">
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Category: </label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <select name="category" class="form-control">
                                @foreach ($viewData['categories'] as $category)
                                    <option value="{{$category->getId()}}"
                                        @if ($category->getId() == old('category'))
                                        selected
                                        @endif
                                    >{{$category->getName()}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Quantity: </label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="quantity" value="{{ old('quantity') }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
            </div>
            <div class="add-div"><button type="submit" class="btn btn-primary btn-add">Add Book</button></div>
            
        </form>
    </div>
@endsection