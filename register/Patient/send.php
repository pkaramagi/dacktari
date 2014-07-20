<?php
include('dbcon.php');

if($_REQUEST['ids'])
{
	$f_ids = explode('_',$_REQUEST['ids']);
	//print_r($f_ids);
	
	for ($i=0; $i < sizeof($f_ids); $i++)
	{
		$res = mysql_query("SELECT * FROM friends where f_id =" . $f_ids[$i]);
		while ($row = @mysql_fetch_array($res))
		{
			// send email here to this user 
			//
			//		
			
			/// I am just saving name to this array to show alert message other wise dont need to get. Just send email above
			$array[$i] = $row['f_name']; 
		}
	}
	echo 'Email Sent To : ';
	print_r($array);
}


?>
