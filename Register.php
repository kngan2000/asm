 <?php
 if(isset($_POST['btnRegister']))
 {
     $us=$_POST['txtUsername'];
     $pass1=$_POST['txtPass1'];
     $pass2=$_POST['txtPass2'];
     $fullname=$_POST['txtFullname'];
     $email=$_POST['txtEmail'];
     $address=$_POST['txtAddress'];
     $tel=$_POST['txtTel'];
     if(isset($_POST['grpRender']))
     {
         $sex=$_POST['grpRender'];
     }
     $date=$_POST['slDate'];
     $month=$_POST['slMonth'];
     $year=$_POST['slYear'];
     $err="";
     if($us==""||$pass1==""||$pass2==""||$fullname==""||$email=="" ||$address==""||!isset($sex))
     {
         $err.="<li>Enter fields with mark(*), please !</li>";
     }
     else if(strlen($pass1)<5){
         $err.="<li>Password must be greater than or equal to 5 characters!</li>";
     }
     else if($pass1!=$pass2){
        $err.="<li>Password and confirm password must be the same!</li>";
    }
    else if( $_POST['slDate']=="0"||$_POST['slMonth']=="0"||$_POST['slYear']=="0"){
        $err.="<li>Chosing fully information of birth again , please!</li>";
    }
    if($err!=""){
        echo $err;
    }
    else{
        include_once("connection.php");
        $pass=md5($pass1);
        $sq="select * from user where username='$us'";
        $res=postgres_query($conn,$sq);
        if(postgres_num_rows($res)==0){
            postgres_query($conn,"Insert into user (username,password,address,gender,phonenumber,email,userDate,userMonth,userYear,SSN,ActiveCode,state) values('$us','$pass','$fullname','$sex','$address','$tel','$email','$date','$month','$year','','',0)")
            or die(postgres_error($conn));
            echo"You have registered successfully!";
        }
        else{
            echo"Username already exist!";
        }
    }
 }
 ?>
<div class="container">
        <h2>Member Registration</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
					<div class="form-group">
						    
                            <label for="txtTen" class="col-sm-2 control-label">Username(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" value=""/>
							</div>
                      </div>  
                      
                       <div class="form-group">   
                            <label for="" class="col-sm-2 control-label">Password(*):  </label>
							<div class="col-sm-10">
							      <input type="password" name="txtPass1" id="txtPass1" class="form-control" placeholder="Password"/>
							</div>
                       </div>     
                       
                       <div class="form-group"> 
                            <label for="" class="col-sm-2 control-label">Confirm Password(*): </label>
							<div class="col-sm-10">
							      <input type="password" name="txtPass2" id="txtPass2" class="form-control" placeholder="Confirm your Password"/>
							</div>
                       </div>     
                       
                       <div class="form-group">                               
                            <label for="lblFullName" class="col-sm-2 control-label">Full name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtFullname" id="txtFullname" value="" class="form-control" placeholder="Enter Fullname"/>
							</div>
                       </div> 
                       
                       <div class="form-group">      
                            <label for="lblEmail" class="col-sm-2 control-label">Email(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtEmail" id="txtEmail" value="" class="form-control" placeholder="Email"/>
							</div>
                       </div>  
                       
                        <div class="form-group">   
                             <label for="lblDiaChi" class="col-sm-2 control-label">Address(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtAddress" id="txtAddress" value="" class="form-control" placeholder="Address"/>
							</div>
                        </div>  
                        
                         <div class="form-group">  
                            <label for="lblDienThoai" class="col-sm-2 control-label">Telephone(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTel" id="txtTel" value="" class="form-control" placeholder="Telephone" />
							</div>
                         </div> 
                         
                          <div class="form-group">  
                            <label for="lblGioiTinh" class="col-sm-2 control-label">Gender(*):  </label>
							<div class="col-sm-10">                              
                                      <label class="radio-inline"><input type="radio" name="grpRender" value="0" id="grpRender"  />
                                      Male</label>
                                    
                                      <label class="radio-inline"><input type="radio" name="grpRender" value="1" id="grpRender" />
                                      
                                      Female</label>
							</div>
                          </div> 
                          
                          <div class="form-group"> 
                            <label for="lblNgaySinh" class="col-sm-2 control-label">Date of Birth(*):  </label>
                            <div class="col-sm-10 input-group">
                                <span class="input-group-btn">
                                  <select name="slDate" id="slDate" class="form-control" >
                						<option value="0">Choose Date</option>
										<?php
                                            for($i=1;$i<=31;$i++)
                                             {                                                
                                                 echo "<option value='".$i."'>".$i."</option>";
                                             }
                                        ?>
                				 </select>
                                </span>
                                <span class="input-group-btn">
                                  <select name="slMonth" id="slMonth" class="form-control">
                					<option value="0">Choose Month</option>
									<?php
                                        for($i=1;$i<=12;$i++)
                                         {
                                             echo "<option value='".$i."'>".$i."</option>";
                                         }
                          
                                    ?>
                				</select>
                                </span>
                                <span class="input-group-btn">
                                  <select name="slYear" id="slYear" class="form-control">
                                    <option value="0">Choose Year</option>
                                    <?php
                                        for($i=1970;$i<=2020;$i++)
                                         {
                                             echo "<option value='".$i."'>".$i."</option>";
                                         }
                                    ?>
                                </select>
                                </span>
                           </div>
                      </div>	
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnRegister" id="btnRegister" value="Register"/>
                              	
						</div>
                     </div>
				</form>
</div>
    

