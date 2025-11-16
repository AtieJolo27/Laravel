import $ from "jquery";
window.$ = $;
window.jQuery = $;
import Swal from "sweetalert2";

$(document).ready(function () {
    $("#loginForm").submit(function (e) {
        e.preventDefault(); // Prevent the form's default submit action
        $("#loginError").text(""); // Clear previous errors
        const $btn = $(this).find('button[type="submit"]');
        const originalText = $btn.html();

        // Change button text to loading and disable it
        $btn.html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Logging in...'
        ).prop("disabled", true);

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
            url: $(this).attr("action"),
            method: "POST",
            data: $(this).serialize(),
            success: function (response) {
                window.location.href =
                    response.redirect || '{{ route("home") }}';
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    if (errors.email) {
                        $("#loginError").text(errors.email[0]);
                    } else if (errors.password) {
                        $("#loginError").text(errors.password[0]);
                    }
                } else if (xhr.status === 401) {
                    Swal.fire({
                        title: "Ahm, either your email or password is incorrect",
                        text: "You need to input the correct email address or password to proceed. Please try again",
                        confirmButtonText: "Try Again",
                    });
                } else {
                     Swal.fire({
                        title: "Something Went Wrong",
                        text: "Please try again.",
                        confirmButtonText: "Try Again",
                    });
                }
            },
            complete: function () {
                // Revert button to original state and enable it
                $btn.html(originalText).prop("disabled", false);
            },
        });
    });
});
