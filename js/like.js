$(document).ready(function () {

    $('.postLike').on('click', function (e) {
        e.preventDefault();
        alert($(this).attr('post_id'));
        var datastring = $(this).attr('post_id');
        $.ajax({
            type: "POST",
            url: "ajaxLike.php",
            data: ['post_id', datastring],
            success: function (data) {
                //var obj = jQuery.parseJSON(data); if the dataType is not specified as json uncomment this
                // do what ever you want with the server response
            },
            error: function () {
            }
        });
    });


});
