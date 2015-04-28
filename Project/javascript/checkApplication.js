window.onload = function findLoginButton() {
    var button = document.getElementById("send_response").addEventListener("click", sendUserDetails);                      /*Unobtrusive javascript listener, added to */																									/*create account button in html*/
}

function sendUserDetails(){
	var xmlhttp;
	var personId;
	var petId;
	var adoptionId;
	var value;
	var dataToSend = [];
	var JSONdataToSend;


  if (window.XMLHttpRequest){
	  xmlhttp = new XMLHttpRequest();        /* Used for IE7+,FireFox, Opera, Chrome, Safari */
  } else if (window.ActiveXObject) {
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");   /* Compatibility for IE6 browsers */
  } else {
	  throw new Error("Your browser is not compatible with XMLHTTP");
	  return false;
  }
  
  personId = document.getElementById("personId").value;
  petId = document.getElementById("petId").value;
  adoptionId = document.getElementById("adoptionId").value;
 
  if(document.getElementById("accept").checked){
		value = document.getElementById("accept").value;
	} else if (document.getElementById("deny").checked) {
		value = document.getElementById("deny").value;
	}
  
  dataToSend[0] = personId;
  dataToSend[1] = petId;
  dataToSend[2] = value;
  dataToSend[3] = adoptionId;
  console.log(dataToSend);
  
  JSONdataToSend = JSON.stringify({dataToSend: dataToSend});
  	xmlhttp.onreadystatechange=function()
	  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200){
				serverResponse = xmlhttp.responseText
				console.log(serverResponse);
				var code = parseInt(serverResponse);
				if (code == 1){
					alert("Response sent.")
					clearInputs(inputArray);
				} else{
					alert("There was a problem with the submission");
				}
		  }
	  }
	xmlhttp.open("POST","php/insertApplication.php", true);
	xmlhttp.setRequestHeader("Content-type","application/json;charset=UTF-8");
	xmlhttp.send(JSONdataToSend);
	
}
  
  