$(document).ready(function(){

  function encrypt(input, key) {
    var output = "";
    for (var i = 0; i < input.length; i++)
    {
        var c = input.charCodeAt(i);
        if(c >= 65 && c <=  90)
        {
          output += String.fromCharCode((c - 65 + Number(key)) % 26 + 65);
        }  // Uppercase
        else if (c >= 97 && c <= 122)
        {
          output += String.fromCharCode((c - 97 + Number(key)) % 26 + 97);
        } // Lowercase
        else
        {
          output += input.charAt(i);
        }  // Copy
    }
    return output;
  };

  function getKey(username,password){
    var keyRequest = new XMLHttpRequest();
    keyRequest.open("POST", "http://localhost/307/A2/getkey.php", true);
    keyRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    keyRequest.onreadystatechange = function() {
      if(keyRequest.readyState == 4 && keyRequest.status == 200) {
          key = '';
          key = keyRequest.responseText;
          if(key != '' ){
            password = encrypt(password,key);
            if (password){
              logIn(JSON.stringify({"username": username,"password" : password}));
            }
          } else{
            document.getElementById("errDiv").innerHTML = "Invalid username and/or password";
          }
        }
    }
      keyRequest.send(username);
  };

  function logIn(json){
    var logRequest = new XMLHttpRequest();
    logRequest.open("POST", "http://localhost/307/A2/login.php", true);
    logRequest.setRequestHeader("Content-type", "application/json");
    logRequest.send(json);

    logRequest.onreadystatechange = function() {
      if(logRequest.readyState == 4 && logRequest.status == 200) {
        //console.log(logRequest.responseText);
        document.write(logRequest.responseText);
      }
    };
  };

  $('#errDiv').hide();
  $('#login').click(function(e){
  e.preventDefault();

  var username = $('#username').val();
  var password = $('#password').val();
  getKey(username,password);

  });
});
