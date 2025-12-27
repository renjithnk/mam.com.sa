<script type="application/javascript">
function submitLogin()
{
		document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
		if(document.getElementById("username").value == "")
		{
			document.getElementById("errmsg").innerHTML="Username is mandatory";
			return false;
		}
		else
		{
			if(document.getElementById("password").value == "")
			{
				document.getElementById("errmsg").innerHTML="Password is mandatory";
				return false;
			}
		}
		document.getElementById("frmlogin").submit();
}
</script>