@if ($cartItems->isEmpty())
    <div class="text-center" style="height: 200px; display: flex; align-items:center; justify-content: center;">
        <div>
            <p class="text-secondary"><i class="fa-solid fa-5x fa-bag-shopping"></i></p>

            <p class="text-center text-secondary" style="margin: 0"> Your cart is empty</p>
            <p class="text-secondary" style="font-size: 11px">Add your favorite korean delicacies to get started!</p>
            <a href="{{ route('home') }}" class="btn btn-outline-success text-center">Browse Menu</a>
        </div>

    </div>

@else

    @foreach ($cartItems as $items)

        <div class="row align-items-center">
            <div class="col-auto" style="padding: 0px 12px 0px; margin: 0;">
                <img src="{{ asset('storage/') . $items->product->productImage  }}" class="img-fluid rounded cartImg" alt="Product"
                    style="width:90px;height:90px;object-fit:cover;">
            </div>
            <div class="col">
                <div class="d-flex justify-content-between align-items-center">
                    <p class="fw-bold m-0"> {{ $items->product->productName }}</p>
                    <button style="border: none" class="btn btn-danger removeFromCartBtn" data-id="{{ $items->product_id }}"> <i
                            class="fa-solid fa-trash"></i></button>
                </div>

                <p class="text-secondary m-0">{{ $items->product->productDescription }}</p>
                <div class="" style="display: flex; justify-content: space-between;">

                    <div style="display: flex; align-items: center;">
                        <div class="d-flex justify-content-between rounded"
                            style="width: 100px; background-color: rgb(226, 223, 223);">
                            <button class="btn decrementCartBtn" data-id="{{ $items->product_id }}"> <i
                                    class="fa-solid fa-minus"></i></button>
                            <p style="margin-bottom:0; margin-top: 3px;">{{ $items->quantity   }}</p>
                            <button class="btn incrementCartBtn" data-id="{{ $items->product_id }}"><i class="fa-solid fa-plus"
                                    style="cursor: pointer"></i></button>
                        </div>
                    </div>
                    <p>₱ {{ $items->product->productPrice  }}</p>
                </div>

            </div>
        </div>
        <hr>
    @endforeach
    @vite(['resources/js/decreaseCartQuantity.js', 'resources/js/addCartQuantity.js', 'resources/css/cartView.css'])
@endif