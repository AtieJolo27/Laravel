<x-layout>
    @vite(['resources/css/cartView.css'])

    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <form class="mt-4" action="">
                    <div class="input-group">
                        <span class="input-group-text" id="input-group-left">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="text" class="form-control form-control" id="SearchBar"
                            aria-describedby="input-group-left" placeholder="Search Item">
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-4">

            <div class="col-md-8 mt-4">

                <div class="card w-100 mb-2 productCard">
                    <div class="card-body cartItems">
                        @include('partials.cart-items', ['cartItems' => $cartItems])
                    </div>
                </div>

            </div>

            <div class="col-md-4 mt-4">
                <div class="card w-100">
                    <div class="card-body">
                        @include('partials.subTotal', [
    'subTotal' => $subTotal,
    'deliveryFee' => $deliveryFee,
    'total' => $total
])

                    </div>
                    <div class="card-footer d-flex flex-column">
                        <button class="btn btn-outline-success"> Check Out</button>
                    </div>


                </div>

            </div>

        </div>

        @vite(['resources/js/removefromcart.js', 'resources/js/addCartQuantity.js', 'resources/js/cartTotal.js'])

</x-layout>