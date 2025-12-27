<script type="application/javascript">
function submitEditPassword()
{
		document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
		if(document.getElementById("password").value == "")
		{
			document.getElementById("errmsg").innerHTML="Password is mandatory";
			return false;
		}
		else if(document.getElementById("new_password").value == "")
		{
			document.getElementById("errmsg").innerHTML="New Password is mandatory";
			return false;
		}
		else if(document.getElementById("confirm_password").value == "")
			{
				document.getElementById("errmsg").innerHTML="Confirm Password is mandatory";
				return false;
			}
		else 
		{
			if(document.getElementById("new_password").value != document.getElementById("confirm_password").value)
			{
				document.getElementById("errmsg").innerHTML="Password and Confirm Password Do Not Match";
				return false;
			}
		}
		document.getElementById("loading").style.display = "block";
		document.getElementById("errmsg").innerHTML="";
		return true;
}



var frmeditpasswordExists = document.getElementById("frmeditpassword");
if(frmeditpasswordExists)
{
		document.getElementById('frmeditpassword').onsubmit=function(e){
							e.preventDefault();
							var xhr=new XMLHttpRequest();
							var url="../php/changepassword.php";
							xhr.open('post',url,true);
							var formData=new FormData(frmeditpassword);
							formData.append("update", "update");
							xhr.send(formData);
							xhr.onload=function() {
						//	alert(this.response);
							if(this.response == "Updated successfully.")
							{
								document.getElementById("msgstatus").style.display = "block";
								document.getElementById("loading").style.display = "none";
								document.getElementById("msgstatus").innerHTML=this.response;
								const submittedFormId = e.target.id;
								clearForm(submittedFormId);
								setTimeout(()=>{
									document.getElementById("msgstatus").style.display = "none";
								},4000)
							}
							else
							{
								document.getElementById("msgstatus").style.display = "block";
								document.getElementById("msgstatus").innerHTML=this.response;
							}
							};
		};
}

function clearForm(formId)
{
	const form = document.getElementById(formId); // Replace "myForm" with the ID of your form
	const elements = form.elements;
	 for (let i = 0; i < elements.length; i++) 
	 {
		 const element = elements[i];
	
		 // Check if the element is an input or textarea and clear its value
		 if (element.tagName === "INPUT" || element.tagName === "TEXTAREA") {
			 element.value = "";
		 }
	}
}
</script>