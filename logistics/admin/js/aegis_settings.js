<script type="application/javascript">
function submitAegisSettings()
{
		document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
		
		if(document.getElementById("caption").value == "")
		{
			document.getElementById("errmsg").innerHTML="Caption is mandatory";
			return false;
		}
		else if(document.getElementById("address1").value == "")
		{
			document.getElementById("errmsg").innerHTML="Address1 is mandatory";
			return false;
		}
		else if(document.getElementById("address2").value == "")
		{
			document.getElementById("errmsg").innerHTML="Address2 is mandatory";
			return false;
		}
		else if(document.getElementById("address3").value == "")
		{
			document.getElementById("errmsg").innerHTML="Address3 is mandatory";
			return false;
		}
		else if(document.getElementById("address4").value == "")
		{
			document.getElementById("errmsg").innerHTML="Address4 is mandatory";
			return false;
		}
		else if(document.getElementById("country").value == "")
		{
			document.getElementById("errmsg").innerHTML="Country is mandatory";
			return false;
		}
		else if(document.getElementById("email1").value == "")
		{
			document.getElementById("errmsg").innerHTML="Email is mandatory";
			return false;
		}
		else if(document.getElementById("email2").value == "")
		{
			document.getElementById("errmsg").innerHTML="Email is mandatory";
			return false;
		}
		else if(document.getElementById("contactno1").value == "")
		{
			document.getElementById("errmsg").innerHTML="Contact No 1 is mandatory";
			return false;
		}
		else if(document.getElementById("branch1").value == "")
		{
			document.getElementById("errmsg").innerHTML="Branch1 is mandatory";
			return false;
		}
		else 
		{
			if(document.getElementById("logo_alt").value == "")
			{
				document.getElementById("errmsg").innerHTML="Logo Alt is mandatory";
				return false;
			}
		}
		document.getElementById("loading").style.display = "block";
		document.getElementById("errmsg").innerHTML="";
		return true;
}



var frmaddaegissettingsExists = document.getElementById("frmaddaegissettings");
if(frmaddaegissettingsExists)
{
		document.getElementById('frmaddaegissettings').onsubmit=function(e){
						e.preventDefault();
						var xhr=new XMLHttpRequest();
						var url="../php/aegis_settings.php";
						xhr.open('post',url,true);
						var formData=new FormData(frmaddaegissettings);
						formData.append("add", "add");
						xhr.send(formData);
						xhr.onload=function() {
						if(this.response == "New Record Added Successfully.")
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
				};
		};
}

function editAegisSettings(id)
{
	 window.location.href="edit.php?id="+id;
}


function submitUpdateAegisSettings()
{
		document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
		
		
		if(document.getElementById("caption").value == "")
		{
			document.getElementById("errmsg").innerHTML="Caption is mandatory";
			return false;
		}
		else if(document.getElementById("address1").value == "")
		{
			document.getElementById("errmsg").innerHTML="Address1 is mandatory";
			return false;
		}
		else if(document.getElementById("address2").value == "")
		{
			document.getElementById("errmsg").innerHTML="Address2 is mandatory";
			return false;
		}
		else if(document.getElementById("address3").value == "")
		{
			document.getElementById("errmsg").innerHTML="Address3 is mandatory";
			return false;
		}
		else if(document.getElementById("address4").value == "")
		{
			document.getElementById("errmsg").innerHTML="Address4 is mandatory";
			return false;
		}
		else if(document.getElementById("country").value == "")
		{
			document.getElementById("errmsg").innerHTML="Country is mandatory";
			return false;
		}
		else if(document.getElementById("email1").value == "")
		{
			document.getElementById("errmsg").innerHTML="Email is mandatory";
			return false;
		}
		else if(document.getElementById("email2").value == "")
		{
			document.getElementById("errmsg").innerHTML="Email is mandatory";
			return false;
		}
		else if(document.getElementById("contactno1").value == "")
		{
			document.getElementById("errmsg").innerHTML="Contact No 1 is mandatory";
			return false;
		}
		else if(document.getElementById("branch1").value == "")
		{
			document.getElementById("errmsg").innerHTML="Branch1 is mandatory";
			return false;
		}
		else 
		{
			if(document.getElementById("logo_alt").value == "")
			{
				document.getElementById("errmsg").innerHTML="Logo Alt is mandatory";
				return false;
			}
		}
		document.getElementById("loading").style.display = "block";
		document.getElementById("errmsg").innerHTML="";
		return true;
}
	
var frmeditaegissettingsExists = document.getElementById("frmeditaegissettings");
if(frmeditaegissettingsExists)
{
		document.getElementById('frmeditaegissettings').onsubmit=function(e){
					e.preventDefault();
					var xhr=new XMLHttpRequest();
					var url="../php/aegis_settings.php";
					xhr.open('post',url,true);
					var formData=new FormData(frmeditaegissettings);
					formData.append("update", "update");
					xhr.send(formData);
					xhr.onload=function() {
				//	alert(this.response);
				//	console.log(this.response);
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

function deleteAegisSettings(id)
{
		var result = confirm("Are you sure to delete?");
	    if(result)
		{
				var xhr=new XMLHttpRequest();
				var url="../php/aegis_settings.php";
				xhr.open('post',url,true);
				var formData=new FormData(frmlistaegissettings);
				formData.append("delete", "delete");
				formData.append("id", id);
				xhr.send(formData);
				xhr.onload=function() {
					alert(this.response);
				if(this.response == "Deleted Successfully.")
				{
					document.getElementById("msgstatus").style.display = "block";
					document.getElementById("loading").style.display = "none";
					document.getElementById("msgstatus").innerHTML=this.response;
					setTimeout(()=>{
						document.getElementById("msgstatus").style.display = "none";
					},4000)
					window.location.href="list.php";
					document.getElementById("msgstatus").style.display = "block";
					document.getElementById("loading").style.display = "none";
					document.getElementById("msgstatus").innerHTML=this.response;
				}
				};
		}
}
</script>