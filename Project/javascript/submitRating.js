window.onload = function findSubmitButton() {
    var button = document.getElementById("submit_rating").addEventListener("click", sendRating);																								
}

function sendRating(){
	var xmlhttp;
	var selectorBox = document.getElementById("rating");
	var usernameField = document.getElementById("username");
	var username;
	var rating; 
	var values = [];
	var JSONDataToSend;
	
  if (window.XMLHttpRequest){
	  xmlhttp = new XMLHttpRequest();        /* Used for IE7+,FireFox, Opera, Chrome, Safari */
  } else if (window.ActiveXObject) {
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");   /* Compatibility for IE6 browsers */
  } else {
	  throw new Error("Your browser is not compatible with XMLHTTP");
	  return false;
  }
  
  rating = selectorBox.options[selectorBox.selectedIndex].value;
  username = usernameField.value;
  values[0] = username;
  values[1] = rating;
  JSONDataToSend = JSON.stringify({values: values});

  	xmlhttp.onreadystatechange=function()
	  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200){
				serverResponse = xmlhttp.responseText
				console.log(serverResponse);
				var code = parseInt(serverResponse);
				if (code == 1){
					alert("Rating submission successful");
					selectorBox.disabled = true;
				} else {
					alert("Rating failed to submit");
				}
		  }
	  }
	xmlhttp.open("POST","php/insertBlackListValue.php", true);
	xmlhttp.setRequestHeader("Content-type","application/json;charset=UTF-8");
	xmlhttp.send(JSONDataToSend);
}	
    