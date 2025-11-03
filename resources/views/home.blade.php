<x-layout>
    @vite(['resources/js/loading.js'])
    <style>
        body {
            margin: 0;
            padding: 0;
        }
    </style>
    <div class="hero-section mt-0 mb-4 d-flex align-items-center justify-content-center">

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