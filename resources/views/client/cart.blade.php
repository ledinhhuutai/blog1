@extends('client.layouts.master')
@section('page_title')
    Cart
@endsection
@section('client_content')
    @if(Session::has('success'))
        <div class="alert-success message-flash">{{ Session::get('success') }}</div>
    @endif
    @if(session()->has('cart'))
    <section class="cart_area section_padding">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(session('cart') as $item)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="{{ $item['image'] }}" alt="" />
                                    </div>
                                    <div class="media-body">
                                        <p>{{ $item['name'] }} </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>{{ $item['price'] }} $</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                                    <input class="input-number quantity" type="text" value="{{ $item['quantity'] }}" min="0">
                                    <span class="input-number-increment"> <i class="ti-plus"></i></span>
                                </div>
                            </td>
                            <td>
                                <h5>{{ $item['price'] * $item['quantity'] }}</h5>
                            </td>
                            <td>
                                <button class="btn-success btn-sm update-quantity" data-id="{{ $item['id'] }}"><i class="fas fa-redo"></i></button>
                                <button class="btn-danger btn-sm delete-from-cart" data-id="{{ $item['id'] }}"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        <tr class="bottom_button">
                            <td>
                                <a class="btn_1" href="#">Update Cart</a>
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="cupon_text float-right">
                                    <a class="btn_1" href="#">Close Coupon</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>$2160.00</h5>
                            </td>
                        </tr>


                        <tr class="shipping_area">
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Shipping</h5>
                            </td>
                            <td>
                                <div class="shipping_box">
                                    <select class="shipping_select">
                                        <option value="1">Bangladesh</option>
                                        <option value="2">India</option>
                                        <option value="4">Pakistan</option>
                                    </select>
                                    <select class="shipping_select section_bg">
                                        <option value="1">Select a State</option>
                                        <option value="2">Select a State</option>
                                        <option value="4">Select a State</option>
                                    </select>
                                    <input class="post_code" type="text" placeholder="Postcode/Zipcode" />
                                    <a class="btn_1" href="#">Update Details</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="#">Continue Shopping</a>
                        <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
                    </div>
                </div>
            </div>
    </section>
    @else
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2><a href="{{ route('home') }}" class="text-dark">Empty Cart. Continue Shopping</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('script')
    <script>
        setTimeout(function () {
            $(".message-flash").fadeOut();
        },3000);
        // remove item
        $(".delete-from-cart").click(function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ url('delete-from-cart') }}',
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', id: $(this).attr("data-id")},
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        // update item

        $(".update-quantity").click(function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ url('update-from-cart') }}',
                method: "patch",
                data: {_token: '{{csrf_token()}}', id:$(this).attr("data-id"), quantity: $(this).parents("tr").find(".quantity").val()},
                success: function (response) {
                    window.location.reload();
                }
            });
        })
    </script>
@endsection
