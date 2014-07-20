<div class="control-group">
<label class="control-label">Full Name</label>
<div class="controls">
<input type="text" class="input-xlarge" id="user_name" name="user_name" value="<?php echo $_SESSION[name] ?>" rel="popover" data-content="Enter your first and last name." data-original-title="Full Name">
</div>
</div>

<div class="control-group">
<label class="control-label">Email</label>
<div class="controls">
<input type="text" class="input-xlarge" id="user_email" disabled="disabled"  value="<?php echo $_SESSION[email] ?>" rel="popover" data-content="What’s your email address?" data-original-title="Email">
<input type="hidden" value="<?php echo $_SESSION[email] ?>" name="user_email" />
</div>
</div>



<div class="control-group">
		<label class="control-label" for="input01">Gender</label>
	      <div class="controls">
	        <select name="gender" id="gender">
         <?php if($_SESSION[gender]=="male"){
			                echo "<option value=\"m\">Male</option>";
			                echo "<option value=\"f\">Female</option>";}
							else{
							echo "<option value=\"f\">Female</option>";
							echo "<option value=\"m\">Male</option>";
			                
							
							}
?>	

	<option value="other">Other</option>
			               
			              </select>
	       
	      </div>
	
	</div>
	<div class="control-group">
<label class="control-label">Qualification</label>
<div class="controls">
<input type="text" class="input-xlarge" id="Qualification" name="qualification" value="" rel="popover" data-content="Qualification" data-original-title="Qualification">
</div>
</div>
	<div class="control-group">
<label class="control-label">Speciality	*</label>
<div class="controls">
<textarea class="input-xlarge" name="speciality"  rel="popover" cols="10" rows="10"data-content="eg Operator " data-original-title="condition"></textarea>
</div>
</div>