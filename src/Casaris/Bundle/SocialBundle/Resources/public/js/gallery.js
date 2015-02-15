$(document).ready(function () {
    $(document).on('click', '.fancybox', function () {
        var sr = $(this).find('img').attr('src');
        $('#image_central').attr('src', sr);
        $('#modal').modal('show');
        event.preventDefault();
    });
    
    $(document).on('click', '.trash', function () {
       $('#trash').modal('show');
    });
});