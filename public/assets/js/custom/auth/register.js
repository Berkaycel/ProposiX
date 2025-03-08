$(document).ready(function() {
    $("#customer").hide();
    $("#company").hide();

    $("#customerBtn").addClass("bg-gradient-secondary");
    $("#companyBtn").addClass("bg-gradient-secondary");

    $("#customerBtn").click(function(e) {
        e.preventDefault();
        $("#customer").show();
        $("#company").hide();

        $("#customerBtn").addClass("bg-gradient-success").removeClass("bg-gradient-secondary");
        $("#companyBtn").addClass("bg-gradient-secondary").removeClass("bg-gradient-success");
    });

    $("#companyBtn").click(function(e) {
        e.preventDefault();
        $("#company").show();
        $("#customer").hide();

        $("#companyBtn").addClass("bg-gradient-success").removeClass("bg-gradient-secondary");
        $("#customerBtn").addClass("bg-gradient-secondary").removeClass("bg-gradient-success");
    });

    $("#btn-register-customer").click(function(e) {
        e.preventDefault();
        sendFormData($("#customer"), "customer");
    });

    $("#btn-register-company").click(function(e) {
        e.preventDefault();
        sendFormData($("#company"), "company");
    });

    // Sends a POST request to register the new user
    function sendFormData(form, userType) {
        var formData = form.serializeArray();
        formData.push({
            name: "user_type",
            value: userType
        });

        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            url: registerUrl,
            type: "POST",
            data: $.param(formData),
            headers: {
                "X-CSRF-TOKEN": csrfToken
            },
            beforeSend: function() {
                form.find("button").prop("disabled", true).text("Gönderiliyor...");
            },
            success: function(response) {
                window.location.href = response.redirect_url;
            },
            error: function(xhr) {
                let errorMessage = "Bir hata oluştu.";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                alert(errorMessage);
            },
            complete: function() {
                form.find("button").prop("disabled", false).text("Register");
            }
        });
    }
});
