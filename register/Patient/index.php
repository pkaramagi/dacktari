<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>

<title>Demos :  99Points.info : Facebook Style Suggest a Friend box Using jQuery and PHP. </title>
<link href="facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery-1.2.6.min.js"></script>
<script src="facebox.js" type="text/javascript"></script>
<script type="text/javascript">
   jQuery(document).ready(function($){
   
      $('a[rel*=facebox]').facebox({
      })
 })
</script>

<style>
 h2{text-shadow: 0px -1px 0px #374683; text-align:justify;
	filter: dropshadow(color=#e5e5ee,offX=0,offY=1); 
	font-family:"Courier New", Courier, monospace; background-color:#A4D3F7; padding:8px;
}
#heading
{
	font-family:Georgia, "Times New Roman", Times, serif;
	font-size:56px;
	color:#CC0000;				
}
input{
               font-size:13px;
}
a#link{
	font-family:Arial, Helvetica, sans-serif;
	color:#3B5998;
	font-weight:bolder;
}

</style>


</head>
<body>

<div style="height:500px; margin:90px;">
<a href="friends.php" id="link" rel="facebox">Open Friends Box</a>
</div>


<br clear="all" /><br clear="all" /><br clear="all" />
<br clear="all" /><br clear="all" /><br clear="all" />
<br clear="all" /><br clear="all" /><br clear="all" />
<br clear="all" /><br clear="all" />			  
</body>
</html>
