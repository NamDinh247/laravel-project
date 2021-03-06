var deleteIDone = 0;
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
        var data = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            'ids': deleteIds
        }
        $.ajax({
            url: "/admin/product/delete-all",
            method: 'POST',
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                'ids': deleteIds
            },
            dataType: "json",
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
                url: "/admin/product/delete",
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

    //filter date
    var localevn = {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Áp dụng",
        "cancelLabel": "Hủy",
        "fromLabel": "Từ",
        "toLabel": "Đến",
        "customRangeLabel": "Tùy chỉnh",
        "weekLabel": "W",
        "daysOfWeek": ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
        "monthNames": ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
        "firstDay": 1
    };
    var rsFromDate = new Date(new Date().getFullYear(), new Date().getMonth(), 1).setHours(0, 0, 0, 0);
    var rsToDate = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).setHours(0, 0, 0, 0) + 86400000 - 1;
    $('#dateTime').daterangepicker({
        format: 'DD/MM/YYYY',
        opens: "left",
        drops: 'down',
        locale: localevn,
        startDate: moment(rsFromDate),
        endDate: moment(rsToDate),
        alwaysShowCalendars: true,
        ranges: {
            // 'Hôm qua': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            // 'Hôm nay': [moment(), moment()],
            'Tuần trước': [moment().subtract(1, 'weeks').startOf('weeks'), moment().subtract(1, 'weeks').endOf('weeks')],
            'Tuần này': [moment().startOf('weeks'), moment().endOf('weeks')],
            'Tuần sau': [moment().subtract(-1, 'weeks').startOf('weeks'), moment().subtract(-1, 'weeks').endOf('weeks')],
            'Tháng trước': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            'Tháng này': [moment().startOf('month'), moment().endOf('month')],
            'Tháng sau': [moment().subtract(-1, 'month').startOf('month'), moment().subtract(-1, 'month').endOf('month')]
        }
    }).on('hide.daterangepicker', function (ev, picker) {
        $('#dateTime').val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    }).on('cancel.daterangepicker', function (ev, picker) {
        $('#dateTime').val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });

    /* ION SLIDER */
    $('#range_1').ionRangeSlider({
        min: 0,
        max: 100,
        from: 0,
        to: 10,
        type: 'double',
        step: 1,
        postfix: '%',
        prettify: false,
        hasGrid: true
    })
    var readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload").on('change', function () {
        readURL(this);
    });
    var heightContent = $(window).height() - 70;
    $('.scroll_content').parent().css({
        'height': (heightContent + 20) + 'px',
        'overflow-y': 'auto',
        'overflow-x': 'hidden'
    });
    $('.scroll_content_form').css({'height': (heightContent) + 'px', 'overflow-y': 'auto'});
    $('.scroll_content_form_detail').css({
        'height': (heightContent) + 'px',
        'overflow-y': 'auto',
        'overflow-x': 'hidden'
    });

});


function showModalDeleteProduct(event) {
    deleteIDone = $(event).attr('data-id');
    $('#modal-delete-product').modal('show');
}

function showModalDeleteAllProduct(e) {
    $('#modal-deleteAll-product').modal('show');
}
