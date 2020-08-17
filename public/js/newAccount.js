$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(".file-upload").on('change', function(){
        readURL(this);
    });
    $('#menu_filter .nav-item .nav-link').removeClass('active');
    $('.user_filter').addClass('active');
    $(document).on('change', '#type-account', function (event) {
        if ($(this).val() == 'shop') {
            $('#accountForm .form-group').removeClass('d-none');
        }
    });
});
