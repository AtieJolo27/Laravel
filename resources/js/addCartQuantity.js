import $ from 'jquery'
window.$ = $
window.jQuery = $

$(document).on('click', '.incrementCartBtn', function(e){
    e.preventDefault();

    var product_id = $(this).data('id');

    $.ajax({
        url: '/addCartQuantity/' + product_id,
        method:"POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function(){
            alert('Success');
        },

        success: function(response){
            $('.offcanvas-body .card-body').html(response.cartHTML);   
            $('.itemQuantity').css('background-color', 'red');
            setTimeout(function(){
                 $('.itemQuantity').css('background-color', ''), 2000;
            });

            
            
        }

    })
})