$(document).ready(function(){
  $('#login').click(function(){

    var username = $('#username').val();
    var password = $('#password').val();
    var error = true;

    // Create JSON object
    var data = {
                "username" : username,
                "password" : password
                };

    // JSON communication to a PHP script that will access a mySQL database and return a Reply to the client.

    success: function(data){
          $.each(data,function(key,value){
            if(username == value.username && password == value.password){
              error = false;
            }
          });
          if(error = false){
            document.location="login.php?user_login=" + username;
          }
            else{
                $('#containter').slideUp('slow').slideDown("slow");
                $('#username').val('');
                $('#password').val('');
                }
          var ouput;
          return output;
    });


/*
$(document).ready(function(){
  $('#login').click(function(){

    var username = $('#username').val();
    var password = $('#password').val();
    var error = true;

    $.ajax({
        type: "POST",
        url: "data.json",
        dataType: "json",

        success: function(data){
          $.each(data,function(key,value){
            if(username == value.username && password == value.password){
              error = false;
            }
          });
          if(error = false){
            document.location="save_ss.php?user_login=" + username;
          }
            else{
                $('#containter').slideUp('slow').slideDown("slow");
                $('#username').val('');
                $('#password').val('');
                }
        }
    });
    return false;
  });
});
*/
