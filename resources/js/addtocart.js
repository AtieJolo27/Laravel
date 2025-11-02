import $, { error } from "jquery";
import Swal from "sweetalert2";

window.$ = $;
window.jQuery = $;
$(document).on("submit", ".AddToCart", function (e) {
    e.preventDefault();
    var url = $(this).attr("action");
    const Toast = Swal.mixin({
        toast: true,
        position: "bottom-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    $.ajax({
        method: "POST",
        url: url,
        data: $(this).serialize(),

        beforeSend: function(){
            Toast.fire({
                didOpen: ()=>{
                    Swal.showLoading();
                },
                title: 'Adding to cart',
                timer: 2000,
            });
                
            },
        error: function (xhr) {
            if (xhr.status === 401) {
                Swal.fire({
                    icon: "warning",
                    title: "Login Required",
                    text: "Please login",
                }).then(() => {
                    window.location.href = "/login";
                });
            }
        },

        success: function (response) {
            Toast.fire({
                icon: "success",
                title: "Added to cart",
            });
            /* Swal.fire({
                position: "bottom-end",
                icon: "success",
                title: "Added to cart!",
                text: response.success || "Successfully added",
               
            }) */
            $("#cart-count").text(response.cartCount);
            $(".offcanvas-body .card-body").html(response.cartHTML);
        },
    });
});
