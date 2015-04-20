/* The following code keeps track of user sessions through 
ajax requests */

window.onload = runFunctions();

function runFunctions() {
	  getSessionData();
      setTimeout(getSessionData, 600000);
	  console.log("something was done");
}

function getSessionData(){
	var xmlhttp;
	var serverResponse;
	console.log("something was done");
	
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
				console.log("xyz");
		  }
   xmlhttp.open("GET", "php/sendSessionData.php", true);
   xmlhttp.send();
   }

}