window.onload = function findUploadButton(){
	 var button = document.getElementById("Submit_Return").addEventListener("click", sendImage); 
}

function sendImage(){
	var xmlhttp;
	var serverResponse;
	var option;
	var reason;
	var petId;
	var dataToSend = [];
	var JSONData;
	
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();        /* Used for IE7+,FireFox, Opera, Chrome, Safari */
	} else if (window.ActiveXObject) {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");   /* Compatibility for IE6 browsers */
	} else {
		throw new Error("Your browser is not compatible with XMLHTTP");
		return false;
	}
	
	petId = document.getElementById("pet code").value;
	option = document.getElementById("options");
	reason = option.options[options.selectedIndex].value;
	
	dataToSend[0] = petId;
	dataToSend[1] = reason;
	
	console.log(dataToSend);
	
	JSONdata = JSON.stringify({dataToSend: dataToSend});
	
	xmlhttp.onreadystatechange=function()
	  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200){
				serverResponse = xmlhttp.responseText
				console.log(serverResponse);
				var code = parseInt(serverResponse);
				if (code == 1){
					alert("Response sent.")
					window.location = "index.php"
				} else{
					alert("There was a problem with the submission");
				}
		  }
	  }
	  xmlhttp.open("POST","php/insertReturnForm.php", true);
	  xmlhttp.setRequestHeader("Content-type","application/json;charset=UTF-8");
	  xmlhttp.send(JSONdata);
	
}