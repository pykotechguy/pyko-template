<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>TeacherDashboard | Pisara Prototype</title>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashboard.css">

</head>

<body>

<script src="http://code.jquery.com/jquery.js"></script>


<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>

// JavaScript Document



$(function(){
   
    $("#divgrades").hover(function(){
        $("#slidegrades").slideDown("moderate");
    },function(){
        $("#slidegrades").parent("div").find("div").slideUp("moderate");    
    });
	
	$("#divclasses").hover(function(){
        $("#slideclasses").slideDown("moderate");
    },function(){
        $("#slideclasses").parent("div").find("div").slideUp("moderate");    
    });
	
	$("#divaccount").hover(function(){
        $("#slideaccount").slideDown("moderate");
    },function(){
        $("#slideaccount").parent("div").find("div").slideUp("moderate");    
    });
	
	$("#divprofile").hover(function(){
        $("#slideprofile").slideDown("moderate");
    },function(){
        $("#slideprofile").parent("div").find("div").slideUp("moderate");    
    });
	
	$("#divenroll").hover(function(){
        $("#slideenroll").slideDown("moderate");
    },function(){
        $("#slideenroll").parent("div").find("div").slideUp("moderate");    
    });
	
	$("#divperformance").hover(function(){
        $("#slideperformance").slideDown("moderate");
    },function(){
        $("#slideperformance").parent("div").find("div").slideUp("moderate");    
    });
	
	
 
    
});


// for TEACHER GRADE AND CLASS
//SLIDER 1 - CASTILLO
$(function() {
    $( "#slider1" ).slider({
      value: 0,
      min: 0,
      max: 4,
      step: 0.5,
	  range: "min",
     
     	slide: function( event, ui ) {
        
			$( "#gradelabel1" ).val( ui.value );
			
			$( "#gradesave1" ).delay(3000).fadeIn(3000);
      	
		}
		
	
		
		

    });
	
	

    $( "#gradelabel1" ).val( $( "#slider1" ).slider( "value" ) );
	
	

  });
  
  
//SLIDER 2 - CASTRO
$(function() {
    $( "#slider2" ).slider({
      value: 0,
      min: 0,
      max: 4,
      step: 0.5,
	  range: "min",
     
     	slide: function( event, ui ) {
        
			$( "#gradelabel2" ).val( ui.value );
			
			$( "#gradesave2" ).delay(3000).fadeIn(3000);
      	
		}
		
	
		
		

    });
	
	

    $( "#gradelabel2" ).val( $( "#slider2" ).slider( "value" ) );
	
	

  });
  
  
//SLIDER 3 - DOLLOSA
$(function() {
    $( "#slider3" ).slider({
      value: 0,
      min: 0,
      max: 4,
      step: 0.5,
	  range: "min",
     
     	slide: function( event, ui ) {
        
			$( "#gradelabel3" ).val( ui.value );
			
			$( "#gradesave3" ).delay(3000).fadeIn(3000);
      	
		}
		
	
		
		

    });
	
	

    $( "#gradelabel3" ).val( $( "#slider3" ).slider( "value" ) );
	
	

  });
  
  
//SLIDER 4 - JAVELONA
$(function() {
    $( "#slider4" ).slider({
      value: 0,
      min: 0,
      max: 4,
      step: 0.5,
	  range: "min",
     
     	slide: function( event, ui ) {
        
			$( "#gradelabel4" ).val( ui.value );
			
			$( "#gradesave4" ).delay(3000).fadeIn(3000);
      	
		}
		
	
		
		

    });
	
	

    $( "#gradelabel4" ).val( $( "#slider4" ).slider( "value" ) );
	
	

  });
  
  
//SLIDER 5 - PALALA
$(function() {
    $( "#slider5" ).slider({
      value: 0,
      min: 0,
      max: 4,
      step: 0.5,
	  range: "min",
     
     	slide: function( event, ui ) {
        
			$( "#gradelabel5" ).val( ui.value );
			
			$( "#gradesave5" ).delay(3000).fadeIn(3000);
      	
		}
		
	
		
		

    });
	
	

    $( "#gradelabel5" ).val( $( "#slider5" ).slider( "value" ) );
	
	

  });
  
  
//SLIDER 6 - TAMAD
$(function() {
    $( "#slider6" ).slider({
      value: 0,
      min: 0,
      max: 4,
      step: 0.5,
	  range: "min",
     
     	slide: function( event, ui ) {
        
			$( "#gradelabel6" ).val( ui.value );
			
			$( "#gradesave6" ).delay(3000).fadeIn(3000);
      	
		}
		
	
		
		

    });
	
	

    $( "#gradelabel6" ).val( $( "#slider6" ).slider( "value" ) );
	
	

  });
  
  
function DoNav(url)
{
   document.location.href = url;
}


//for DASHBOARD



</script>


<div id="canvasheader">
        	<img src="pisaralogo2.png" id="headerlogo" align="middle" alt=""/>
            <!--<img src="pisaralogo2.png" id="headerlogo2" align="middle" alt=""/>-->
          <div id="toprightlabel">
                <div id="sessionname">GIAN JAVELONA</div>
                <div id="logoutsign"><img src="logoutsign.png" alt=""/></div>
            </div>
            
        </div>

<br/>


<div id="canvas">

	<!--GRADES-->
	<a href="<?=base_url('loader/v2')?>" id="modulelink">
    <div id="divgrades" class="divicon">
    	<span class="moduletext">GRADES</span>
        <img src="dllb.png" id="icongrades" class="imgicon"/> 
        <div class="slidediv" id="slidegrades">
        	<p id="textgrades" class="slidetext"> View your Grades </p>   
        </div>
    </div>
    </a>
    
    <!--CLASSES-->

    <div id="divclasses" class="divicon">
        <span class="moduletext">CLASSES</span>
        <img src="d22.png" id="icongrades" class="imgicon"/> 
        <div class="slidediv" id="slideclasses">
        	<p id="textclasses" class="slidetext"> View your Class Schedule </p>   
        </div>
        
    </div>

    
    <!--ACCOUNT-->
    <div id="divaccount" class="divicon">
        <span class="moduletext">ACCOUNT</span>
        <img src="d33.png" id="iconaccount" class="imgicon"/> 
        <div class="slidediv" id="slideaccount">
        	<p id="textaccount" class="slidetext"> View status of your Student Account </p>   
        </div>
        
    </div>
    
    <!--PROFILE-->

    <div id="divprofile" class="divicon">
        <span class="moduletext">PROFILE</span>
        <img src="d44.png" id="iconprofile" class="imgicon"/> 
        <div class="slidediv" id="slideprofile">
        	<p id="textprofile" class="slidetext"> View your Personal Profile </p>   
        </div>
        
    </div>
    
    <!--ENROLL-->

    <div id="divenroll" class="divicon">
        <span class="moduletext">ENROLL</span>
        <img src="d55.png" id="iconenroll" class="imgicon"/> 
        <div class="slidediv" id="slideenroll">
        	<p id="textenroll" class="slidetext"> Enroll you subjects next term </p>   
        </div>
        
    </div>
    
    
    <!--PERFORMANCE-->

    <div id="divperformance" class="divicon">
        <span class="moduletext">PERFORMANCE</span>
        <img src="d66.png" id="icongrades" class="imgicon"/> 
        <div class="slidediv" id="slideperformance">
        	<p id="textperformance" class="slidetext"> View status of your school Performance </p>   
        </div>
        
    </div>
    
</div>
</body>
</html>
