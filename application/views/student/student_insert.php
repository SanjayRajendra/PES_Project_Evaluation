<?php
   $this->session->unset_userdata('otp');
?>
<br>
<br>
  
   <div class="col-sm-1"></div>
      <div class="row">
         <div class="form-group">
            <div class="col-sm-3">      
               <label>First Name : </label>  
               <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name" onblur="validate_name(this.id)" required/>
            </div>
            <div class="col-sm-3">      
               <label>Middle Name : </label>  
               <input type="text" class="form-control" name="mname" id="mname" onblur="validate_name(this.id)" placeholder="Enter Middle Name"/> 
	         </div>
            <div class="col-sm-3">      
               <label>Last Name : </label>  
               <input type="text" class="form-control" id="lname" name="lname" onblur="validate_name(this.id)" placeholder="Enter Last Name" required/>
            </div>
         </div>
      </div>
      <div class="col-sm-1"></div>
         <div class="row">
            <div class="form-group">
               <div class="col-sm-4">
                  <label for="name">Program:</label> 
                  <select class="form-control" name="program" id="select">
                     <option>-----</option>
                     <option value="B.Tech">B.Tech</option>
                     <option value="M.Tech">M.Tech</option>
                  </select>
               </div>
               <div class="col-sm-1"></div>
               <div class="col-sm-4">      
                  <label>SRN : </label>  
                  <input type="text" class="form-control" name="srn" id="srn" onblur="validate_srn(this.id)" placeholder="Enter Student SRN">
               </div>
            </div>
         </div>
         <div class="col-sm-1"></div>
         <div class="row">
            <div class="form-group">
               <div class="col-sm-4">
                  <label>Branch :</label> 
                  <select class="form-control" name="branch" id="select">
                     <option>-----</option>
                     <option value="CSE">Computer Science and Engineering</option>
                     <option value="IE">Information Science and Engineering</option>
                     <option value="EC">Electronics and Communication</option>
                     <option value="CV">Civil Engineering</option>
                     <option value="EEE">Electricals and Electronics</option>
                     <option value="BT">Biotechnology</option>
                     <option value="MECH">Mechanical</option>
                     <option value="ARCH">Architecture</option>
                  </select>
               </div>
               <div class="col-sm-1"></div>
               <div class="col-sm-4">      
                  <label>Semester : </label>
                  <select class="form-control" name="sem" id="select">
                     <option>-----</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                     <option value="6">6</option>
                     <option value="7">7</option>
                     <option value="8">8</option>
                  </select>
               </div>
            </div>
         </div>
         <div class="col-sm-1"></div>
         <div class="row">
            <div class="form-group">
               <div class="col-sm-4">      
                  <label>Year : </label>
                  <select class="form-control" name="year" id="select">
                     <option value="" selected="selected">-------</option>
                     <option value="2015-2016">2015-2016</option>
                     <option value="2016-2017">2016-2017</option>
                     <option value="2017-2018">2017-2018</option>
                     <option value="2018-2019">2018-2019</option>
                     <option value="2020-2021">2020-2021</option>
                     <option value="2021-2022">2021-2022</option>
                  </select>
               </div>
               <div class="col-sm-1"></div>
               <div class="col-sm-4">
                  <label>Section : </label>
                  <select class="form-control" name="section" id="select">
                     <option value="" selected="selected">-------</option>
                     <option value="A-Section">A-Section</option>
                     <option value="B-Section">B-Section</option>
                     <option value="C-Section">C-Section</option>
                     <option value="D-Section">D-Section</option>
                     <option value="E-Section">E-Section</option>
                     <option value="F-Section">F-Section</option>
                     <option value="G-Section">G-Section</option>
                  </select>
               </div>
            </div>
         </div>
         <div class="col-sm-1"></div>
         <div class="row">
            <div class="form-group">
               <div class="col-sm-4">      
                  <label>Phone No : </label> 
                  <div class="input-group">
                     <span class="input-group-addon">+91</span>
                     <input type="text" name="mobile" class="form-control" id="mob" maxlength="10" onblur="validate_mob(this.id)" placeholder="Enter Phone number" required>
                  </div>
               </div>
               <div class="col-sm-1"></div>
               <div class="col-sm-4">      
			      </div>
            </div>
         </div>
         <div class="col-sm-1"></div>
         <div class="row">
            <div class="form-group">
               <div class="col-sm-4">
                  <label>Create Password :</label> 
                  <input type="password" class="form-control" name="password" id="pass" placeholder="Enter Password" required>
               </div>
               <div class="col-sm-1"></div>
               <div class="col-sm-4">      
                  <label>Confirm Password :</label>  
                  <input type="password" class="form-control" name="confpass" id="cpass" onblur="check(this.id)"  placeholder="Confirm Password" required>
               </div>
            </div>
         </div>
         <div class="col-sm-1"></div>
         <div class="row">
            <div class="form-group">
               <div class="col-xs-4">
                  <input type="submit" class="btn btn-primary" id="submit" value="Submit" style="background-color: #ff7733;border:none;">
               </div>
               <div class="col-sm-1"></div>
               <div class="col-xs-4"> 
                  <input type="Reset" class="btn btn-primary" value="Reset" style="background-color: #ff7733;border:none;">
               </div>
            </div>
         </div>
      <?php echo form_close();?>