/* Code to extract login details from main page. An event listener is added to 
the button used to submit a user's details. AFter that, said information is sent to an 
external php file which is used to check if a user exists and start a session*/

window.onload = function findLoginButton() {
    var button = document.getElementById("start_session").addEventListener("click", sendUserDetails);                      /*Unobtrusive javascript listener, added to */																									/*create account button in html*/
}

function sendUserDetails(){
	var xmlhttp;
	var username;
	var password;
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

  username = document.getElementById("login_username");
  password = document.getElementById("login_password");

  if (username.value == ""  || password.value == "" ){
	  alert("Please, fill out all fields before submitting");
	  return false;
  }

  dataToSend[0] = username.value;
  dataToSend[1] = password.value;
  JSONdataToSend = JSON.stringify({dataToSend: dataToSend});

  xmlhttp.onreadystatechange=function()
	  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200){
				serverResponse = xmlhttp.responseText
				console.log(serverResponse);
				var code = parseInt(serverResponse);
				console.log(code);
				if(code == 2){
					alert("Admin login succesful.")
					window.location = "index.php";
				} else if(code == 1) {
					alert("Login succesful.");
					window.location = "index.php";
				} else {
					alert("The username or password that you have entered is invalid or it doesn't exist. Please try again, or create an account.");
					username.value = "";
					password.value = "";
					return false;
				}
		  }
	  }

	xmlhttp.open("POST","php/checkUserExistence.php", true);
	xmlhttp.setRequestHeader("Content-type","application/json;charset=UTF-8");
	xmlhttp.send(JSONdataToSend);
}