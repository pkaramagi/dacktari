              <div class="  btn-group">
                    <button class="btn navig">
						<div class="nav-info active" id="upcoming-apps" >
								<div class="row">
									<div class="span1 nav-image">
										<img src="images/appointment_soon.png" style="width:49px;"/>
									</div>
									<div class="span2 nav-details" >
										<h3>
										<?php
										$id = $_SESSION['user_id'];
										$sql=mysql_query("SELECT COUNT( * ) as count FROM appointment WHERE ( SUBSTRING( REPLACE( starttime,  'T',  ' ' ) , 1, 19 ) ) > NOW( ) and patient_id='$id' and status='confirmed'") or die(mysql_error());
	
										$row=mysql_fetch_assoc($sql);
if($row['count'] <=0 ){
echo 0;
}
else{
echo $row['count'];
}	
										?>
										</h3>
										<p>UpComing Appointments</p>
									</div>
								</div>
						</div>
                    </button>
					<button class="btn navig">
                        <div class="nav-info" id="pending-apps">
							<div class="span4">
								<div class="row">
									<div class="span1 nav-image">
										<img src="images/appointment_new (1).png" style="width:49px;"/>
									</div>
									<div class="span2 nav-details">
										<h3>
												<?php
										$id = $_SESSION['user_id'];
										$sql=mysql_query("SELECT COUNT(*) as count FROM  `appointment` where patient_id='$id' and status='pending' GROUP BY patient_id") or die(mysql_error());
										$row=mysql_fetch_assoc($sql);
										if($row['count']==0)
											echo 0;
										else if($row['count'] > 0){
											echo $row['count'];
										}			
										else{
											echo 0;
										}
										?>
										</h3>
										<p>Pending Appointments</p>
									</div>
								</div>
							</div>
						</div>
                    </button>
					<button class="btn navig">
                        <div class="nav-info" id="cancelled-apps">
							<div class="span4">
								<div class="row">
									<div class="span1 nav-image">
										<img src="images/appointment_missed.png" style="width:49px;"/>
									</div>
									<div class="span2 nav-details">
										<h3>
											<?php
										$id = $_SESSION['user_id'];
										$sql=mysql_query("SELECT COUNT(*) as count FROM  `appointment` where patient_id='$id' and status='cancelled' GROUP BY patient_id") or die(mysql_error());
										$row=mysql_fetch_assoc($sql);
										if($row['count']==0)
											echo 0;
										else if($row['count'] > 0){
											echo $row['count'];
										}			
										else{
											echo 0;
										}
										?>
										</h3>
										<p>Cancelled</p>
									</div>
								</div>
							</div>
						</div>
                    </button>
                </div>
   