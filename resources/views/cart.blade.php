<x-layout>
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
            <div class="col-sm-8">
                 @foreach ($cartItems as $items)
                <div class="card">
                    <div class="card-body">
                        <p> {{ $items->product->productName }}</p>
                    </div>
                </div>
            @endforeach
            </div>
           
        </div>

    </div>


</x-layout>