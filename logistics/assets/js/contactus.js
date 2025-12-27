var frmContactusExists = document.getElementById("frmcontactus");
if (frmContactusExists) {
  document.getElementById("frmcontactus").onsubmit = function (e) {
    e.preventDefault();
    var xhr = new XMLHttpRequest();
    var url = "functions/contact.php";
    xhr.open("post", url, true);
    var formData = new FormData(frmcontactus);
    xhr.send(formData);
    xhr.onload = function () {
			  if(this.response == "Message has been sent") 
			  {
						 const submittedFormId = e.target.id;
						 setTimeout(() => {
						  clearForm(submittedFormId);
						  location.href = "thank-you.php";
						 }, 4000);
			  }
			  else
			  {
				  document.getElementById("loading").style.display = "none";
				  document.getElementById("errmsg").innerHTML = this.response;
			  }
    };
  };
}
function submitEnquiry() {
  document.getElementById("errmsg").innerHTML = "";
  document.getElementById("loading").style.display = "none";
  document.getElementById("msgstatus").style.display = "none";
  if (document.getElementById("name").value == "") {
    document.getElementById("errmsg").innerHTML = "Name is mandatory";
    return false;
  } else if (document.getElementById("email").value == "") {
    document.getElementById("errmsg").innerHTML = "Email is mandatory";
    return false;
  } else if (document.getElementById("mobileno").value == "") {
    document.getElementById("errmsg").innerHTML = "Mobile No is mandatory";
    return false;
  } 
  else {
    if (document.getElementById("mobileno").value != "") {
      var mobileNo = document.getElementById("mobileno").value;
      if (mobileNo.length > 20) {
        document.getElementById("errmsg").innerHTML = "Mobile No is not valid";
        return false;
      }
    }
  }
  document.getElementById("loading").style.display = "block";
  document.getElementById("errmsg").innerHTML = "";
  return true;
}