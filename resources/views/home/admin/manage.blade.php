@extends('layouts.adminapp')
@section('content')
    <div class="add-title">
        <h2>Manage Book</h2>
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors as $error)
            <li>- {{ $error }}</li>
            @endforeach
        </ul>
        @endif
  
        <form method="POST" action="{{ route('home.admin.manage', 1) }}">
            @csrf
            <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label title-label">Title:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12 title-input">
                        <input name="name" value="{{ old('name') }}" type="text" class="form-control" required>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">ISBN: </label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <input name="isbn" value="{{ old('isbn') }}" type="text" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Author:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <input name="author" value="{{ old('author') }}" type="text" class="form-control" required>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Category: </label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <select name="category" class="form-control" required>
                                <option value="1">1</option>
                                @foreach ($viewData['categories'] as $category)
                                    <option value={{$category}}>{{$category}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Quantity: </label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="quantity" value="{{ old('quantity') }}" type="text" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3" required>{{ old('description') }}</textarea>
            </div>
            <input type="hidden" name="id" value="">    {{--Hidden Book Id here--}}
            <div class="submit-div">
                <div class="btn update-div"><button type="submit" class="btn btn-primary btn-update" name="action" value="update">Update Book</button></div>
                <div class="btn delete-div"><button type="submit" class="btn btn-danger btn-delete" name="action" value="delete">Delete Book</button></div>
            </div>
        </form>
    </div>
@endsection