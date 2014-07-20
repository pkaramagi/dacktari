<?php
include "../setup.php";
$client->setAccessToken($_SESSION['token']);


$drive=new Google_DriveService($client);
$obj = new Users();

$track=$obj->printFilesInFolder($drive, $obj->getFolderId($_SESSION['user_id'],"doctor"));


?>
<style>
#prescription_saved table {
	border-top: 1px solid #ddd;
	width: 100%;
	font-family: 'Arial',san-serif,helvetica;
	font-size: 12px;
}

#prescription_saved table tr td {
	background: #f6f6f6;
	padding: 0px 20px;
	height: 29px;
	line-height: 29px;
	border-bottom: 1px solid #ddd;
}

#prescription_saved table tr.odd td {
	background: #fbfbfb;
}

#prescription_saved table tr:hover td { background: #fdfcf6; }

#prescription_saved table .action {
	text-align: right;
	padding: 0 20px 0 10px;
}

#prescription_saved table tr .action a { margin: 0 0 0 10px; text-decoration: none; color: #9b9b9b; }
#prescription_saved table tr:hover .action .edit { color: #c5a059; }
#prescription_saved table tr:hover .action .delete { color: #a02b2b; }
#prescription_saved table tr:hover .action .view { color: #55a34a; }

#prescription_saved table tr:hover .action a:hover { text-decoration: underline; }
#prescription_saved h3 {
font-size: 14px;
line-height: 14px;
font-weight: bold;
color: #5494af;
padding: 0 0 0 10px;
margin: 20px 0 10px;
}
</style>
<script>
 $(".createAppointment").fancybox({
         'overlayShow': true,
         'width': '50%',
         'height': '80%',
         'type': 'iframe'
             
     });
</script>
<div id="prescription_saved">
<table cellpadding="0" cellspacing="0">
							<tbody>
<?php
if(!$track){
echo "<h3>No files Found</h3>";
}
else{
$i=1;
echo '<h3>Saved  Prescriptions</h3>';
foreach($track as $key=>$value){

$we=$obj->readFile($drive, $value);
if($i%2){

$class="odd";
}
$i++;
?>

<tr class="<?php echo $class ?>">
                                <td><?php echo $we['title'] ?></td>
                                <td class="action"><a href="Prescription/iframe.php?id=<?=$value?>" class="createAppointment">View</a><a href="#" class="delete">Delete</a></td>
                            </tr>                        
						                       
                       
						<?php
					
						$class="";
						}
}
						?>
						 </tbody></table>
						</div>