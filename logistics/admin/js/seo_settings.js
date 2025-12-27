<script type="application/javascript">
function submitSeoSettings()
{
	
		/*document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
		
		
		document.getElementById("loading").style.display = "block";
		document.getElementById("errmsg").innerHTML="";
		return true;*/
}



var frmaddseosettingssExists = document.getElementById("frmaddseosettingss");
if(frmaddseosettingssExists)
{
		document.getElementById('frmaddseosettingss').onsubmit=function(e){
						e.preventDefault();
						var xhr=new XMLHttpRequest();
						var url="../php/seo_settings.php";
						xhr.open('post',url,true);
						var formData=new FormData(frmaddseosettingss);
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

function editSeoSettings(id)
{
	 window.location.href="edit.php?id="+id;
}


function submitUpdateSeoSettings()
{
		document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
}
	
var frmeditseosettingssExists = document.getElementById("frmeditseosettingss");
if(frmeditseosettingssExists)
{
		document.getElementById('frmeditseosettingss').onsubmit=function(e){
					e.preventDefault();
					var xhr=new XMLHttpRequest();
					var url="../php/seo_settings.php";
					xhr.open('post',url,true);
					var formData=new FormData(frmeditseosettingss);
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

function deleteSeoSettings(id)
{
		var result = confirm("Are you sure to delete?");
	    if(result)
		{
				var xhr=new XMLHttpRequest();
				var url="../php/seo_settings.php";
				xhr.open('post',url,true);
				var formData=new FormData(frmlistseosettingss);
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