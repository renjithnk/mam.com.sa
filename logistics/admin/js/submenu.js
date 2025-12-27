<script type="application/javascript">
function submitSubMenu()
{
		document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
		if(document.getElementById("service_id").value == "")
		{
			document.getElementById("errmsg").innerHTML="Service is mandatory";
			return false;
		}
		else 
		{
			if(document.getElementById("name").value == "")
			{
				document.getElementById("errmsg").innerHTML="Name is mandatory";
				return false;
			}
		}
	/*	document.getElementById("loading").style.display = "block";*/
		document.getElementById("errmsg").innerHTML="";
		return true;
}


var frmaddsubmenuExists = document.getElementById("frmaddsubmenu");
if(frmaddsubmenuExists)
{
		document.getElementById('frmaddsubmenu').onsubmit=function(e){
					const name = document.getElementById("name").value;
					if(name != "")
					{
							e.preventDefault();
							var xhr=new XMLHttpRequest();
							var url="../php/submenu.php";
							xhr.open('post',url,true);
							var formData=new FormData(frmaddsubmenu);
							formData.append("add", "add");
							xhr.send(formData);
							xhr.onload=function() {
							if(this.response == "New record created successfully.")
							{
								document.getElementById("msgstatus").style.display = "block";
								document.getElementById("loading").style.display = "none";
								document.getElementById("msgstatus").innerHTML=this.response;
								const submittedFormId = e.target.id;
								clearForm(submittedFormId);
								setTimeout(()=>{
									document.getElementById("msgstatus").style.display = "none";
								},4000)
							}};
					 }
					 else
					 {
							 e.preventDefault();
					 }
		};
}

function editSubMenu(id)
{
	 window.location.href="edit.php?id="+id;
}


function submitEditSubMenu()
{
		const name = document.getElementById("name").value;
		document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
		if(document.getElementById("service_id").value == "")
		{
			document.getElementById("errmsg").innerHTML="Service is mandatory";
			return false;
		}
		else 
		{
			if(document.getElementById("name").value == "")
			{
				document.getElementById("errmsg").innerHTML="Name is mandatory";
				return false;
			}
		}
		
		/*document.getElementById("loading").style.display = "block";*/
		document.getElementById("errmsg").innerHTML="";
		return true;
}
	
var frmeditsubmenuExists = document.getElementById("frmeditsubmenu");
if(frmeditsubmenuExists)
{
		document.getElementById('frmeditsubmenu').onsubmit=function(e){
					const name = document.getElementById("name").value;
					if(name != "")
					{
									e.preventDefault();
									var xhr=new XMLHttpRequest();
									var url="../php/submenu.php";
									xhr.open('post',url,true);
									var formData=new FormData(frmeditsubmenu);
									formData.append("name", name);
									formData.append("update", "update");
									xhr.send(formData);
									xhr.onload=function() {
									if(this.response == "Updated successfully.")
									{
										document.getElementById("msgstatus").style.display = "block";
										document.getElementById("loading").style.display = "none";
										document.getElementById("msgstatus").innerHTML=this.response;
										const submittedFormId = e.target.id;
									//	frmeditsubmenu.reset();
										clearForm(submittedFormId);
										setTimeout(()=>{
											document.getElementById("msgstatus").style.display = "none";
										},4000)
									}};
					}
					else
					{
							 e.preventDefault();
					}
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

function deleteSubMenu(id)
{
		var result = confirm("Are you sure to delete?");
	    if(result)
		{
				var xhr=new XMLHttpRequest();
				var url="../php/submenu.php";
				xhr.open('post',url,true);
				var formData=new FormData(frmlistsubmenu);
				formData.append("delete", "delete");
				formData.append("id", id);
				xhr.send(formData);
				xhr.onload=function() {
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