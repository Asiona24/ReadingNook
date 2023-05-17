$(document).ready(function(){
                
    function fetchData(){
      var s = $("#search").val();

      if (s == '') {
        $('#dropdown').css('display', 'none');
      }
      $.post("/ajax/cerca.php", 
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