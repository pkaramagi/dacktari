<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
<style type="text/css">
.input-xlarge {
height: 28px;
}
.description {
height: 141px;
}

</style>
<?php
if($_GET['error']){
?>

<div class="alert alert-error">
              
              <strong>Oh snap!</strong> Change a few things up and try submitting again.
            </div>
<?php

}

?>
<h3>Request Prescription From Dr <?php echo $_GET['name']?></h3>
<form action="process_request.php" method="post">
<label>Title</label>
<input type="text" name='title' id='title' class="input-xlarge focused"/>
<label>description</label>
<textarea name="description" class="input-xlarge focused description"></textarea>
<input type="hidden" name="doctor" value="<?php echo $_GET[id]?>">
<input type="hidden" name="email" value="<?php echo$_GET[email]?>">
<br/>
<input type="submit" name="submit" class="btn btn-primary" value="Request Prescription">
</form>