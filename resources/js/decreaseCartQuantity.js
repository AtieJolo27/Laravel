import $ from 'jquery'
import { UpdateTotal } from './cartTotal';
window.$ = $
window.jQuery = $

$(document).on('click', '.decrementCartBtn', function(e){
e.preventDefault();

var product_id =$(this).data('id');

$.ajax({
    url:'removetocart/' + product_id,
    method: 'POST',
    beforeSend(){
    alert("hello?" + product_id); // for debugging
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