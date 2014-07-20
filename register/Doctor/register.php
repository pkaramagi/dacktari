
			<form id="custom" class="form-horizontal" action="Doctor/register_process.php" method="POST">
				<fieldset title="Step 1">
				<legend>Basic Information</legend>
				<?php
				include "Doctor/step1.php";
				?>
				</fieldset>

				<fieldset title="Step 2">
					<legend>Choose Hospitals</legend>

						<?php
				include "Doctor/step2.php";
				?>
	</fieldset>
				
	
				<input type="submit" class="finish" value="Finish!" />
			</form>
			<br/>