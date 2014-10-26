$(document).ready(function(){


    $('#errDiv').hide();
    $('#submit').click(function(){
        console.log ( '#here I am' );
        e.preventDefault();
        $.post("login.php",$('#form-signin').serialize(),function(data){
          $('#errDiv').show('slow');
          if(data){
            $('#errDiv').text('Session Initialized');
          }
          else{
            $('#errDiv').text('Wrong Information');
          }
        },"json");
    });
});
