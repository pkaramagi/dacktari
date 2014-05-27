
			<form id="custom" class="form-horizontal" action="Hospital/register_process.php" method="POST">
        <fieldset title="Step 1">
				<legend>Hospital Location</legend>
				<?php
				include "Hospital/step2.php";
				?>
				</fieldset>			
		<fieldset title="Step 2">
				<legend>Basic Information</legend>
				<?php
				include "Hospital/step1.php";
				?>
				</fieldset>

       
				
	
				<input type="submit" class="finish" value="Finish!" />
			</form>
			<br/>