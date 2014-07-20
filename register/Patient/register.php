
			<form id="custom" class="form-horizontal" action="Patient/register_process.php" method="POST">
				<fieldset title="Step 1">
				<legend>Basic Information</legend>
				<?php
				include "Patient/step1.php";
				?>
				</fieldset>

				<fieldset title="Step 2">
					<legend>Choose Doctors</legend>

						<?php
				include "Patient/step2.php";
				?>
	</fieldset>
				<fieldset title="Step 3">
					<legend>Choose Hospitals</legend>

					
						<?php
				include "Patient/step3.php";
				?>
				</fieldset>
	
				<input type="submit" class="finish" value="Finish!" />
			</form>
			<br/>