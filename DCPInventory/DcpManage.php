<?php
session_start();
include ('../DBconnection/dbhConnection.php');


if(empty($_SESSION['username'])){
    header('Location: ../NoAccountSignedIn');
    echo 'error sign in again thank you';
}else{

  $username =  $_SESSION['username'];
  $school =  $_SESSION['school']; 
  $district = $_SESSION['district'];
  $useremail = $_SESSION['useremail']; 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>DCP Manage</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/aa867b86c2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!--MODAL  -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!--JAVASCRIPT  -->
    <script src="../javascript/sweetalert.js"></script>
    <script src="../Javascript/Dcpmanage.js"></script>
    <!--CSS  -->
    <link rel="stylesheet" href="../Styles/Dcpmanage.css">

</head>

<body>
    <div class="nav-container">
        <div class="depedbg-container">
            <img src="../bglogo.png" alt="Avatar" class="image">
        </div>  

           
        <div class="userinfo-container">
        <i class="fa-sharp fa-solid fa-user fa-xl"></i></i><p><?php echo $username ?></p>
        <i class="fa-sharp fa-solid fa-envelope fa-xl"></i></i><p><?php echo $useremail?></p>
      <i class="fa-sharp fa-solid fa-school-flag fa-xl"></i></i><p><?php echo $district?></p>
        <i class="fa-sharp fa-solid fa-school-flag fa-xl"></i><p><?php echo $school?></p> 
        <i class="fa-solid fa-location-dot fa-xl"></i><p>1759 Gumamela street 1759 Gumamela street</p>
        </div>

        <div class="actionbtn-container">
        <button type="submit" class="addmodalbtn"><i class="fas fa-plus-square"></i> ADD DCP </button>
        <button type="submit" class="" data-toggle="modal" data-target="#reportmodal"> REPAIR & MAINTENANCE REPORT</button>  
        </div>

        <div class="stationinfo-container">
           
         
        </div>

        <div class="logout-div">
            <i class="fa-solid fa-right-from-bracket"></i><a href="../logout">LOGOUT</a>
        </div>
    </div>
    

    <div class="main-container">
        
        <div class="table-container-div">
        <table style="width: 100%;" class="table table-striped">
            <thead>
                <tr>
                    <th>PACKAGE</th>
                    <th>YEAR</th>
                    <th>WARRANTY</th>
                    <th>DEVICE</th>
                    <th>SERIAL#</th>
                    <th>BRAND/MODEL</th>
                    <th>SPECIFICATION</th>
                    <th>UNITCOST</th>   
                    <th>CONDITION</th>
                    <th>ACCOUNTABLE OFFICER</th>
                    <th>ACTIONS</th>  
                </tr>
            </thead>
            <tbody>
                <tr><?php
                $sql = "SELECT * FROM PackageData";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                ?>
                    <td><?php echo $row['Package']?></td>
                    <td><?php echo $row['Year']?></td>
                    <td><?php echo $row['Warranty']?></td>
                    <td><?php echo $row['Device']?></td>
                    <td><?php echo $row['Serial']?></td>
                    <td><?php echo $row['Brand']?></td>
                    <td><?php echo $row['Specification']?></td>
                    <td><?php echo $row['UnitCost']?></td>
                    <td><?php echo $row['State']?></td>  
                    <td><?php echo $row['AccountableOfficer'];?></td>  
                    <td>
                        <Div class="action-div">
                        <button class="editdcp" data-id='<?php echo $row['Pid'];?>'><i class="fa-sharp fa-solid fa-pen-to-square fa-2x"></i></button>
                        <button class="deletedcp" data-id='<?php echo $row['Pid'];?>'><i class="fa-sharp fa-solid fa-trash fa-2x"></i></button>
                        </Div>             
                    </td>            
                    </tr>
            <?php }} ?>
              </tbody>
        </table>
        </div>

            <!-- ADD PACKAGE -->
            <div class="modal fade" id="addpackagemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">ADD DCP</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                        <div class="firstSection">
                                    <div class="form-group">
                                    <label class="" for="">PACKAGE</label>
                                        <input name="" type="" class="form-control form__input" id="package" autocomplete=off>	
                                    </div>
                                    <div class="form-group">
                                    <label class="" for="">YEAR</label>
                                        <input name="" type="" class="form-control form__input" id="year" autocomplete=off>	
                                    </div>         		
                        </div>	

                        <div class="secondSection">
                                 <div class="form-group">
                                    <label class="" for="">DEVICE</label>
                                    <select class="select form-control"  style="height: 37px;"
											id="device" name="">
											<option value="" selected disabled>Device</option>
											<?php
											$get = "SELECT DeviceName FROM `DeviceList`";
											$result = $conn->query($get);
											while($row = mysqli_fetch_assoc($result)){
												$data = $row['DeviceName'];
												?>
											<option><?php echo $data;?></option>
											<?php }?>
										</select>
                                  </div>

                                 <div class="form-group">
                                 <label for="warranty">WARRANTY</label>
                                    <div class="warranty-div">
                                        <input name="warranty" type="radio" class="radio1" id="yes">Yes</input>	
                                        <input name="warranty" type="radio" class="radio2" id="no">No</input>	
                                     </div>
                                </div>	        		
                        </div>

                    <div class="thirdSection">
                                <div class="form-group">
                                    <label class="" for="">SERIAL</label>
                                        <input name="" type="" class="form-control form__input" id="serial" autocomplete=off>	
                                </div>
                                <div class="form-group">
                                    <label class="" for="">BRAND</label>
                                    <input name="" type="" class="form-control form__input" id="brand" autocomplete=off>	
                                </div>	    
                    </div>
                    <div class="fourthSection">
                                <div class="form-group">
                                    <label class="" for="">SPECIFICATION</label>
                                    <input name="" type="" class="form-control form__input" id="specification" autocomplete=off>	
                                </div>
                                <div class="form-group">
                                    <label class="" for="">UNIT-COST</label>
                                    <input name="" type="" class="form-control form__input" id="unitcost" autocomplete=off>	
                                </div>                		
                    </div>
                    <div class="fifthSection">
                                <div class="form-group">
                                    <label class="" for="">ACCOUNTABLE OFFICER</label>
                                    <input name="" type="" class="form-control form__input" id="ao" autocomplete=off>	
                                </div>	
                                <div class="form-group">
                                    <label class="" for="">CONDITION</label>
                                    <select class="form-control" style="height: 37px;"
											id="condition" name="">
											<option value="" selected disabled>Condition</option>
											<option>Good/Working</option>
											<option>For Repair</option>
											<option>For Condemn</option>
											<option>Condemed</option>
									</select>
                                </div>	
                    </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                    <button type="button" class="btn btn-success" id="addpackage" >ADD DCP</button>
				</div>	
			</div>	
		</div>
	</div>
	</div>


    <!-- REPAIR & MAINTENANCE REPORT -->
        <div class="modal fade" id="reportmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">REPAIR & MAINTENANCE REPORT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="reportfirstSection">
                                        <div class="form-group">
                                        <label class="" for="">SCHOOL</label>
                                            <input name="" type="" class="form-control form__input" id="school" autocomplete=off value="<?php echo $school?>">	
                                        </div>
                                        <div class="form-group">
                                        <label class="" for="">DISTRICT</label>
                                            <input name="" type="" class="form-control form__input" id="district" autocomplete=off value="<?php echo $district?>">	
                                        </div>		
                        </div>	

                        <div class="reportsecondSection">
                                    
                                        <div class="form-group">
                                        <label class="" for="">ADDRESS</label>
                                            <input name="" type="" class="form-control form__input" id="address" autocomplete=off>	
                                        </div>
                                        <div class="form-group">
                                        <label class="" for="">CELLPHONE #</label>
                                            <input name="" type="" class="form-control form__input" id="cellphone" autocomplete=off>	
                                        </div>			
                        </div>

                        <div class="reportthirdSection">
                                        <div class="form-group">
                                        <label class="" for="">CONTACT PERSON</label>
                                            <input name="" type="" class="form-control form__input" id="contactperson" autocomplete=off>	
                                        </div>
                                        <div class="form-group">
                                        <label class="" for="">WARRANTY</label>
                                            <input name="" type="" class="form-control form__input" id="reportwarranty" autocomplete=off>	
                                        </div>
                                        
                        </div>
                        <div class="lastsection">
                                        <div class="form-group">
                                            
                                            <label class="" for="">DCP PACKAGE</label>
                                            <input name="" type="" class="form-control form__input" id="dcppackage" autocomplete=off>	

                                            <label class="" for="">DEVICE/MODEL</label>
                                            <input name="" type="" class="form-control form__input" id="devicemodel" autocomplete=off>	

                                            <label class="" for="">SERIAL NO.</label>
                                            <input name="" type="" class="form-control form__input" id="serialno" autocomplete=off>	

                                            <label class="" for="">DEVICE ISSUE</label>
                                            <input name="" type="" class="form-control form__input" id="deviceissue" autocomplete=off>	

                                            <label class="" for="">SCHOOLS ICT: REPORT</label>
                                            <input name="" type="" class="form-control form__input" id="ictreport" autocomplete=off>	
                                        </div>
                                        
                                        
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                        <button type="button" class="btn btn-success" id="sendreport" >SEND REPORT</button>
                    </div>	
                </div>
                
            </div>
        </div>
        </div>
        
        

          <!-- EDIT PACKAGE -->
          <div class="modal fade" id="editdcpmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">EDIT DCP</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                        <div class="firstSection">
                                    <div class="form-group">
                                    <label class="" for="">PACKAGE</label>
                                        <input name="" type="" class="form-control form__input" id="editpackage" autocomplete=off>	
                                    </div>
                                    <div class="form-group">
                                    <label class="" for="">YEAR</label>
                                        <input name="" type="" class="form-control form__input" id="edityear" autocomplete=off>	
                                    </div>         		
                        </div>	

                        <div class="secondSection">
                                 <div class="form-group">
                                    <label class="" for="">DEVICE</label>
                                    <select class="select form-control"  style="height: 37px;"
											id="editdevice" name="">
											<option value="" selected disabled>Device</option>
											<?php
											$get = "SELECT DeviceName FROM `DeviceList`";
											$result = $conn->query($get);
											while($row = mysqli_fetch_assoc($result)){
												$data = $row['DeviceName'];
												?>
											<option><?php echo $data;?></option>
											<?php }?>
										</select>
                                  </div>

                                 <div class="form-group">
                                 <label for="warranty">WARRANTY</label> 
                                    <div class="warranty-div">
                                        <input name="warranty" type="radio" class="radio1" id="edityes" value="yes">Yes</input>	
                                        <input name="warranty" type="radio" class="radio2" id="editno" value="no">No</input>	
                                     </div>
                                </div>	        		
                        </div>

                    <div class="thirdSection">
                                <div class="form-group">
                                    <label class="" for="">SERIAL</label>
                                        <input name="" type="" class="form-control form__input" id="editserial" autocomplete=off>	
                                </div>
                                <div class="form-group">
                                    <label class="" for="">BRAND</label>
                                    <input name="" type="" class="form-control form__input" id="editbrand" autocomplete=off>	
                                </div>	    
                    </div>
                    <div class="fourthSection">
                                <div class="form-group">
                                    <label class="" for="">SPECIFICATION</label>
                                    <input name="" type="" class="form-control form__input" id="editspecification" autocomplete=off>	
                                </div>
                                <div class="form-group">
                                    <label class="" for="">UNIT-COST</label>
                                    <input name="" type="" class="form-control form__input" id="editunitcost" autocomplete=off>	
                                </div>                		
                    </div>
                    <div class="fifthSection">
                                <div class="form-group">
                                    <label class="" for="">ACCOUNTABLE OFFICER</label>
                                    <input name="" type="" class="form-control form__input" id="editao" autocomplete=off>	
                                </div>	
                                <div class="form-group">
                                    <label class="" for="">CONDITION</label>
                                    <select class="form-control" style="height: 37px;"
											id="editcondition" name="">
											<option value="" selected disabled>Condition</option>
											<option>Good/Working</option>
											<option>For Repair</option>
											<option>For Condemn</option>
											<option>Condemed</option>
									</select>
                                    <input name="" type="hidden" class="form-control form__input" id="pid" autocomplete=off >
                                </div>	
                    </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                    <button type="button" class="btn btn-success" id="updatedcp" >UPDATE DCP</button>
				</div>	
			</div>	
		</div>
	</div>
	</div>


    </div>
    <script>
   startLogoutTimer();
   console.log(inactivityTime);
    </script>

</body>

</html>
<?php
}
?>