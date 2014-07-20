<?php
session_name('daktali');
session_start();
include "../includes/config.php";
										$id=$_SESSION['user_id'];
										$sql=mysql_query("SELECT COUNT(*) as count FROM  `prescription` where doctor_id='$id' and status=0 GROUP BY doctor_id") or die(mysql_error());
										$row=mysql_fetch_assoc($sql);
										if($row['count']==0)
										echo 0;
                                        else			
                                        echo $row['count'];										
?>