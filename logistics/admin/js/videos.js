<script type="application/javascript">
function submitVideos()
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
			if(document.getElementById("video_url").value == "")
			{
				document.getElementById("errmsg").innerHTML="Video URL is mandatory";
				return false;
			}
		}
		document.getElementById("errmsg").innerHTML="";
		return true;
}


var frmaddvideosExists = document.getElementById("frmaddvideos");
if(frmaddvideosExists)
{
		document.getElementById('frmaddvideos').onsubmit=function(e){
					const video_url=document.getElementById("video_url").value;
					if(video_url != "")
					{
							e.preventDefault();
							var xhr=new XMLHttpRequest();
							var url="../php/videos.php";
							xhr.open('post',url,true);
							var formData=new FormData(frmaddvideos);
							var selPage = document.getElementById("service_id");
							var pageName= selPage.options[selPage.selectedIndex].text;
							formData.append("add", "add");
							formData.append("pageName",pageName);
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

function editVideos(id)
{
	 window.location.href="edit.php?id="+id;
}


function submitEditVideos()
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
			if(document.getElementById("video_url").value == "")
			{
				document.getElementById("errmsg").innerHTML="Video URL is mandatory";
				return false;
			}
		}
	
		/*document.getElementById("loading").style.display = "block";*/
		document.getElementById("errmsg").innerHTML="";
		return true;
}
	
var frmeditvideosExists = document.getElementById("frmeditvideos");
if(frmeditvideosExists)
{
		document.getElementById('frmeditvideos').onsubmit=function(e){
					const video_url=document.getElementById("video_url").value;
					if(video_url != "")
					{
									e.preventDefault();
									var xhr=new XMLHttpRequest();
									var url="../php/videos.php";
									xhr.open('post',url,true);
									var formData=new FormData(frmeditvideos);
									var selPage = document.getElementById("service_id");
									var pageName= selPage.options[selPage.selectedIndex].text;
									formData.append("update", "update");
									formData.append("pageName",pageName);
									xhr.send(formData);
									xhr.onload=function() {
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

function deleteVideos(id)
{
		var result = confirm("Are you sure to delete?");
	    if(result)
		{
				var xhr=new XMLHttpRequest();
				var url="../php/videos.php";
				xhr.open('post',url,true);
				var formData=new FormData(frmlistvideos);
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