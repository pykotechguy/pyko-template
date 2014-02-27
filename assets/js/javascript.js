// JavaScript Document



$(function(){
   
    $(".imgicon").hover(function(){
        $(".slidediv").parent("div").find("div").slideDown("moderate");
    },function(){
        $(".slidediv").parent("div").find("div").slideUp("moderate");    
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
