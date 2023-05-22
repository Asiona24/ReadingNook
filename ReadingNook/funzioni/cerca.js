$(document).ready(function(){
    fetchData();       
    function fetchData(){
      var s = $("#search").val();

      if (s == '') {
        $('#dropdown').css('display', 'none');
      }
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
    $("#search").on("input",fetchData);
    $("#search").on("click",fetchData);
    $("body").on("click",function(){
      $("#dropdown").css('display','none');
    });
});
$('#barra').on("input",function(){
  var str = document.getElementById('barra').value;
  var r = document.getElementById('1').getElementsByClassName('cerca');
  for(var i = 0; i < r.length; i++){
    var a = r.item(i).getElementsByTagName('a');
    var titolo = a[0].innerHTML.toLowerCase();
    //ho preso il titolo di ogni colonna
    if(titolo.includes(str)){
      r.item(i).classList.remove('d-none');
      r.item(i).classList.add('d-block');
    }else{
      r.item(i).classList.add('d-none');
      r.item(i).classList.remove('d-block');
    }
  }
});