<?php 

function convertDate($curentdate) {
	$timestamp = time();
	$date = date($curentdate, $timestamp);
	$matches = array();
	if (preg_match('/^([\-+])(\d{2})(\d{2})$/', date('O', $timestamp), $matches)) {
		$date .= $matches[1].$matches[2].':'.$matches[3];
	} else {
		$date .= 'Z';
	}
	return $date;
}




$a =  str_replace('T','\T',$_POST['starttime']);
echo $a ."<br/>";
$b = str_replace('T',' ',$_POST['starttime']);
$date1 = new DateTime($b);

echo convertDate(str_replace('T','\T',$_POST['starttime']))."<br/>";
echo convertDate(str_replace('T','\T',$_POST['starttime']))."<br/>";
echo  convertDate($a)."<br/>";
echo  date($_POST['starttime'], time());
echo $date1->format(DATE_RFC3339); 



?>

<script type='text/javascript'>
alert(new Date().getTimezoneOffset());
alert(new Date().getTimezoneOffset()/60*(-1));
</script>