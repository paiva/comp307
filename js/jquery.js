$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

$(function() {
    $('form').submit(function() {
        $('#result').text(JSON.stringify($('form').serializeObject()));
        return false;
    });
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
