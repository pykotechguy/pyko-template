<!DOCTYPE html>
<html>
  <head>
    <title>Teacher Grading Prototype Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    
    <!-- STYLE SHEET -->
      
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
      <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/grades/grades.css">
  </head>
  <body>
    
	<!--JAVASCRIPT-->
	    <!-- JavaScript plugins (requires jQuery) -->
	    <script src="http://code.jquery.com/jquery.js"></script>
	   
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="js/bootstrap.min.js"></script>

	    <!-- Optionally enable responsive features in IE8 -->
	    <script src="js/respond.js"></script>
        
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  
   		<script src="<?php echo base_url(); ?>/assets/js/javascript.js"></script>

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
            	<a href="<?php echo base_url() ?>">
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
      
      <div class="workspacelabel">classes</div>
      
      <br/><br/>
      <hr id="sexyline"/>
      <br/>
      <br/>
       
             
            <!--
            
            Subject		Name						Class	Schedule
            COMPROG1	Computer Programming		IS01	TH, 9:40AM –  11:10AM
            ENGLISH101	English Fundamentals		MP90	MWF, 7:00AM – 8:00AM
            ACCOUNTING	Basic Accounting			X1MB	SAT, 9:00AM – 12:00PM
            FINANCE101	Basic Financial Management	HU78	MWF, 8:10AM – 9:10AM
            NETWORKING	Networking Systems			IS04	TH, 11:20AM – 12:50PM
            ELECTRONICS	Electronics Elective		ENG5	TH, 1:00PM – 2:30PM
            CALCULUS01	Calculus Primary			MAT2	MWF, 9:20AM – 10:20AM
            
            -->
       
       
       <div id="teacherclass">
       <table width="700" align="center" id="classtable">
            <tr>
              <th width="200" id="columnsubject" class="tableheader" >SUBJECT</th>
              <th width="190" id="columnname" class="tableheader" >NAME</th>
              <th width="80" id="columnclass" class="tableheader" >CLASS</th>
              <th width="210" id="columntime" class="tableheader" >TIME</th>
            </tr>
                  
            <tr id="firstrow"> 
            </tr>
            
            
            <tr class = "row" onclick="DoNav('<?php echo site_url('teacher/grades'); ?>')">
                <td class="firstcolumn" >COMPROG1</td>
                <td>Computer Programming</td>
                <td>IS01</td>
                <td>TH, 9:40AM - 11:10AM</td>
            </tr>
            
            
            <tr class = "row">
            	<td class="firstcolumn">ENGLISH101</td>
                <td>English Fundamentals</td>
              	<td>MP90</td>
              	<td>MWF, 7:00AM - 8:00AM</td>
            </tr>
                    
            <tr class = "row">
              <td class="firstcolumn">ACCOUNTING</td>
              <td>Basic Accounting</td>
              <td>X1MB</td>
              <td>SAT, 9:00AM - 12:00PM</td>
            </tr>
            
            <tr class = "row">
              <td class="firstcolumn">FINANCE101</td>
              <td>Financial Management</td>
              <td>HU78</td>
              <td>MWF, 8:10AM - 9:10AM</td>
            </tr>
                           
            <tr class = "row">
              <td class="firstcolumn">NETWORKING</td>
              <td>Networking Systems</td>
              <td>IS04</td>
              <td>TH, 11:20AM - 12:50PM</td>
            </tr>
            
            <tr class = "row">
              <td class="firstcolumn">ELECTRONICS</td>
              <td>Electronics Elective</td>
              <td>ENG5</td>
              <td>TH, 1:00PM - 2:30PM</td>
            </tr>
       
            <tr class = "row">
              <td class="firstcolumn">CALCULUS01</td>
              <td>Calculus Primary</td>
              <td>MAT2</td>
              <td>MWF, 9:20AM - 10:20AM</td>
            </tr>
     </table> </div>
        
        
      
      <div id="canvasfooter"></div>
      
  </div>
    
  </body>
</html>