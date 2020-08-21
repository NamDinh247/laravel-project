$(document).ready(function () {
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
    $('.category_filter').addClass('active');

    $('#deleteAll_category').click(function () {
        var deleteIds = [];
        $('.category-checkbox').each(function () {
            if ($(this).prop('checked') == true) {
                deleteIds.push($(this).val());
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
                })
                location.reload();
            },
            'error': function () {
                Toast.fire({
                    type: 'error',
                    title: 'Xin vui lòng chọn danh mục sản phẩm cần xóa'
                })
            }
        })
    })

    $("a#btn-delete").click(function (evt) {
        evt.preventDefault();
        const confirm = window.confirm("Are you sure to delete product?");
        if(confirm === true) {
            let linkLocation = $(this).attr("href");
            $.ajax({
                url: linkLocation,
                success: window.location.reload(),
            });
        }
    });
});

function showModalDeleteCategory(e) {
    $('#modal-delete-category').modal('show');
}

function showModalDeleteAllCategory(e) {
    $('#modal-deleteAll-category').modal('show');
}

