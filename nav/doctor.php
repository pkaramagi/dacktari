              <div class="  btn-group ">
                    <button class="btn navig">
						<div class="nav-info active" id="doc-appointment">
								<div class="row">
									<div class="span1 nav-image">
										<img src="images/doctor_info-icon.gif" style="width:49px;"/>
									</div>
									<div class="span2 nav-details">
										<h3><?php
										$id=$_SESSION['user_id'];
										$sql=mysql_query("SELECT COUNT(*) as count FROM  `appointment` where doctor_id='$id' and status='confirmed' GROUP BY doctor_id") or die(mysql_error());
										$row=mysql_fetch_assoc($sql);
										echo $row['count']; 
										?></h3>
										<p>Upcoming Appointments</p>
									</div>
								</div>
						</div>
                    </button>
					<button class="btn navig">
                        <div class="nav-info" id="doc-request">
							<div class="span4">
								<div class="row">
									<div class="span1 nav-image">
										<img src="images/doctor_info-icon.gif" style="width:49px;"/>
									</div>
									<div class="span2 nav-details">
										<h3>
											<?php
										$id=$_SESSION['user_id'];
										$sql=mysql_query("SELECT COUNT(*) as count FROM  `appointment` where doctor_id='$id' and status='pending' GROUP BY doctor_id") or die(mysql_error());
										$row=mysql_fetch_assoc($sql);
										echo $row['count']; 
										?>
										</h3>
										<p>Appointment Requests</p>
									</div>
								</div>
							</div>
						</div>
                    </button>
					<button class="btn navig">
                        <div class="nav-info" id="doc-prescription">
							<div class="span4">
								<div class="row">
									<div class="span1 nav-image">
										<img src="images/doctor_info-icon.gif" style="width:49px;"/>
									</div>
									<div class="span2 nav-details">
										<h3 class="numberofprescriptions"><?php
										$id=$_SESSION['user_id'];
										$sql=mysql_query("SELECT COUNT(*) as count FROM  `prescription` where doctor_id='$id' and status=0 GROUP BY doctor_id") or die(mysql_error());
										$row=mysql_fetch_assoc($sql);
										echo $row['count']; 
										?></h3>
										<p>Prescrition Requests</p>
									</div>
								</div>
						</div>
						</div>
                    </button>
					
                </div>
  