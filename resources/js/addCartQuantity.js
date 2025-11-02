import $ from 'jquery'
window.$ = $
window.jQuery = $
import { UpdateTotal } from './cartTotal';

$(document).on('click', '.incrementCartBtn', function(e){
    e.preventDefault();

    var product_id = $(this).data('id');

    $.ajax({
        url: '/addCartQuantity/' + product_id,
        method:"POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },

        success: function(response){
            $(' .cartItems').html(response.cartHTML);   
            $('.itemQuantity').css('background-color', 'red');
            setTimeout(function(){
                 $('.itemQuantity').css('background-color', ''), 2000;
            });
            UpdateTotal();
            
            
            
        }

    })

 /*    $.ajax({

    }) */
})