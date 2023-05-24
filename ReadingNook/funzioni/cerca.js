$(document).ready(function(){

  //FUNZIONE DI RICERCA PER LA BARRA DELLA NAVBAR CON JQUERY (VISUALIZZAZIONE CON CSS IN /css/style.css SEZ PER IL NAV)
    fetchData();       
    function fetchData(){
      var s = $("#search").val();

      if (s == '') {
        $('#dropdown').css('display', 'none');
      }else{
        $.post("/funzioni/cerca.php", 
            {
              s:s
            },
            function(data, status){
                if (data != "") {
                  $('#dropdown').css('display', 'block');
                  $('#dropdown').html(data);
                }
            });
      }
      
    }
    $("#search").on("input",fetchData);
    $("#search").on("click",fetchData);
    $("body").on("click",function(){
      $("#dropdown").css('display','none');
    });
});


//FUNZIONE DI RICERCA PER LA BARRA SITUATA IN /genres/genre
$('#barra').on("input",function(){
  var str = document.getElementById('barra').value;
  var r = document.getElementById('1').getElementsByClassName('cerca');
  //in r ci sono tutte le colonne che contengono le cards
  for(var i = 0; i < r.length; i++){
    var a = r.item(i).getElementsByTagName('a');
    var titolo = a[0].innerHTML.toLowerCase();
    //ho preso il titolo di ogni colonna

    /*controllo se il titolo contiene il valore inserito nella barra:
        -se si allora mantengono la classe d-block
        -se no allora sostituisco d-block con d-none  */
        
    if(titolo.includes(str)){
      r.item(i).classList.remove('d-none');
      r.item(i).classList.add('d-block');
    }else{
      r.item(i).classList.add('d-none');
      r.item(i).classList.remove('d-block');
    }
  }
});