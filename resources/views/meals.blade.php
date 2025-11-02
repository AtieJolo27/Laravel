<x-layout>
    {{-- Import your CSS --}}
    @vite(['resources/css/meals.css'])

    <div class="container py-3">
        <div class="row g-4 justify-content-center  "> <!-- Add g-4 for card spacing -->
            @foreach ($products as $product)
                <div class="col-auto"> <!-- Use col-sm-12 for mobile responsiveness -->
                    <div class="card h-100 ProductCards">
                        <img class="img-fluid card-img-top ItemDetails"
                                 src="{{ asset('storage/' . $product->productImage) }}"
                                 alt="{{ $product->productName }}"
                                 loading="lazy" data-id="{{ $product->id }}"
                                 style="cursor: pointer;">
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
                                ₱{{ number_format($product->productPrice, 2) }}
                            </span>
                            <form action="{{ route('addCart', ['id' => $product->id]) }}" class="d-inline AddToCart" method="POST">
                                @csrf
                                <button id="card-button" type="submit" class="btn btn-sm btn-primary ms-1">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
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
