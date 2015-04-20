window.onload = function getButton(){
	var button = document.getElementById("logout").addEventListener("click", endSession);    	/*Unobtrusive javascript listener, added to button */	
	
	
}


function endSession(){
	var xmlhttp;
	console.log("something");
	
  if (window.XMLHttpRequest){
	  xmlhttp = new XMLHttpRequest();        /* Used for IE7+,FireFox, Opera, Chrome, Safari */
  } else if (window.ActiveXObject) {
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");   /* Compatibility for IE6 browsers */
  } else {
	  throw new Error("Your browser is not compatible with XMLHTTP");
	  return false;
  }
  
   xmlhttp.onreadystatechange=function(){
		  if (xmlhttp.readyState==4 && xmlhttp.status==200){
				serverResponse = xmlhttp.responseText
				console.log(serverResponse);
				var code = parseInt(serverResponse);
				if(code == 1){
					alert("Logout successful. Press ok to be redirected");
					window.location = "index.php"
				} else {
					alert("Logout unsuccesful. Please try again");
				}
		  }	
		  
		  
   }
  xmlhttp.open("GET","php/logout.php", true);
  xmlhttp.send();
}
  