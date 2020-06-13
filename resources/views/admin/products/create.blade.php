@extends('admin.layouts.master')
@section('content')
    <h2>Create new product</h2>
        <form action="{{ route('products.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" id="" class="custom-select">
                            @foreach($cates as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" name="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="text" name="quantity"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
            </div>
            <button class="btn btn-success">Create</button>
        </form>
@endsection
@section('script')
    @include('admin.layouts.script')
@endsection
