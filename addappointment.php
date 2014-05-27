<?php 
$start = str_replace('T','',$_POST['starttime']);
$end = str_replace('T','',$_POST['endtime']);
checktime($start,$end);

function checktime($start, $end){
if(strtotime($start)>strtotime($end)){
header('Location:' . $_SERVER['HTTP_REFERER'].'error=1');
}
else if(strtotime($start)== strtotime($end)){
header('Location:' . $_SERVER['HTTP_REFERER'].'?p=1&&error=2');
}
else{
return 1;
}
}
?>
