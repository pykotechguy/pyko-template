<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>login proto</title>
    <link href="<?=base_url()?>assets/css/login.css" rel="stylesheet">
  </head>
    <script type="text/javascript" src="<?=base_url()?>assets/js/login.js"></script>
<body>

<div id="header"></div>

<div id="loginbox">
	<div id="schoolbox">
    	<div id="schoollogobox">
 			<img id="schoollogo"src="<?=base_url()?>assets/images/login/makatimedlogo.png">       
        </div>
        <div id="schooltextbox">
        	Makati Medical Center College
        </div>    
    </div>
<div id="inputbox">
  <form>
    	<br/>
        <input type="text" id="textuser" class="textfield" value="User ID" onfocus="inputFocus(this)" onblur="inputBlur(this)">    
      	<input type="password" id="textpassword" class="textfield" placeholder="Password" onfocus="inputFocus(this)" onblur="inputBlur(this)">
        
   		<a href="<?=site_url('loader/index/v1');?>" id="loginbtn">LOGIN</a>
        	<!--<input type="submit" id="loginbtn" value="LOG IN" >-->
        
  </form>
  <div id="orangelogo">
  	<img src="<?=base_url()?>assets/images/login/loadinglogo.png">
  </div>
</div>
</body>
</html>
