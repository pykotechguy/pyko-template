// JavaScript Document

$(document).ready(function(){ 
	$("#login").click(function (){
		  $(this).hide( "slide",{ direction: "down" }, 1000); 
	});
});

function inputFocus(i){
    if(i.value==i.defaultValue){ i.value=""; i.style.color="#000"; }
}
function inputBlur(i){
    if(i.value==""){ i.value=i.defaultValue; i.style.color="#888"; }
}