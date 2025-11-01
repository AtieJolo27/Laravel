@foreach ($cartItems as $items)

    <div class="row ">
        <div class="col-2" style="padding: 0px 12px 0px; margin: 0;">
            <img src="{{ asset('storage/') . $items->product->productImage  }}" class="img-fluid rounded" alt="Product"
                style="width:150%;height:90px;object-fit:cover;">
        </div>
        <div class="col-10">
            <div class="d-flex justify-content-between align-items-center">
                <p class="fw-bold m-0"> {{ $items->product->productName }}</p>
                <button style="border: none" class="btn btn-danger"> <i class="fa-solid fa-trash"></i></button>
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
                <p>₱ {{ $items->product->productPrice * $items->quantity  }}</p>
            </div>

        </div>
    </div>
    <hr>
    @vite(['resources/js/decreaseCartQuantity.js', 'resources/js/addCartQuantity.js', 'resources/css/cartView.css'])
@endforeach