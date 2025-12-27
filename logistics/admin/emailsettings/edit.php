<div id="tabs2" class="tabs__pane">
<?php
		if(isset($_POST["id"]))
		{
		  $id=$_POST["id"];
		}
		//echo $id;
		if(@$id != "")
		{
	//	echo "in";
					
					$db = new Database();
					$sql = "SELECT * FROM email_settings where id=$id";  
					$result = $db->query($sql); 
					$row = $result->fetch_array();
		}
					$editcontent="";
					$editcontent="
						 <form name='frmeditemailsettings' id='frmeditemailsettings' method='post' enctype='multipart/form-data'>
							<input type='hidden' name='id' id='id' value=" . @$row['id'] . ">
							<table style='padding: 0; margin: 0;'>
								<tr>
									<th>Email</th>
									<th>Submit</th>
								</tr>
								<tr>
									<td><textarea name='email' id='email' rows='5' cols='50' required>" . @$row['email'] . "</textarea></td>
									<td><input type='submit' value='Submit' name='btnEmailSettingsUpdate' id='btnEmailSettingsUpdate'></td>
								</tr>
							</table>
						</form>";
						echo $editcontent;
?>
</div>