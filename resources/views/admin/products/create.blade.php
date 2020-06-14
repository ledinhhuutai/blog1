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
                            <option value="">Please select a category</option>
                            @foreach($cates as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" name="price" class="form-control">
                        @error('price')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Sell price</label>
                        <input type="text" name="sell_price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="text" name="quantity"  class="form-control">
                        @error('quantity')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" id="inputImage" class="form-control">
                        <br>
                        <img src="{{ asset('/images/default.jpg') }}" class="img-thumbnail" id="previewImage" width="70%" alt="">
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="Create">
            <a href="{{ route('products.list') }}">
                <input type="button" class="btn btn-danger" value="Cancel">
            </a>

        </form>
@endsection
@section('script')

    @include('admin.layouts.script')
    <script>
        function preImage(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewImage').attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#inputImage").change(function () {
            preImage(this);
        });
    </script>
@endsection
