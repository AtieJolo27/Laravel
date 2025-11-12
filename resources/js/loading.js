import $ from "jquery";
import * as bootstrap from "bootstrap";
import Swal from "sweetalert2";

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
            $("#modalProductId").val(productId);
            $("#productModalLabel").text(response.productName);
            $("#productName").text(response.productName);
            $("#productPrice").text(response.productPrice);
            $("#productDescription").text(response.productDescription);
            $("#productImage").attr("src", response.productImage);

            // Clear old selection radios
            let $container = $("#modalSelectionsContainer");
            $container.empty();
            console.log("Selections:", response.selections);
            console.log(response.price);

            // Populate selections dynamically
            response.selections.forEach(function (selection, index) {
                let radioHtml = `
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                            name="selections_id"
                            id="radio_${selection.id}"
                            value="${selection.id}"
                            data-price="${selection.price_adjustment}"
                            ${index === 0 ? "checked" : ""}>
                        <label class="form-check-label" for="radio_${selection.id}">
                            ${selection.name}
                        </label>
                    </div>
                `;
                $container.append(radioHtml);
            });
            $(document)
                .off("change", "input[name='selections_id']")
                .on("change", "input[name='selections_id']", function () {
                    const selectedPrice = $(this).data("price");
                    $("#productPrice").text(selectedPrice);
                });

            // Show modal
            var modal = new bootstrap.Modal(
                document.getElementById("productModal")
            );
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

window.$ = $;
window.jQuery = $;
$(document).on("click", "#addToCartButton", function (e) {
    e.preventDefault();
    const csrf = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    var product_id = $("#modalProductId").val();
    var selections_id = $('input[name="selections_id"]:checked').val();
    var url = "/addToCart/" + product_id;
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
            selections_id: selections_id,
        },

        beforeSend: function () {
            Toast.fire({
                didOpen: () => {
                    Swal.showLoading();
                },
                title: "Adding to cart",
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
            $(".cartItems").html(response.cartHTML);
        },
    });
});
