$(document).ready(function(){

    $('#errDiv').hide();
    $('#login').click(function(e){
      e.preventDefault();

      var username=$('#username').val();
      var password=$('#password').val();
      var json = JSON.stringify({
                                  "username": username,
                                  "password" : password
                                });
      $.ajax({
        type: 'POST',
        url: 'login.php',
        data: {"username":username,"password":password},
        success: function(msg) {
          console.log(msg);
        }
      });
    });
});
