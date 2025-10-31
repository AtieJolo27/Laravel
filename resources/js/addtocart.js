

import $, { error } from "jquery";
import Swal from "sweetalert2";

window.$ = $;
window.jQuery = $;
$(document).on("submit", ".AddToCart", function (e) {
    e.preventDefault();
    var url = $(this).attr("action");
    $.ajax({
        method: "POST",
        url: url,
        data: $(this).serialize(),
        

        beforeSend: function(){
            Swal.fire({
                    title: "Adding to cart...",
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                    },
                });
            },
            error: function(xhr){
            if(xhr.status === 401){
                Swal.fire({
                    icon: "warning",
                    title: "Login Required",
                    text: "Please login"
                }).then(()=>{
                    window.location.href="/login";
                })
            }
        },
        
        success: function (response) {
            Swal.fire({
                icon: "success",
                title: "Added to cart!",
                text: response.success || "Successfully added",
               
            })
            $('#cart-count').text(response.cartCount);
            $('.offcanvas-body .card-body').html(response.cartHTML);
        },
        
    });
});
