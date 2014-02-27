<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Teacher 1Dashboard Prototype</title>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashboard.css">

</head>

<body>

<script src="http://code.jquery.com/jquery.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/respond.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="<?=base_url()?>assets/js/dashboard/javascript.js"></script>


<div id="canvasheader">
        	<img src="<?=base_url()?>assets/images/pisaralogo2.png" id="headerlogo" align="middle" alt=""/>
            <!--<img src="pisaralogo2.png" id="headerlogo2" align="middle" alt=""/>-->
          <div id="toprightlabel">
                <div id="sessionname">LUIGI DOLLOSA</div>
                <div id="logoutsign"><a href="<?=site_url('logout')?>"><img src="<?php echo base_url(); ?>assets/img/logoutsign.png" alt="LOGOUT"/></a></div>
            </div>
            
        </div>

<br/>


<div id="canvas">

	<!--GRADES-->
	<a href="<?php echo base_url('loader/index/v2');?>" id="modulelink">
    <div id="divgrades" class="divicon">
    	<span class="moduletext">GRADES</span>
        <img src="<?=base_url()?>assets/img/dllb.png" id="icongrades" class="imgicon"/> 
        <div class="slidediv" id="slidegrades">
        	<p id="textgrades" class="slidetext"> View your Grades </p>   
        </div>
    </div>
    </a>
    
    <!--CLASSES-->

    <div id="divclasses" class="divicon">
        <span class="moduletext">CLASSES</span>
        <img src="<?=base_url()?>assets/img/d22.png" id="icongrades" class="imgicon"/> 
        <div class="slidediv" id="slideclasses">
        	<p id="textclasses" class="slidetext"> View your Class Schedule </p>   
        </div>
        
    </div>

    
    <!--ACCOUNT-->
    <div id="divaccount" class="divicon">
        <span class="moduletext">ACCOUNT</span>
        <img src="<?=base_url()?>assets/img/d33.png" id="iconaccount" class="imgicon"/> 
        <div class="slidediv" id="slideaccount">
        	<p id="textaccount" class="slidetext"> View status of your Student Account </p>   
        </div>
        
    </div>
    
    <!--PROFILE-->

    <div id="divprofile" class="divicon">
        <span class="moduletext">PROFILE</span>
        <img src="<?=base_url()?>assets/img/d44.png" id="iconprofile" class="imgicon"/> 
        <div class="slidediv" id="slideprofile">
        	<p id="textprofile" class="slidetext"> View your Personal Profile </p>   
        </div>
        
    </div>
    
    <!--ENROLL-->

    <div id="divenroll" class="divicon">
        <span class="moduletext">ENROLL</span>
        <img src="<?=base_url()?>assets/img/d55.png" id="iconenroll" class="imgicon"/> 
        <div class="slidediv" id="slideenroll">
        	<p id="textenroll" class="slidetext"> Enroll you subjects next term </p>   
        </div>
        
    </div>
    
    
    <!--PERFORMANCE-->

    <div id="divperformance" class="divicon">
        <span class="moduletext">PERFORMANCE</span>
        <img src="<?=base_url()?>assets/img/d66.png" id="icongrades" class="imgicon"/> 
        <div class="slidediv" id="slideperformance">
        	<p id="textperformance" class="slidetext"> View status of your school Performance </p>   
        </div>
        
    </div>
    
</div>
</body>
</html>
