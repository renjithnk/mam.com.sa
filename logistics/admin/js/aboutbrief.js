<script type="application/javascript">
function submitAboutBrief()
{
		document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
		
		
		
		if(document.getElementById("caption").value == "")
		{
			document.getElementById("errmsg").innerHTML="Caption is mandatory";
			return false;
		}
		else if(document.getElementById("description").value == "")
		{
			document.getElementById("errmsg").innerHTML="Description is mandatory";
			return false;
		}
		else if(document.getElementById("image").value == "")
		{
			document.getElementById("errmsg").innerHTML="Image is mandatory";
			return false;
		}
		else if(document.getElementById("alt").value == "")
		{
			document.getElementById("errmsg").innerHTML="Alt is mandatory";
			return false;
		}
		/*else if(document.getElementById("icon_image1").value == "")
		{
			document.getElementById("errmsg").innerHTML="Icon Image1 is mandatory";
			return false;
		}*/
		else if(document.getElementById("icon_image1_alt").value == "")
		{
			document.getElementById("errmsg").innerHTML="Icon Image1 Alt is mandatory";
			return false;
		}
		else if(document.getElementById("icon_image1_description").value == "")
		{
			document.getElementById("errmsg").innerHTML="Icon Image1 Description is mandatory";
			return false;
		}
		/*else if(document.getElementById("icon_image2").value == "")
		{
			document.getElementById("errmsg").innerHTML="Icon Image2 is mandatory";
			return false;
		}*/
		else if(document.getElementById("icon_image2_alt").value == "")
		{
			document.getElementById("errmsg").innerHTML="Icon Image2 Alt is mandatory";
			return false;
		}
		else if(document.getElementById("icon_image2_description").value == "")
		{
			document.getElementById("errmsg").innerHTML="Icon Image2 Description is mandatory";
			return false;
		}
		
		/*else if(document.getElementById("icon_image3").value == "")
		{
			document.getElementById("errmsg").innerHTML="Icon Image3 is mandatory";
			return false;
		}*/
		else if(document.getElementById("icon_image3_alt").value == "")
		{
			document.getElementById("errmsg").innerHTML="Icon Image3 Alt is mandatory";
			return false;
		}
		else 
		{
				if(document.getElementById("icon_image3_description").value == "")
				{
					document.getElementById("errmsg").innerHTML="Icon Image3 Description is mandatory";
					return false;
				}
		}
		document.getElementById("loading").style.display = "block";
		document.getElementById("errmsg").innerHTML="";
		return true;
}



var frmaddaboutbriefExists = document.getElementById("frmaddaboutbrief");
if(frmaddaboutbriefExists)
{
		document.getElementById('frmaddaboutbrief').onsubmit=function(e){
						e.preventDefault();
						var xhr=new XMLHttpRequest();
						var url="../php/aboutbrief.php";
						xhr.open('post',url,true);
						var formData=new FormData(frmaddaboutbrief);
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

function editAboutBrief(id)
{
	 window.location.href="edit.php?id="+id;
}


function submitUpdateAboutBrief()
{
		document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
		
		
		if(document.getElementById("caption").value == "")
		{
			document.getElementById("errmsg").innerHTML="Caption is mandatory";
			return false;
		}
		else if(document.getElementById("description").value == "")
		{
			document.getElementById("errmsg").innerHTML="Description is mandatory";
			return false;
		}
		/*else if((document.getElementById("image").value == "") && (document.getElementById("imgPath").src == ""))
		{
			document.getElementById("errmsg").innerHTML="Image is mandatory";
			return false;
		}*/
		else if(document.getElementById("alt").value == "")
		{
			document.getElementById("errmsg").innerHTML="Alt is mandatory";
			return false;
		}
		/*else if(document.getElementById("icon_image1").value == "")
		{
			document.getElementById("errmsg").innerHTML="Icon Image1 is mandatory";
			return false;
		}*/
		else if(document.getElementById("icon_image1_alt").value == "")
		{
			document.getElementById("errmsg").innerHTML="Icon Image1 Alt is mandatory";
			return false;
		}
		else if(document.getElementById("icon_image1_description").value == "")
		{
			document.getElementById("errmsg").innerHTML="Icon Image1 Description is mandatory";
			return false;
		}
		/*else if(document.getElementById("icon_image2").value == "")
		{
			document.getElementById("errmsg").innerHTML="Icon Image2 is mandatory";
			return false;
		}*/
		else if(document.getElementById("icon_image2_alt").value == "")
		{
			document.getElementById("errmsg").innerHTML="Icon Image2 Alt is mandatory";
			return false;
		}
		else if(document.getElementById("icon_image2_description").value == "")
		{
			document.getElementById("errmsg").innerHTML="Icon Image2 Description is mandatory";
			return false;
		}
		
		/*else if(document.getElementById("icon_image3").value == "")
		{
			document.getElementById("errmsg").innerHTML="Icon Image3 is mandatory";
			return false;
		}*/
		else if(document.getElementById("icon_image3_alt").value == "")
		{
			document.getElementById("errmsg").innerHTML="Icon Image3 Alt is mandatory";
			return false;
		}
		else 
		{
				if(document.getElementById("icon_image3_description").value == "")
				{
					document.getElementById("errmsg").innerHTML="Icon Image3 Description is mandatory";
					return false;
				}
		}
		document.getElementById("loading").style.display = "block";
		document.getElementById("errmsg").innerHTML="";
		return true;
}
	
var frmeditaboutbriefExists = document.getElementById("frmeditaboutbrief");
if(frmeditaboutbriefExists)
{
		document.getElementById('frmeditaboutbrief').onsubmit=function(e){
					e.preventDefault();
					var xhr=new XMLHttpRequest();
					var url="../php/aboutbrief.php";
					xhr.open('post',url,true);
					var formData=new FormData(frmeditaboutbrief);
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

function deleteAboutBrief(id)
{
		var result = confirm("Are you sure to delete?");
	    if(result)
		{
				var xhr=new XMLHttpRequest();
				var url="../php/aboutbrief.php";
				xhr.open('post',url,true);
				var formData=new FormData(frmlistaboutbrief);
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