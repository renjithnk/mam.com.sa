<script type="application/javascript">
function submitGccTransport()
{
		document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
		
		
		
		if(document.getElementById("title").value == "")
		{
			document.getElementById("errmsg").innerHTML="Title is mandatory";
			return false;
		}
		else if(document.getElementById("description").value == "")
		{
			document.getElementById("errmsg").innerHTML="Description is mandatory";
			return false;
		}
		/*else if(document.getElementById("image").value == "")
		{
			document.getElementById("errmsg").innerHTML="Image is mandatory";
			return false;
		}*/
		else if(document.getElementById("icon_image1_alt").value == "")
		{
			document.getElementById("errmsg").innerHTML="Icon Image Alt is mandatory";
			return false;
		}
		else 
		{
			if(document.getElementById("icon_image1_description").value == "")
			{
				document.getElementById("errmsg").innerHTML="Description is mandatory";
				return false;
			}
		}
		document.getElementById("loading").style.display = "block";
		document.getElementById("errmsg").innerHTML="";
		return true;
}



var frmaddgcctransportExists = document.getElementById("frmaddgcctransport");
if(frmaddgcctransportExists)
{
		document.getElementById('frmaddgcctransport').onsubmit=function(e){
						e.preventDefault();
						var xhr=new XMLHttpRequest();
						var url="../php/gcctransportbrief.php";
						xhr.open('post',url,true);
						var formData=new FormData(frmaddgcctransport);
						formData.append("add", "add");
						xhr.send(formData);
						xhr.onload=function() {
						console.log(this.response);
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

function editGccTransport(id)
{
	 window.location.href="edit.php?id="+id;
}


function submitUpdateGccTransport()
{
		document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
		
		
		if(document.getElementById("title").value == "")
		{
			document.getElementById("errmsg").innerHTML="Title is mandatory";
			return false;
		}
		else if(document.getElementById("description").value == "")
		{
			document.getElementById("errmsg").innerHTML="Description is mandatory";
			return false;
		}
		/*else if(document.getElementById("image").value == "")
		{
			document.getElementById("errmsg").innerHTML="Image is mandatory";
			return false;
		}*/
		else if(document.getElementById("icon_image1_alt").value == "")
		{
			document.getElementById("errmsg").innerHTML="Icon Image Alt is mandatory";
			return false;
		}
		else 
		{
				if(document.getElementById("icon_image1_description").value == "")
				{
					document.getElementById("errmsg").innerHTML="Description is mandatory";
					return false;
				}
		}
		document.getElementById("loading").style.display = "block";
		document.getElementById("errmsg").innerHTML="";
		return true;
}
	
var frmeditgcctransportExists = document.getElementById("frmeditgcctransport");
if(frmeditgcctransportExists)
{
		document.getElementById('frmeditgcctransport').onsubmit=function(e){
					e.preventDefault();
					var xhr=new XMLHttpRequest();
					var url="../php/gcctransportbrief.php";
					xhr.open('post',url,true);
					var formData=new FormData(frmeditgcctransport);
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

function deleteGccTransport(id)
{
		var result = confirm("Are you sure to delete?");
	    if(result)
		{
				var xhr=new XMLHttpRequest();
				var url="../php/gcctransportbrief.php";
				xhr.open('post',url,true);
				var formData=new FormData(frmlistgcctransport);
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