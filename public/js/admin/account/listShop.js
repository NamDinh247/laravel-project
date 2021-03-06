$(document).ready(function() {
    check_filter = 'user_filter';
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
    $(document).on('click', '#check-th', function (event) {
        $('.form-check-input').prop('checked', $(this).prop('checked'));
    });

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

    activeFilterLeft('#menu_filter', '.user_filter');
    activeFilterAccount('.user_filter', '.user_shop_filter');
    var heightTable = $(window).height() - 80;
    $('.scroll_content').parent().css({'height': (heightTable + 10) + 'px', 'overflow-x': 'hidden', 'overflow-y': 'auto'});
});
function showModalDeleteAccount(e) {
    $('#modal-delete-account').modal('show');
}
