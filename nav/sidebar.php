		<link rel="stylesheet" type="text/css" href="nav/sidebar.css" />
		<script type="text/javascript" src="nav/sliding_effect.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.showmenu').click(function(){
					
					var menu = $(this).children('a').attr('href');
					if ($(menu).css('display') === 'none') {
						var par = $('.showmenu').find('a[href="'+menu+'"]');
						var pero = par.parents('.showmenu');
						pero.children('img').attr('src', 'images/download1.png');
					} else {
						var par = $('.showmenu').find('a[href="'+menu+'"]');
						var pero = par.parents('.showmenu');
						pero.children('img').attr('src', 'images/download.png');
						}
					$(menu).slideToggle();
					
					
				});
			});
		</script>
			<div id="navigation-block">
            <ul id="sliding-navigation" class="nav nav-list">
				<li class="sliding-element nav-header"><a href="#" >Home</a></li>
                <li class="sliding-element nav-header"><a href="#">Notifications</a></li>
				<li class="sliding-element nav-header showmenu"><img src="images/download.png"><a href="#appointment">Appointments</a></li>
					<ul class="nav nav-list" id="appointment" style="display:none;">
						<li class="sliding-element"><a href="#" style="margin-left:20px">Link</a></li>
						<li class="sliding-element"><a href="#" style="margin-left:20px">Link</a></li>
					</ul>
                <li class="sliding-element nav-header showmenu"><img src="images/download.png"><a href="#doctormenu">Doctors</li>
					<ul class="nav nav-list" id="doctormenu" style="display:none;">
						<li class="sliding-element"><a href="#" style="margin-left:20px">Link</a></li>
						<li class="sliding-element"><a href="#" style="margin-left:20px">Link</a></li>
					</ul>
				<li class="sliding-element nav-header showmenu" ><img src="images/download.png"><a href="#prescriptionmenu">Prescription</a></li>
					<ul class="sliding-element nav nav-list" id="prescriptionmenu" style="display:none;">
						<li class="sliding-element"><a href="#" style="margin-left:20px">Link</a></li>
						<li class="sliding-element"><a href="#" style="margin-left:20px">Link</a></li>
					</ul>
            </ul>
        </div>