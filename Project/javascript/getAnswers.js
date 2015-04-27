window.onload = function findLoginButton() {
    var button = document.getElementById("send_answers").addEventListener("click", sendUserDetails);                      /*Unobtrusive javascript listener, added to */																									/*create account button in html*/
}


function sendUserDetails(){
	var xmlhttp;
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

  
	dataToSend[0] = document.getElementById("question1").value;
	dataToSend[1] = document.getElementById("question2").value;
	dataToSend[2] = document.getElementById("question3").value;
	dataToSend[3] = document.getElementById("question4").value;
	dataToSend[4] = document.getElementById("question5").value;
	dataToSend[5] = document.getElementById("question_group_id").value;
  
	for(var i = 0; i < dataToSend.length; i++){
		if (dataToSend[i] == ""){
			alert("You must fill out all fields to continue.");
			return false;
		}
	}
	
	JSONdataToSend = JSON.stringify({dataToSend: dataToSend});

	xmlhttp.onreadystatechange=function(){
		  if (xmlhttp.readyState==4 && xmlhttp.status==200){
				serverResponse = xmlhttp.responseText
				console.log(serverResponse);
				var code = parseInt(serverResponse);
				if (code == 1){
					alert("Answers submitted successfully, press ok to be redirected.");
					window.location = "index.php";
				}
		  }
	  }
	xmlhttp.open("POST","php/sendAnswers.php", true);
	xmlhttp.setRequestHeader("Content-type","application/json;charset=UTF-8");
	xmlhttp.send(JSONdataToSend);
}