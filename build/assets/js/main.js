$(document).ready(function(t){$(".search").keyup(function(){var t=$(this).val();$.ajax({type:"GET",url:"../build/data/data.php",data:"q="+t,success:function(a){""!=t?($(".results").show(),$(".results").html(a)):$(".results").hide()}})})});