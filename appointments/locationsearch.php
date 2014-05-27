<?php
require_once "setup.php";
$doctor_id = $_POST['doc_id'];
$query = mysql_query("SELECT a.id AS id, a.name AS name
FROM hospital a, hospital_doctor b
WHERE b.hospital_id = a.id
AND b.doctor_id =$doctor_id
AND a.status = 'approved'
AND b.status = 'approved'
") or die("There was a problem fetching data, please try again");
echo $doctor_id;
?>
<div class="control-group">
	<label class="control-label" for="Location">Location</label>
	<div class="controls">
		<select>
		<?php
			while($row = mysql_fetch_assoc($query)){
				echo "<option value='".$row['id']."'>".$row[name]."</option>";
			}
		?>
		</select>
	</div>
</div>
