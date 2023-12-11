$(document).ready(function () {
    $("#toggle-password").click(function () {
        var passwordInput = $("#tPassword");
        var passwordIcon = $("#password-icon");

        if (passwordInput.attr("type") === "password") {
            passwordInput.attr("type", "text");
            passwordIcon.removeClass("bi-eye-slash").addClass("bi-eye");
        } else {
            passwordInput.attr("type", "password");
            passwordIcon.removeClass("bi-eye").addClass("bi-eye-slash");
        }
    });
});
