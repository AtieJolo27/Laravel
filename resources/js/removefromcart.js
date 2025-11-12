import $ from 'jquery'
import { UpdateTotal } from './cartTotal';
window.$ = $
window.jQuery = $

$(document).on('click', '.removeFromCartBtn', function(e){
e.preventDefault();

var cart_item_id =$(this).data('id');

$.ajax({
    url:'removeFromCart/' + cart_item_id,
    method: 'POST',
    beforeSend(){
    alert("hello?" + cart_item_id); // for debugging
},
    data: {
        _token: $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response){
        $(' .cartItems').html(response.cartHTML); 
        UpdateTotal();
    }

})

});