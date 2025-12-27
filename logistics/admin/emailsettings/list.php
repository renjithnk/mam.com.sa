<div id="tabs1" class="tabs__pane active">
<input type='hidden' name='editid' id='editid'>
                                <!-- <h3>List</h3> -->
                                <table style="padding: 0; margin: 0;">
                                    <tr>
                                        <th>Email</th>
										<th>Action</th>
                                    </tr>
									<?php
									if($result->num_rows > 0) 
									{
									    $row = $result->fetch_array();
										?>
										 	<tr>
												<td><?php echo $row["email"]; ?></td>
												<td>
												  <input type="button" id="btnEmailSettingsEdit" name="btnEmailSettingsEdit" value="Edit" onclick="editEmailSettings(<?php echo $row["id"]; ?>)">
												  <input type="button" id="btnEmailSettingsDelete" name="btnEmailSettingsDelete" value="Delete" onclick="deleteEmailSettings(<?php echo $row["id"]; ?>)">
												</td>
											</tr>
										<?php
									}
									else 
									{
									?>
										   <tr><td colspan="4" style="text-align:center;">No results to show</td></tr>
									<?php
									}
									?>
                                  
                                </table>
</div>