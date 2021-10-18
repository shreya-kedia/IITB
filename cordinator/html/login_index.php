<?php
include('..\php\login_cordinator.php');
//include('..\php\captcha.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../css/login_css.css">
    <script type="text/javascript">

   //Created / Generates the captcha function    
    function DrawCaptcha()
    {
        var a = Math.ceil(Math.random() * 10)+ '';
        var b = Math.ceil(Math.random() * 10)+ '';       
        var c = Math.ceil(Math.random() * 10)+ '';  
        var d = Math.ceil(Math.random() * 10)+ '';  
        var e = Math.ceil(Math.random() * 10)+ '';  
        var f = Math.ceil(Math.random() * 10)+ '';  
        var g = Math.ceil(Math.random() * 10)+ '';  
        var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f + ' ' + g;
        document.getElementById("txtCaptcha").value = code
    }

    // Validate the Entered input aganist the generated security code function   
    function ValidCaptcha(){
        var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
        var str2 = removeSpaces(document.getElementById('txtInput').value);
        if (str1 == str2) return true;        
        return false;
        
    }

    // Remove the spaces from the entered and generated code
    function removeSpaces(string)
    {
        return string.split(' ').join('');
    }
    
 
    </script>
    
    
</head>

<body onload="DrawCaptcha();">
    <div class="login-dark">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            
            <!-- <div class="elem-group"> -->
    <!-- <label for="captcha">Please Enter the Captcha Text</label>
    <img src="..\php\captcha.php" alt="CAPTCHA" class="captcha-image"><i class="fas fa-redo refresh-captcha"></i>
    <br>
    <input type="text" id="captcha" name="captcha_challenge" pattern="[A-Z]{6}">
</div> -->
<!-- <img src="..\php\security_image.php" alt="security code" /> -->
<!-- <table>
<tr>
    <td>
        <input type="text" id="txtCaptcha" 
            style="background-image:url(1.jpg); text-align:left; border:none;
            font-weight:bold; font-family:Modern" />
        <input  class="captcha" type="button" id="btnrefresh" value="Refresh" onclick="DrawCaptcha();" />
    </td>
</tr>
<tr>
    <td>
    <div class="form-group"><input class="form-control" type="text" placeholder="Enter Captcha" id="txtInput" ></div>
        <input type="text" id="txtInput"/>     
    </td>
</tr>
<tr>
    <td>
    <div class="form-group"><button class="btn btn-primary btn-block" id="Button1" type="button" onclick="alert(ValidCaptcha());">Check</button></div> -->
        <!-- <input class="captcha" id="Button1" type="button" value="Check" onclick="alert(ValidCaptcha());"/>
    </td>
</tr>
</table> --> 
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="login">Log In</button></div>
            <a href="#" class="forgot">Forgot your email or password?</a> 
            <a href=register.php class="forgot">Register</a> </form>     
            </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    
var refreshButton = document.querySelector(".refresh-captcha");
refreshButton.onclick = function() {
  document.querySelector(".captcha-image").src = '../php/captcha.php?' + Date.now();
}
</script>
</html>