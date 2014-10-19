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
              document.location="save_ss.php?user_login=" + user;
            }else{
                $('#containter').slideUp('slow').slideDown("slow");
                $('#username').val('');
                $('#password').val('');
                }
              }
          });
        return false;
    });

  });
});
