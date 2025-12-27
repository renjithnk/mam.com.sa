<script type="application/javascript">
var frmlistblogExists = document.getElementById("frmlistblog");
if(frmlistblogExists)
{
		document.getElementById('frmlistblog').onsubmit=function(e){
			
				
							e.preventDefault();
							var xhr=new XMLHttpRequest();
							var url="../php/blog.php";
							xhr.open('post',url,true);
							var formData=new FormData(frmlistblog);
							
							
							var chkBlogs = document.getElementsByName('chkBlog[]');
							var includedids = "";
							var excludedids="";
							for (var i=0, n=chkBlogs.length;i<n;i++) 
							{
								if(chkBlogs[i].checked) 
								{
									includedids += ","+chkBlogs[i].value;
								//	alert(chkBlogs[i].value);
								}
								else
								{
									excludedids += ","+chkBlogs[i].value;
								}
							}
							// alert(vals);
							if (includedids) includedids = includedids.substring(1);
							if (excludedids) excludedids = excludedids.substring(1);
							/*alert(includedids);
							alert(excludedids);*/
							
							
							formData.append("includedids", includedids);
							formData.append("excludedids", excludedids);
							formData.append("update", "update");
							xhr.send(formData);
							
							xhr.onload=function() {
								
							if(this.response == "Updated successfully")
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
</script>