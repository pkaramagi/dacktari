<div class="control-group">
<label class="control-label">Name of Hospital</label>
<div class="controls">
<input type="text" class="input-xlarge" id="user_name" name="user_name" value="<?php echo $_SESSION[name] ?>" rel="popover" data-content="Enter your first and last name." data-original-title="Full Name">
</div>
</div>

<div class="control-group">
<label class="control-label">Email</label>
<div class="controls">
<input type="text" class="input-xlarge" id="user_email" name="user_email" disabled="disabled" value="<?php echo $_SESSION[email] ?>" rel="popover" data-content="What’s your email address?" data-original-title="Email">
<input type="hidden"  name="user_email" value="<?php echo $_SESSION[email] ?>">

</div>
</div>
