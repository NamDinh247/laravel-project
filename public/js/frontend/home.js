$(document).ready(function() {
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
});
// document.addEventListener("click", function (evt) {
//     if ($(evt.target).attr('id') == 'box_new_posts') {
//
//     } else {
//         $('#box_new_posts').height(25);
//         $('#box_new_posts').css('border-radius', '30px');
//         $('.add_action').hide();
//         $('.add_action').hide();
//     }
// });
