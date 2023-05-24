$(document).ready(function(){
    //appena faccio click sul tasto di modifica prendo i valori della form da passare al db con $.post e poi faccio iil reload della pagina

    $(".modifica").on("click",function(){
        var p = $(this);
        
        var e = p.closest('.form').attr('id');
        var div = document.getElementById(e);

        var utente = div.getElementsByClassName('utente')[0].value;
        var libro = div.getElementsByClassName('libro')[0].value;
        
        var rate = div.querySelector('input\[name=rating\]:checked').value;
        
        var testo = div.querySelector('textarea\[name=testo\]').value;
        $.post("/funzioni/change-review.php", {utente:utente,libro:libro,rate:rate,testo:testo});
        

        location.reload();
        
    })
})