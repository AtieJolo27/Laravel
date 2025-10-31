import $ from "jquery";
import * as bootstrap from 'bootstrap';

window.bootstrap = bootstrap;


window.$ = $;
window.jQuery = $;

$(document).on("click", ".ItemDetails", function () {
    var productId = $(this).data("id");

    $.ajax({
        url: "/products/" + productId,
        method: "GET",
        success: function (response) {
            // Populate modal with product data
            $("#productModalLabel").text(response.productName);
            $("#productName").text(response.productName);
            $("#productPrice").text(response.productPrice);
            $("#productDescription").text(response.productDescription);
            $("#productImage").attr("src", response.productImage);

            // Show modal
            var modal = new bootstrap.Modal(document.getElementById("productModal"));
            modal.show();

            // Optional: update Add to Cart button
            $("#addToCartButton").attr("data-id", productId);
        },
        error: function (xhr) {
            console.error(xhr.responseText);
            alert("Unable to load product details.");
        },
    });
});
