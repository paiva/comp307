$(document).ready(function(){

    $('#errDiv').hide();
    $('#login').click(function(e){
      e.preventDefault();

      var username=$('#username').val();
      var password=$('#password').val();
      var str_json = JSON.stringify({
                                  "username": username,
                                  "password" : password
                                });

      var request = new XMLHttpRequest();
      request.open("POST", "login.php", true)
      request.setRequestHeader("Content-type", "application/json")
      request.send(str_json)

    });
});
