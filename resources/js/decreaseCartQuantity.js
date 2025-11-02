import $ from 'jquery'
import { UpdateTotal } from './cartTotal';
window.$ = $
window.jQuery = $

$(document).on('click', '.decrementCartBtn', function(e){
e.preventDefault();

var product_id =$(this).data('id');

$.ajax({
    url:'decreaseCartQuantity/' + product_id,
    method: 'POST',
    data: {
        _token: $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response){
        $(' .cartItems').html(response.cartHTML);
        UpdateTotal(); 
    }

})

});