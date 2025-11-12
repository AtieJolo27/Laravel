<x-layout>
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
                                <div id="modalSelectionsContainer"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div id="productDetails">

                                        <h4 id="productName"></h4>
                                        <p><b>Price:</b> ₱<span id="productPrice"></span></p>
                                        <p id="productDescription"></p>
                                        <div id="modalSelectionsContainer"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <form action="{{ route('addCart', ['id' => $product->id]) }}" class="d-inline AddToCart"
                        method="POST">
                        @csrf
                        <button id="card-button" type="submit" class="btn btn-sm btn-primary ms-1">Add to
                            Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/js/loading.js'])
</x-layout>