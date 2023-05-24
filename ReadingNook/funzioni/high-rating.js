$(document).ready(function(){  
    //CREO LA FUNZIONE JQUERY CHE UTILIZZA AJAX PER PRENDERE IL DIV DELLE CARDS CON SOTTO I NUMERI DELLE PAGINE (MODIFICATO CON CSS)

    load_data();  
    function load_data(page)  
    {  
        $.ajax({  
              url:"/funzioni/high-rating.php",  
              method:"POST",  
              data:{page:page},  
              success:function(data){  
                  $('#high_rating').html(data);  
              }  
        })  
    }  
    // QUANDO CLICCO SU UN NUMERO DELLA PAGINA CARICA IL VALORE RELATIVO IN BASE A 'ID'
    $(document).on('click', '.pagination_link1', function(){  
        var page = $(this).attr("id");  
        load_data(page);  
    });  
});