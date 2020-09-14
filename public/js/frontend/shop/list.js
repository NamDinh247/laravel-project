var deleteIDone = 0;
$(document).ready(function () {
    $('#box_new_posts').click(function (e) {
        $(this).height(300);
        $(this).css('border-radius', '10px');
        $('.add_action').show();
        $('#post').show();
    });
    $('#post').click(function (e) {
        $('#box_new_posts').height(25);
        $('#box_new_posts').css('border-radius', '30px');
        $('.add_action').hide();
        $('#post').hide();
    });

    $(document).on('click', '#check-th', function (event) {
        $('.form-check-input').prop('checked', $(this).prop('checked'));
    });

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    $('#menu_filter .nav-link').removeClass('active');
    $('.product_filter').addClass('active');

    $('#deleteAll_product').click(function () {
        var deleteIds = [];
        $('.product-checkbox').each(function () {
            if ($(this).prop('checked') == true) {
                deleteIds.push(Number($(this).val()));
            }
        })
        if (deleteIds.length == 0) {
            Toast.fire({
                type: 'error',
                title: 'Xin vui lòng chọn danh mục sản phẩm cần xóa'
            })
            return;
        }
        $.ajax({
            url: "/shop/product/delete-all",
            method: 'POST',
            dataType: "JSON",
            data: {
                'token': $('meta[name="csrf-token"]').attr('content'),
                'ids': deleteIds
            },
            'success': function () {
                Toast.fire({
                    type: 'success',
                    title: 'Xóa sản phẩm thành công'
                });
                setTimeout(() => {
                    window.location.reload()
                }, 1500);
            },
            'error': function () {
                Toast.fire({
                    type: 'error',
                    title: 'Xin vui lòng chọn các sản phẩm cần xóa'
                })
            }
        })
    })

    $("#delete_product").click(function (event) {
        event.preventDefault();
        var id = [parseInt(deleteIDone)];
        var token = $(this).data("token");
        $.ajax(
            {
                url: "/shop/product/delete",
                type: 'POST',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_token": token,
                },
                'success': function () {
                    Toast.fire({
                        type: 'success',
                        title: 'Xóa sản phẩm thành công'
                    });
                    setTimeout(() => {
                        window.location.reload()
                    }, 1500);
                },
                'error': function () {
                    Toast.fire({
                        type: 'error',
                        title: 'Xin vui lòng chọn sản phẩm cần xóa'
                    })
                }
            });
    });
});

function showModalDeleteProduct(event) {
    deleteIDone = $(event).attr('data-id');
    $('#modal-delete-product').modal('show');
}

function showModalDeleteAllProduct(e) {
    $('#modal-deleteAll-product').modal('show');
}
