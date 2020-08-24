var deleteIDone = 0;
$(document).ready(function () {
    $(document).on('click', '#check-th', function (event) {
        $('.form-check-input').prop('checked', $(this).prop('checked'));
    });

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });

    $('#menu_filter .nav-link').removeClass('active');
    $('.category_filter').addClass('active');

    $('#deleteAll_category').click(function () {
        var deleteIds = [];
        $('.category-checkbox').each(function () {
            if ($(this).prop('checked') == true) {
                deleteIds.push(Number($(this).val()));
            }
        })
        console.log(deleteIds)
        if (deleteIds.length == 0) {
            Toast.fire({
                type: 'error',
                title: 'Xin vui lòng chọn danh mục sản phẩm cần xóa'
            })
            return;
        }
        var data = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            'ids': deleteIds
        }
        console.log(data)
        $.ajax({
            url: "/admin/category/delete-all",
            method: 'POST',
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                'ids': deleteIds
            },
            dataType: "json",
            'success': function () {
                Toast.fire({
                    type: 'success',
                    title: 'Xóa danh mục thành công'
                });
                setTimeout(() => {
                    window.location.reload()
                }, 1500);
            },
            'error': function () {
                Toast.fire({
                    type: 'error',
                    title: 'Xin vui lòng chọn danh mục sản phẩm cần xóa'
                })
            }
        })
    })
    $("#delete_category").click(function (event) {
        event.preventDefault();
        var id = [parseInt(deleteIDone)];
        var token = $(this).data("token");
        console.log(token);
        console.log(id);
        $.ajax(
            {
                url: "/admin/category/delete",
                type: 'POST',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_token": token,
                },
                'success': function () {
                    Toast.fire({
                        type: 'success',
                        title: 'Xóa danh mục thành công'
                    });
                    setTimeout(() => {
                        window.location.reload()
                    }, 1500);
                },
                'error': function () {
                    Toast.fire({
                        type: 'error',
                        title: 'Xin vui lòng chọn danh mục sản phẩm cần xóa'
                    })
                }
            });
    });
});

function showModalDeleteCategory(event) {
    console.log(event.value)
    deleteIDone = event.value;
    $('#modal-delete-category').modal('show');
}

function showModalDeleteAllCategory(e) {
    $('#modal-deleteAll-category').modal('show');
}

