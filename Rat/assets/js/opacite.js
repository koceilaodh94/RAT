window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
 
	document.getElementById("navbar").style.opacity= "0.50";
	
  } else {

 	document.getElementById("navbar").style.opacity= "1";

    
  }
} 