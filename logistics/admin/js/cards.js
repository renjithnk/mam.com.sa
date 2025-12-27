<script type="application/javascript">
function submitCards()
{
		document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
		
		
		if(document.getElementById("heading").value == "")
		{
			document.getElementById("errmsg").innerHTML="Heading is mandatory";
			return false;
		}
		else if(document.getElementById("title1").value == "")
		{
			document.getElementById("errmsg").innerHTML="Title1 is mandatory";
			return false;
		}
		else if(document.getElementById("description1").value == "")
		{
			document.getElementById("errmsg").innerHTML="Description1 is mandatory";
			return false;
		}
		else if(document.getElementById("image1").value == "")
		{
			document.getElementById("errmsg").innerHTML="Image1 is mandatory";
			return false;
		}
		else if(document.getElementById("alt1").value == "")
		{
			document.getElementById("errmsg").innerHTML="Alt1 is mandatory";
			return false;
		}
		else if(document.getElementById("title2").value == "")
		{
			document.getElementById("errmsg").innerHTML="Title2 is mandatory";
			return false;
		}
		else if(document.getElementById("description2").value == "")
		{
			document.getElementById("errmsg").innerHTML="Description2 is mandatory";
			return false;
		}
		else if(document.getElementById("image2").value == "")
		{
			document.getElementById("errmsg").innerHTML="Image2 is mandatory";
			return false;
		}
		else if(document.getElementById("alt2").value == "")
		{
			document.getElementById("errmsg").innerHTML="Alt2 is mandatory";
			return false;
		}
		else if(document.getElementById("title3").value == "")
		{
			document.getElementById("errmsg").innerHTML="Title3 is mandatory";
			return false;
		}
		else if(document.getElementById("description3").value == "")
		{
			document.getElementById("errmsg").innerHTML="Description3 is mandatory";
			return false;
		}
		else if(document.getElementById("image3").value == "")
		{
			document.getElementById("errmsg").innerHTML="Image3 is mandatory";
			return false;
		}
		else 
		{
			if(document.getElementById("alt3").value == "")
			{
				document.getElementById("errmsg").innerHTML="Alt3 is mandatory";
				return false;
			}
		}
		document.getElementById("loading").style.display = "block";
		document.getElementById("errmsg").innerHTML="";
		return true;
}



var frmaddCardsExists = document.getElementById("frmaddCards");
if(frmaddCardsExists)
{
		document.getElementById('frmaddCards').onsubmit=function(e){
						e.preventDefault();
						var xhr=new XMLHttpRequest();
						var url="../php/cards.php";
						xhr.open('post',url,true);
						var formData=new FormData(frmaddCards);
						formData.append("add", "add");
						xhr.send(formData);
						xhr.onload=function() {
					//	console.log(this.response);
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

function editCards(id)
{
	 window.location.href="edit.php?id="+id;
}


function submitUpdateCards()
{
		document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
		
		
		if(document.getElementById("heading").value == "")
		{
			document.getElementById("errmsg").innerHTML="Heading is mandatory";
			return false;
		}
		else if(document.getElementById("title1").value == "")
		{
			document.getElementById("errmsg").innerHTML="Title1 is mandatory";
			return false;
		}
		else if(document.getElementById("description1").value == "")
		{
			document.getElementById("errmsg").innerHTML="Description1 is mandatory";
			
			return false;
		}
		else if(document.getElementById("alt1").value == "")
		{
			document.getElementById("errmsg").innerHTML="Alt1 is mandatory";
			return false;
		}
		else if(document.getElementById("title2").value == "")
		{
			document.getElementById("errmsg").innerHTML="Title2 is mandatory";
			return false;
		}
		else if(document.getElementById("description2").value == "")
		{
			document.getElementById("errmsg").innerHTML="Description2 is mandatory";
			return false;
		}
		else if(document.getElementById("alt2").value == "")
		{
			document.getElementById("errmsg").innerHTML="Alt2 is mandatory";
			return false;
		}
		else if(document.getElementById("title3").value == "")
		{
			document.getElementById("errmsg").innerHTML="Title3 is mandatory";
			return false;
		}
		else if(document.getElementById("description3").value == "")
		{
			document.getElementById("errmsg").innerHTML="Description3 is mandatory";
			return false;
		}
		else 
		{
			if(document.getElementById("alt3").value == "")
			{
				document.getElementById("errmsg").innerHTML="Alt3 is mandatory";
				return false;
			}
		}
		document.getElementById("loading").style.display = "block";
		document.getElementById("errmsg").innerHTML="";
		return true;
}
	
var frmeditCardsExists = document.getElementById("frmeditcards");
if(frmeditCardsExists)
{
		document.getElementById('frmeditcards').onsubmit=function(e){
					e.preventDefault();
					var xhr=new XMLHttpRequest();
					var url="../php/cards.php";
					xhr.open('post',url,true);
					var formData=new FormData(frmeditcards);
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

function deleteCards(id)
{
		var result = confirm("Are you sure to delete?");
	    if(result)
		{
				var xhr=new XMLHttpRequest();
				var url="../php/cards.php";
				xhr.open('post',url,true);
				var formData=new FormData(frmlistcards);
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