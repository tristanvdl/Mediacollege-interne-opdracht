$(document).ready(function(e) {
    $(".search").keyup(function() {
        var searchval = $(this).val();
        $.ajax({
            type:'GET',
            url:'../build/data/data.php',
            data: 'q='+searchval,
            success:function(data) {
                if (searchval != ""){
                    $('.results').show();
                    $('.results').html(data);
                }else{
                    $('.results').hide();
                }
            }
        });
    });
});