<!doctype html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
<form id="loginform" method="post">
    <div>
        Username:
        <input type="text" name="email" id="email" />
        Password:
        <input type="password" name="password" id="password" />    
        <input type="submit" name="loginBtn" id="loginBtn" value="Login" />
        
        <!---<span id="token"> </span>
        <span id="lastname"> </span>--->
    </div>
</form>
<script type="text/javascript">
$(document).ready(function() {
    $('#loginform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'process-public-login.php',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                
                // user is logged in successfully in the back-end
                // let's redirect
                
                if (jsonData.success == "1")
                {
                    $('#token').text(jsonData.token);
                    $('#lastname').text(jsonData.lastname);
                    
                    location.href = 'my_profile.php?id='+jsonData.token+'&surname='+jsonData.lastname;
                }
                else
                {
                    alert('Invalid Credentials!');
                }
           }
       });
     });
});
</script>
</body>
</html>