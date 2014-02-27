<!DOCTYPE html>
<html>
  <head>
    <title>Teacher Grading | Pisara</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    
    <!-- STYLE SHEET -->
      
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/grades/grades.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/notification.css">
	  
	   <!-- JavaScript plugins (requires jQuery) -->
	   <script src="http://code.jquery.com/jquery.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/respond.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="<?=base_url()?>assets/js/dashboard/javascript.js"></script>
  <script src="<?php echo base_url();?>assets/js/notification.js"></script>
	  
	  
  </head>
  <body>
    
	<!--JAVASCRIPT-->
	   


	<!--CONTENT-->
	
    <!--HEADER
	<div id="header"> Orange Grades Header (Teacher Page)
    </div>
    
    <br/>
    
   <hr id="sexyline"/> -->
   
   <div id="workspace">
            <div id="canvasheader">
        	<img src="<?php echo base_url(); ?>assets/images/pisaralogo2.png" id="headerlogo" align="middle" alt=""/>
            
          <div id="toprightlabel">
                <div id="sessionname">LUIGI DOLLOSA</div>
                <div id="logoutsign"><a href="<?=site_url('logout')?>"><img src="<?php echo base_url(); ?>assets/img/logoutsign.png" alt="LOGOUT"/></a></div>
            </div>
            
        </div>
        
      <div id="leftpanel">
        	<div id="classdetails">
            	<div class="classlabel"></div>
                <div class="classdata"></div>
            </div>
            
            <br/>
            
            <!--
            <div class="sectionlabel">Subjects</div>
            
            <div id="otherclasses">
              	<div class="classname">COMPROG1</div>
                <div class="classname">ENGLISH101</div>
                <div class="classname">ACCOUNTING</div>
                <div class="classname">FINANCE</div>
                <div class="classname">NETWORKING</div>
                <div class="classname">ELECTRONICS</div>
                <div class="classname">CALCULUS</div>
            </div>
            <br/>
            -->
            
            <!--<div class="sectionlabel">Modules</div>-->
            
            <div id="othermodules">
            	<a href="http://google.com">
                <div id="grades" class="module">
                    <div id="classlabel" >GRADES</div>
                    <div id="classdetail" >6</div>
                    <img class="moduleimage" src="<?php echo base_url() ?>assets/img/d11b.png" alt=""/>
                </div></a>
                
               	<div id="classes" class="module">
                	<div class="modulelabel">CLASSES</div>
                    <div class="modulelabeldetail">6</div>
                    <img class="moduleimage" src="<?php echo base_url() ?>assets/img/d22.png" alt=""/>
                </div>
                <div id="account" class="module">
                	<div class="modulelabel">ACCOUNT</div>
                    <div class="modulelabeldetail">6</div>
                    <img class="moduleimage" src="<?php echo base_url() ?>assets/img/d33.png" alt=""/>
                </div>
                <!--<div id="enroll" class="module">
                	<div class="modulelabel">ENROLL</div>
                    <div class="modulelabeldetail">6</div>
                    <img class="moduleimage" src="d44.png" width="50" height="60"  alt=""/>
                </div>-->
                <div id="profile" class="module">
               		<div class="modulelabel">PROFILE</div>
                    <div class="modulelabeldetail">6</div>
                    <img class="moduleimage" src="<?php echo base_url() ?>assets/img/d55.png" alt=""/>
                </div>
                <div id="performance" class="module">
                	<div class="modulelabel">PERFORMANCE</div>
                    <div class="modulelabeldetail">6</div>
                    <img class="moduleimage" src="<?php echo base_url() ?>assets/img/d66.png" alt=""/>
                </div>
            </div>
      </div>
      
      <br/> 
      
      <div class="workspacelabel">comprog1</div>
      
      <br/><br/>
      <hr id="sexyline"/><br/>
      
      <div id="studentlist">
       	  <br/><br/>
          
          <div id="studentdata">
           		<div class="studentnum"> 10789567</div>
           		<div class="studentsur"> CASTILLO </div> 
            	<div class="studentfirst">  Christopher C.</div>
                
                    <div class="studentgradebar">
                        <input type="text" id="gradelabel1" class="gradelabel"/>
                        <div class="sliderdiv">
                            <div id="slider1" class="slider"></div>
                        </div>
                    </div>
                
                <div id="gradesave1" class="gradesave"><img src="<?php echo base_url() ?>assets/img/done.png" alt=""/></div>
                
          </div>
          
          <br/><br/>
          
          <div id="studentdata">
           		<div class="studentnum"> 10727364</div>
           		<div class="studentsur"> CASTRO </div> 
            	<div class="studentfirst">  Jason J.</div>
                                
                    <div class="studentgradebar">
                        <input type="text" id="gradelabel2" class="gradelabel"/>
                        <div class="sliderdiv">
                            <div id="slider2" class="slider"></div>
                        </div>
                    </div>
                    
                    <div id="gradesave2" class="gradesave"><img src="<?php echo base_url() ?>assets/img/done.png" alt=""/></div>
                
                
          </div>
          
          <br/><br/>
          
          <div id="studentdata">
           		<div class="studentnum"> 10717652</div>
           		<div class="studentsur"> DOLLOSA </div> 
            	<div class="studentfirst">  Luigi G.</div>
                                
                	<div class="studentgradebar">
                        <input type="text" id="gradelabel3" class="gradelabel"/>
                        <div class="sliderdiv">
                            <div id="slider3" class="slider"></div>
                        </div>
                    </div>
                    
                    <div id="gradesave3" class="gradesave"><img src="<?php echo base_url() ?>assets/img/done.png" alt=""/></div>
                                
                
          </div>
          
          <br/><br/>
          
          <div id="studentdata">
           		<div class="studentnum"> 10784671</div>
           		<div class="studentsur"> JAVELONA </div> 
            	<div class="studentfirst">  Gian  G.</div>
                                
                	<div class="studentgradebar">
                        <input type="text" id="gradelabel4" class="gradelabel"/>
                        <div class="sliderdiv">
                            <div id="slider4" class="slider"></div>
                        </div>
                    </div>
                    
                    <div id="gradesave4" class="gradesave"><img src="<?php echo base_url() ?>assets/img/done.png" alt=""/></div>
                               
               
          </div><br/><br/>
          
          <div id="studentdata">
            <div class="studentnum"> 10107852</div>
           		<div class="studentsur"> PALALA </div> 
            	<div class="studentfirst">  Jose V.</div>
                                
                <div class="studentgradebar">
                        <input type="text" id="gradelabel5" class="gradelabel"/>
                        <div class="sliderdiv">
                            <div id="slider5" class="slider"></div>
                        </div>
            </div>
                    
                    <div id="gradesave5" class="gradesave"><img src="<?php echo base_url() ?>assets/img/done.png" alt=""/></div>
                                
                
          </div><br/><br/>
          
          <div id="studentdata">
           		<div class="studentnum"> 10727765</div>
           		<div class="studentsur"> TAMAD </div> 
            	<div class="studentfirst"> Juan T.</div>
                                
                <div class="studentgradebar">
                        <input type="text" id="gradelabel6" class="gradelabel"/>
                        <div class="sliderdiv">
                            <div id="slider6" class="slider"></div>
                        </div>
				</div>
                    
                    <div id="gradesave6" class="gradesave"><img src="<?php echo base_url() ?>assets/img/done.png" alt=""/></div>
                                
                
          </div>
		  

		  
		  
      </div>
      
	  
			    
			<div id="notifbox">
				<div id="notifications">
				
					<div id="checkboxdiv">
						<input type="checkbox" id="checkphone"><br/> <br/>
						<input type="checkbox" id="checkemail">
					</div>
					
					<div id="icondiv">
						<img src="<?=base_url()?>assets/images/phoneicon.png" id="iconphone" alt=""/><br/>
						<img src="<?=base_url()?>assets/images/mailicon.png" id="iconemail" alt=""/>
					</div>
					
					<div id="textdiv">
						<p class="textnotif">Send SMS  </p>
						<p class="textnotif">Send Email </p>
					</div>
					<div id="resultdiv">
						<div id="resulticon1" class="resulticon"><img src="<?=base_url()?>assets/img/done.png" alt=""/></div>
						<div id="resulticon2" class="resulticon"><img src="<?=base_url()?>assets/img/done.png" alt=""/></div>
					</div>
					
				 </div>

					<div id="sendbtndiv">
						<input type="button" id="sendbtn" value="SEND NOTIFICATION" >
					</div>
			   </div>

      <div id="canvasfooter"></div>
      
    </div>
    
  </body>
</html>