$(document).ready(function() {
    $(document).on('click', '#check-th', function (event) {
        $('.form-check-input').prop('checked', $(this).prop('checked'));
    });
    $('#menu_filter .nav-link').removeClass('active');
    $('.category_filter').addClass('active');
});
function showModalDeleteCategory(e) {
    $('#modal-delete-category').modal('show');
}
