window.onload = function findUploadButton(){
	 var button = document.getElementById("upload_image").addEventListener("click", sendImage); 
}

function sendImage(){
	var xmlhttp;
	var imageURL = document.getElementById("image_name");
	var image;
	var serverResponse;
	var regex =  /^https?:\/\/(?:[a-z\-]+\.)+[a-z]{2,6}(?:\/[^\/#?]+)+\.(?:jpe?g|gif|png)$/;
	
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();        /* Used for IE7+,FireFox, Opera, Chrome, Safari */
	} else if (window.ActiveXObject) {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");   /* Compatibility for IE6 browsers */
	} else {
		throw new Error("Your browser is not compatible with XMLHTTP");
		return false;
	}
  
	if (imageURL.value == "" || ! regex.test(imageURL.value)){
		alert("The image was not selected, please select an image before pressing upload.")
		imageURL.value = "";
		return false;
	} else {
		image = imageURL.value;
	}
	
	 xmlhttp.onreadystatechange=function()
	  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200){
				serverResponse = xmlhttp.responseText;
				var code = parseInt(serverResponse);
				if(code == 1){
					alert("Image uploaded succesfully.");
					location.reload();
				} else{
					alert("Image upload has failed, please try again.")
				}
		  }
	  }
	  
	xmlhttp.open("POST","php/insertImage.php", true);
	xmlhttp.send(image);
}
