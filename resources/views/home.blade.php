<x-layout>
    @vite(['resources/js/loading.js'])
    <style>
        body{
            margin: 0;
            padding: 0;
        }
    </style>
    <div class="hero-section mt-0 mb-4 d-flex align-items-center justify-content-center">
        <form action="">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Meal" style="width: 500px">
                <span class="input-group-text"><a href=""><i class="fa-solid fa-magnifying-glass"></i></a></span>
            </div>
        </form>
    </div>
    <div class="container">

        <div class="nav" style="display: flex; justify-content: space-between;">
            <h6>Best Seller</h6>
            <a href="" cla>View All</a>
        </div>

        <div class="MealContentArea">
            <div class="swiper ProductSwiper" role="region" aria-label="Product carousel">
                <div class="swiper-wrapper" id="MealSwiper">
                    @foreach ($products as $product)
                        <div class="swiper-slide">
                            <div class="card" id="BestSellerCards"> <!-- Added h-100 for equal height -->
                                <div class="card-header">
                                    <h6 class="fw-bold mb-0">{{ Str::limit($product->productName, 20) }}</h6>
                                    <!-- Limit title length -->
                                </div>
                                <div class="card-body p-2"> <!-- Reduced padding -->
                                    <img class="img-fluid rounded ItemDetails"
                                        src="{{ asset('/storage') . $product->productImage }}"
                                        alt="{{ $product->productName }}" loading="lazy" data-id="{{ $product->id }}"
                                        style="cursor: pointer;">
                                </div>
                                <div class="card-footer d-block justify-content-center align-items-center" id="pricing">
                                    <span class=" fs-6 fw-bold">₱{{ number_format($product->productPrice, 2) }}</span>
                                    <div>
                                        <form action="{{ route('addCart', ['id' => $product->id]) }}"
                                            class="d-inline AddToCart" method="POST">
                                            @csrf
                                            <button id="card-button" type="submit" class="btn btn-sm btn-primary ms-1"
                                                >Add to Cart</button>
                                        </form>
                                        {{-- <button id="card-button" class="btn btn-sm btn-success ms-1">Buy</button> --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <!-- Product Details Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Product Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-2 m-2">
                    <div class="row">
                        <div class="col-md-6">
                            <img id="productImage" src="" class="img-fluid rounded my-3" style="object-fit:cover;"
                                alt="Product">

                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div id="productDetails">
                                <h4 id="productName"></h4>  
                                <p><b>Price:</b> ₱<span id="productPrice"></span></p>
                                <p id="productDescription"></p>
                            </div>
                                </div>
                            </div>
                            

                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button id="addToCartButton" class="btn btn-primary">Add to Cart</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    @vite(['resources/js/menuswiper.js', 'resources/js/mealswiper.js', 'resources/js/addtocart.js', 'resources/js/loading.js'])
</x-layout>