@extends('admin.layouts.master')
@section('content')
    <h2>Products list</h2>

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Serial</th>
                <th scope="col">Image</th>
                <th scope="col">Product name</th>
                <th scope="col">Pirce</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @php($count = 1)
        @foreach($products as $p)
            <tr>
                <th scope="row">{{ $count++ }}</th>
                <td>
                    <img src="{{ $p->image }}" alt="" class="img-thumbnail" width="100px">
                </td>
                <td>
                    {{ $p->name }}
                </td>
                <td>
                    {{ $p->price }}
                </td>
                <td>
                    <a href="{{ route('products.edit', ['id' => $p->id]) }}">
                        <button class="btn-sm btn-success">Edit</button>
                    </a>
                    <button class="btn-sm btn-danger">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('script')
    @include('admin.layouts.script')
@endsection
