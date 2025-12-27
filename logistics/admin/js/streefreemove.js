<script type="application/javascript">
function submitstreeFreeMove()
{
		document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
		if(document.getElementById("caption").value == "")
		{
			document.getElementById("errmsg").innerHTML="Caption is mandatory";
			return false;
		}
		else if((document.getElementById("image").value == "") && (document.getElementById("image").src == ""))
		{
			document.getElementById("errmsg").innerHTML="Image is mandatory";
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
	/*	document.getElementById("loading").style.display = "block";*/
		document.getElementById("errmsg").innerHTML="";
		return true;
}


var frmaddstreefreemoveExists = document.getElementById("frmaddstreefreemove");
if(frmaddstreefreemoveExists)
{
				document.getElementById('frmaddstreefreemove').onsubmit=function(e){
				e.preventDefault();
				var xhr=new XMLHttpRequest();
				var url="../php/streefreemove.php";
				xhr.open('post',url,true);
				var formData=new FormData(frmaddstreefreemove);
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
		};
}

function editStreeFreeMove(id)
{
	 window.location.href="edit.php?id="+id;
}


function submitEditstreeFreeMove()
{
		document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
		if(document.getElementById("caption").value == "")
		{
			document.getElementById("errmsg").innerHTML="Caption is mandatory";
			return false;
		}
		else if((document.getElementById("image").value == "") && (document.getElementById("imgPath").src == ""))
		{
			document.getElementById("errmsg").innerHTML="Image is mandatory";
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
		/*document.getElementById("loading").style.display = "block";*/
		document.getElementById("errmsg").innerHTML="";
		return true;
}
	
var frmeditstreefreemoveExists = document.getElementById("frmeditstreefreemove");
if(frmeditstreefreemoveExists)
{
				document.getElementById('frmeditstreefreemove').onsubmit=function(e){
				e.preventDefault();
				var xhr=new XMLHttpRequest();
				var url="../php/streefreemove.php";
				xhr.open('post',url,true);
				var formData=new FormData(frmeditstreefreemove);
				formData.append("update", "update");
				xhr.send(formData);
				xhr.onload=function() {
				if(this.response == "Updated successfully.")
				{
					document.getElementById("msgstatus").style.display = "block";
					document.getElementById("loading").style.display = "none";
					document.getElementById("msgstatus").innerHTML=this.response;
					const submittedFormId = e.target.id;
				//	frmeditstreefreemove.reset();
					clearForm(submittedFormId);
					setTimeout(()=>{
						document.getElementById("msgstatus").style.display = "none";
					},4000)
				}};
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

function deleteStreeFreeMove(id)
{
		var result = confirm("Are you sure to delete?");
	    if(result)
		{
				var xhr=new XMLHttpRequest();
				var url="../php/streefreemove.php";
				xhr.open('post',url,true);
				var formData=new FormData(frmliststreefreemove);
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