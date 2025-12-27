<script type="application/javascript">
function submitLandingPageSlider()
{
		document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
		if(document.getElementById("image").value == "")
		{
			document.getElementById("errmsg").innerHTML="Image is mandatory";
			return false;
		}
		else if(document.getElementById("caption").value == "")
		{
			document.getElementById("errmsg").innerHTML="Caption is mandatory";
			return false;
		}
		else 
		{
			if(document.getElementById("alt").value == "")
			{
				document.getElementById("errmsg").innerHTML="Alt is mandatory";
				return false;
			}
		}
		document.getElementById("loading").style.display = "block";
		document.getElementById("errmsg").innerHTML="";
		return true;
}



var frmaddlandingpagesliderExists = document.getElementById("frmaddlandingpageslider");
if(frmaddlandingpagesliderExists)
{
		document.getElementById('frmaddlandingpageslider').onsubmit=function(e){
						e.preventDefault();
						var xhr=new XMLHttpRequest();
						var url="../php/landingpageslider.php";
						xhr.open('post',url,true);
						var formData=new FormData(frmaddlandingpageslider);
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

function editLandingPageSlider(id)
{
	 window.location.href="edit.php?id="+id;
}


function submitEditLandingPageSlider()
{
		document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
		if((document.getElementById("image").value == "") && (document.getElementById("imgPath").src == ""))
		{
			document.getElementById("errmsg").innerHTML="Image is mandatory";
			return false;
		}
		else if(document.getElementById("caption").value == "")
		{
			document.getElementById("errmsg").innerHTML="Caption is mandatory";
			return false;
		}
		else
		{
			if(document.getElementById("alt").value == "")
			{
				document.getElementById("errmsg").innerHTML="Alt is mandatory";
				return false;
			}
		}
		document.getElementById("loading").style.display = "block";
		document.getElementById("errmsg").innerHTML="";
		return true;
}
	
var frmeditlandingpagesliderExists = document.getElementById("frmeditlandingpageslider");
if(frmeditlandingpagesliderExists)
{
		document.getElementById('frmeditlandingpageslider').onsubmit=function(e){
					e.preventDefault();
					var xhr=new XMLHttpRequest();
					var url="../php/landingpageslider.php";
					xhr.open('post',url,true);
					var formData=new FormData(frmeditlandingpageslider);
					formData.append("update", "update");
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

function deleteLandingPageSlider(id)
{
		var result = confirm("Are you sure to delete?");
	    if(result)
		{
				var xhr=new XMLHttpRequest();
				var url="../php/landingpageslider.php";
				xhr.open('post',url,true);
				var formData=new FormData(frmlistlandingpageslider);
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