$(document).ready(function () {
    $(document).on('click', '.fancybox', function () {
        var sr = $(this).find('img').attr('src');
        $('#image_central').attr('src', sr);
        $('#modal').modal('show');
        event.preventDefault();
    });
    
    $(document).on('click', '.trash', function () {
       var $input = $( this );
       var id = $input.attr('alt');
       alert(id);
       $('#btn_deletar').attr('alt',id);
       $('#trash').modal('show');
       
       $('#btn_deletar').click(function(){
           $.post('/gallery/delete',{'id': id},
                function(data){
                    $('#trash').modal('show');
                    window.location.href = '/gallery';
                }
          );
       });
    });
});