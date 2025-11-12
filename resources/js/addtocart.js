/* import $, { error } from "jquery";
import Swal from "sweetalert2";

window.$ = $;
window.jQuery = $;
$(document).on("submit", ".addToCart", function (e) {
    e.preventDefault();
    var product_id = $(this).attr("data-id");
    var selections_id = $('input[name="selections_id"]:checked').val();
    console.log("AddToCart btn data-id:", product_id);


    if (!selections_id) {
        alert("Please select an option!");
        return; // HUWAG MAG-PROCEED kung walang napili!
    }
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
        data: {
            _token: csrf,
            product_id: product_id,
            selections_id: selections_id
        },

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
               
            }) 
            $(".cartItems").html(response.cartHTML);
        },
    });
});
 */