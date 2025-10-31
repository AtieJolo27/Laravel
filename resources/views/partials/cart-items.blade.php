@foreach($cartItems as $items)
    <div class="list-group">
        <div class="list-group-item mb-2">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center gap-2">

                    <button class="btn btn-sm rounded-circle d-flex justify-content-center align-items-center decrementCartBtn" data-id="{{$items->product_id}}" type="submit"><i
                            class="fa-solid fa-trash" style="cursor: pointer"></i></button>

                    <h6 style="margin: 0; padding: 0;"> {{ $items->quantity }}</h6>
                    <button class="btn btn-sm rounded-circle d-flex justify-content-center align-items-center incrementCartBtn" data-id="{{ $items->product_id }}"
                        type="submit"><i class="fa-solid fa-plus" style="cursor: pointer"></i></button>

                </div>
                <div class="col-md-8 d-flex align-items-center  gap-2">
                    <p>{{ $items->product->productName }}</p>

                    <p>Price: {{ $items->product->productPrice }}</p>
                    <p>Total: {{ $items->quantity * $items->product->productPrice }}</p>
                </div>
            </div>

        </div>
    </div>
    @vite(['resources/js/removefromcart.js', 'resources/js/addCartQuantity.js','resources/css/cart.css'])
@endforeach