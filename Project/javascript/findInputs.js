/* Made By Ernesto Lang 3/22/15, modified 3/30/15 */

/* The following script retrieves the data from the html form found in createUser.php, first it creates an xmlHTTP object in order to send 
 * data through ajax, once this is done an array is extracted from the html form, the relevant data, meaning the spaces that are not empty, is then 
 * put into another array which is then placed into a JSON and sent to the server(PHP). Once the server responds, depending on whether it succeeded
 * on passing the data to the database or not, a message will be displayed to the user through an alert in the browser
 */


window.onload = function findSubmitButton() {
    var button = document.getElementById("Submit_User").addEventListener("click", serverInteraction); /*Unobtrusive javascript listener, added to 
    																								create account button in html*/
}

function clearInputs(Array){
	for(var i = 0; i < Array.length; i++){
		Array[i].value = '';
	}
	
}

function serverInteraction() {
  var xmlhttp;
  var inputArray;
  var finalArray = [];
  var JSONArray;
  var userId;
  var serverResponse;
  var phoneNumber;
  if (window.XMLHttpRequest){
	  xmlhttp = new XMLHttpRequest();        /* Used for IE7+,FireFox, Opera, Chrome, Safari */
  } else if (window.ActiveXObject) {
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");   /* Compatibility for IE6 browsers */
  } else {
	  throw new Error("Your browser is not compatible with XMLHTTP");
	  return false;
  }
  
  /* The following section validates if the required inputs have text in them and if the password fields match*/
  inputArray = document.querySelectorAll("input[id=register]")
  if (inputArray[1].value != inputArray[2].value){
	  alert("Password doesn't match, please make sure your password matches")
	  clearInputs(inputArray);
	  return false;
  }
  
  phoneNumber = inputArray[7].value;
  if (isNaN(phoneNumber)){
	  alert("You must enter a valid phone number");
	  clearInputs(inputArray);
  }
  
  for(var i = 0; i < inputArray.length; i++){
	  if (inputArray[i].value == ""){
		  alert("Please fill out all of the fields");
		  return false;
	  }
		finalArray[i] = inputArray[i].value;
  }
    JSONArray = JSON.stringify({finalArray: finalArray}); 
	
	xmlhttp.onreadystatechange=function()
	  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200){
				serverResponse = xmlhttp.responseText 
				var code = parseInt(serverResponse);
				if (code == 0){
					alert("The username you have selected already exists. Press ok to re-enter data")
					clearInputs(inputArray);
				} else if(code == 1){
					alert("Account created successfully. Press OK to be redirected");
					window.location = "index.php";
				}
		  }
	  }
	
	xmlhttp.open("POST","php/sendUserInfo.php", true);
	xmlhttp.setRequestHeader("Content-type","application/json;charset=UTF-8");
	xmlhttp.send(JSONArray);
}