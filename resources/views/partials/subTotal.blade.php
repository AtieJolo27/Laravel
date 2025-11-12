   <div class="cartTotal">
    <h6 class="mb-5">Order Summary</h6>
    <div class="d-flex flex-column">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <p class="m-0 text-secondary">Subtotal:</p>
            <span>₱{{ number_format($subTotal,2)}}</span>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-2">
            <p class="m-0 text-secondary">Delivery Fee:</p>
            <span>₱{{ number_format($deliveryFee, 2) }}</span>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <p class="m-0 text-secondary">Total:</p>
            <span>₱{{ number_format($total, 2) }}</span>
        </div>
        
    </div>
        @vite(['resources/js/cartTotal.js'])
    </div>

