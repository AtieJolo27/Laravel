<x-layout>
    {{-- Import your CSS --}}
    @vite(['resources/css/meals.css'])

    <div class="container py-3">
        <div class="row g-4 justify-content-center  "> <!-- Add g-4 for card spacing -->
            @foreach ($products as $product)
                <div class="col-auto"> <!-- Use col-sm-12 for mobile responsiveness -->
                    <div class="card h-100 ProductCards">
                        <img class="img-fluid card-img-top ItemDetails"
                            src="{{ asset('storage/' . $product->productImage) }}" alt="{{ $product->productName }}"
                            loading="lazy" data-id="{{ $product->id }}" style="cursor: pointer;">
                        <div class="card-body mt-4 p-2 CardBody h-100">
                            <p class="fw-bold mb-0">
                                {{ Str::limit($product->productName, 20) }}

                            </p>
                            <p class="text-secondary">
                                {{ $product->productDescription }}
                            </p>


                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center" id="pricing">
                            <span class="fs-6 fw-bold">
                                @if($product->selections->count())
                                    ₱{{ number_format($product->selections->min('price_adjustment'), 2) }}
                                    <small class="text-secondary">and up</small>
                                @else
                                    ₱{{ number_format($product->productPrice, 2) }}
                                @endif
                            </span>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Product Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body  m-2">
                    <div class="row">
                        <div class="col-md-6">
                            <img id="productImage" src="" class="img-fluid rounded w-100"
                                style="object-fit:cover; height:300px; width: 300px;" alt="Product">
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 w-100">
                                <div class="card-body">
                                    <div id="productDetails">
                                        <h4 id="productName"></h4>
                                        <p><b>Price:</b> ₱<span id="productPrice"></span></p>
                                        <p id="productDescription"></p>
                                        <input type="hidden" id="modalProductId" name="product_id" value="">
                                        <div id="modalSelectionsContainer"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    {{-- <form action="{{ route('addCart', ['id' => $product->id]) }}" class="d-inline AddToCart"
                        method="POST">
                        @csrf --}}

                        <button id="addToCartButton" class="btn btn-sm btn-primary ms-1">Add to Cart</button>
                        {{--
                    </form> --}}

                </div>
            </div>
        </div>
    </div>

    {{-- Import your JS --}}
    @vite([
        'resources/js/menuswiper.js',
        'resources/js/mealswiper.js',
        'resources/js/addtocart.js',
        'resources/js/loading.js'
    ])
</x-layout>