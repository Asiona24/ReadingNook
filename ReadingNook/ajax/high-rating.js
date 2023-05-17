$(document).ready(function(){  
    load_data();  
    function load_data(page)  
    {  
        $.ajax({  
              url:"/ajax/high_rating.php",  
              method:"POST",  
              data:{page:page},  
              success:function(data){  
                  $('#high_rating').html(data);  
              }  
        })  
    }  
    $(document).on('click', '.pagination_link1', function(){  
        var page = $(this).attr("id");  
        load_data(page);  
    });  
});