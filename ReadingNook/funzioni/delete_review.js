$(document).ready(function(){

    //quando faccio click sul button elimina passo i valori al DB con $.post per fare una DELETE
    $(".elimina").on("click",function(){
        var p = $(this);
        var e = p.closest('.info').attr('id');
        
        var div = document.getElementById(e);
        var utente = div.getElementsByClassName('utente')[0].value;
        var libro = div.getElementsByClassName('libro')[0].value;
        
        $.post("/funzioni/delete-review.php", {utente:utente,libro:libro});
        location.reload();
    })
})