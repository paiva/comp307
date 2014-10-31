$(document).ready(function(){

  function encrypt(input, key) {
    key =  Number((26 - key) % 26);
    var output = "";
    for (var i = 0; i < input.length; i++) {
        var c = input.charCodeAt(i);
          if      (c >= 65 && c <=  90) output += String.fromCharCode((c - 65 + key) % 26 + 65);  // Uppercase
            else if (c >= 97 && c <= 122) output += String.fromCharCode((c - 97 + key) % 26 + 97);  // Lowercase
              else                          output += input.charAt(i);  // Copy
    }
    return output;
  };

  function getKey(username,password){

    var keyRequest = new XMLHttpRequest();
    keyRequest.open("POST", "http://localhost/307/A2/getkey.php", true);
    keyRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    keyRequest.onreadystatechange = function() {
      //console.log(keyRequest.readyState);
      if(keyRequest.readyState == 4 && keyRequest.status == 200) {
          key = '';
          key = keyRequest.responseText;
          if(key != '' ){
            password = encrypt(password,key);
            if (password){
              console.log('I am suppose to login here');
              //login();
            }
            //jsonAndSend();
          } else{
            document.getElementById("errDiv").innerHTML = "Username does not exist";
          }
        }
    }
      keyRequest.send(username);
  };

  $('#errDiv').hide();
  $('#login').click(function(e){
  e.preventDefault();

  var username = $('#username').val();
  var password = $('#password').val();
  var str_json = JSON.stringify({
                                "username": username,
                                "password" : password
                              });
  getKey(username,password);

  });
});
