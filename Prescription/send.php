     <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  
  <link type="text/css" href="../addyosmani-jquery-ui-bootstrap-cf2a77b/css/custom-theme/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
    <link href="../addyosmani-jquery-ui-bootstrap-cf2a77b/bootstrap/bootstrap.css" rel="stylesheet">
<script type="text/javascript" src="jquery.js"></script>
<script type='text/javascript' src='auto.js'></script>
<link rel="stylesheet" type="text/css" href="suggest.css" />

<script type="text/javascript">
$().ready(function() {
	$("#tags").autocomplete("list.php", {
		width: 260,
		matchContains: true,
		selectFirst: false
	});
});
</script>

    <style>
	td.none{
	border:0px solid #eee;
	}
    #left{
    float:left;
    width:50%;
    min-height: 200px;
    }
    .right{
    float:right;
    
    }
   .btn{
   margin-top: 6px;
   width:164px
   }
   input{
   height:30px;
   }
   
    </style>
     
    <div id="left">
<?php 
if($_GET['template']){
	include 'template.php';

}
else{
?>    
<script type="text/javascript" src="../assets/code-editor/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<form action="create.php" method="post">
 <table>
 <tr class="none"><th colspan="2" class="none">Send Prescription</th></tr>   

<tr class="none"><td class="none"><label for="tags">Title: </label></td>
<td class="none"><input style="width: 450px;"type="name" name="name"></td>
</tr><tr class="none"><td class="none"><label for="tags">Description: </label></td>
<td class="none"><textarea style="width: 450px;"  id="tags" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" name="description" cols="17" rows="7"></textarea></td>
</tr>
<tr class="none"><td class="none"></td>
<td class="none"><input type="submit" class="ui-button-primary ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" id="7" value="submit"></td></tr>
<input type="hidden" name="prescription_id" value="<?php echo $_GET[id]?>"/>
<input type="hidden" name="patient_id" value="<?php echo $patient_id;?>"/>
</table>
</div>
<?php }?>
</form>
<!--
<div class="right">

<h5>Select From Template</h5>
<div class="btn-group">
  <a href="?template=Malaria"><button class="btn">Malaria</button></a><br/>
  <a href="?template=Polio"><button class="btn">Polio</button></a><br/>
  <a href="?template=Aids"><button class="btn">Aids</button></a><br/>
  <a href="?template=TuberClosis"><button class="btn">TuberClosis</button></a><br/>
    <a href="?"><button class="btn">Custom</button></a><br/>
  </div>
</div>
!-->