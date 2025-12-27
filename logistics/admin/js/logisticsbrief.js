<script type="application/javascript">
function submitLogistics()
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
		else if(document.getElementById("short_title").value == "")
		{
			document.getElementById("errmsg").innerHTML="Short Title is mandatory";
			return false;
		}
		else 
		{
				if(document.getElementById("short_description").value == "")
				{
					document.getElementById("errmsg").innerHTML="Short Description is mandatory";
					return false;
				}
		}
		document.getElementById("loading").style.display = "block";
		document.getElementById("errmsg").innerHTML="";
		return true;
}



var frmaddlogisticsExists = document.getElementById("frmaddlogistics");
if(frmaddlogisticsExists)
{
		document.getElementById('frmaddlogistics').onsubmit=function(e){
						e.preventDefault();
						var xhr=new XMLHttpRequest();
						var url="../php/logisticsbrief.php";
						xhr.open('post',url,true);
						var formData=new FormData(frmaddlogistics);
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

function editLogistics(id)
{
	 window.location.href="edit.php?id="+id;
}


function submitUpdateLogistics()
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
		else if(document.getElementById("short_title").value == "")
		{
			document.getElementById("errmsg").innerHTML="Short Title is mandatory";
			return false;
		}
		else 
		{
				if(document.getElementById("short_description").value == "")
				{
					document.getElementById("errmsg").innerHTML="Short Description is mandatory";
					return false;
				}
		}
		document.getElementById("loading").style.display = "block";
		document.getElementById("errmsg").innerHTML="";
		return true;
}
	
var frmeditlogisticsExists = document.getElementById("frmeditlogistics");
if(frmeditlogisticsExists)
{
		document.getElementById('frmeditlogistics').onsubmit=function(e){
					e.preventDefault();
					var xhr=new XMLHttpRequest();
					var url="../php/logisticsbrief.php";
					xhr.open('post',url,true);
					var formData=new FormData(frmeditlogistics);
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

function deleteLogistics(id)
{
		var result = confirm("Are you sure to delete?");
	    if(result)
		{
				var xhr=new XMLHttpRequest();
				var url="../php/logisticsbrief.php";
				xhr.open('post',url,true);
				var formData=new FormData(frmlistlogistics);
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