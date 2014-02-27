				    <div class="container-fluid content-fluid">				    	
				    	<div class="row-fluid">
					    	<div class="span12">
					    		<h2>Add New Employee</h2>
								 <div id="messageresult"  style="height:25px" ><div> 
						</div>
				    	</div>
				    	<div class="row-fluid" style="margin-top: 20px;">
						
						
					    	<div class="span12">	
										
									
								
					    		<form id="employee" class="form-horizontal"  action="<?php echo $form_url_action; ?>" >
					    			<div class="control-group">
                                        <div id="message_box"></div>
					    			</div>        

					    			<div class="control-group">
					    				<label for="name" class="control-label">Name</label>
					    				<div class="controls">
					    					<input type="text" class="span3" id="employee_name" name="employee_name" />
					    				</div>
					    			</div>

					    			<div class="control-group">
					    				<label for="checkname" class="control-label">Check Name</label>
					    				<div class="controls">
					    					<input type="text" class="span3" id="employee_checkname" name="employee_checkname" />
					    				</div>
					    			</div>
									
					    			<div class="control-group">
					    				<label for="address" class="control-label">Address</label>
					    				<div class="controls">
					    						<textarea rows="5" class="span3" id="employee_address" name="employee_address"></textarea>
					    				</div>
					    			</div>
					    			<div class="control-group">
					    				<label for="city" class="control-label">City</label>
					    				<div class="controls">
					    					<input  type="text" class="span3" id="employee_city" name="employee_city" />
					    				</div>
					    			</div>
					    			<div class="control-group">
										<label for="zip" class="control-label">Zip</label>
					    				<div class="controls">
					    					<input  type="text" class="span3" id="employee_zip" name="employee_zip"/>
					    				</div>
					    			</div>
					    			<div class="control-group">
					    				<label for="State" class="control-label">State</label>
					    				<div class="controls">
					    						<input  type="text" class="span3" id="employee_state" name="employee_state"/>
					    				</div>
					    			</div>
                                    <div class="control-group">
					    				<label for="country" class="control-label">Country</label>
										<div class="controls">
											<select id="employee_country" name="employee_country" class="selectpicker span3">
					    						<?php echo listCountries(); ?>
					    					</select>
										</div>
									</div>
									<div class="control-group">
					    				<label class="control-label">Phone No.</label>
					    					<div class="controls">
												<input  type="text"  name="employee_phone" id="employee_phone">
					    					</div>
									</div>
									<div class="control-group">
					    				<label for="gender" class="control-label">Fax</label>
					    					<div class="controls">
												<input  type="text"  name="employee_fax" id="employee_fax">
					    					</div>
									</div>
									<div class="control-group">
					    				<label class="control-label">Email.</label>
					    					<div class="controls">
												<input  type="text"  name="employee_email" id="employee_email">
					    					</div>
									</div>									
									<div class="control-group">
					    				<label for="gender" class="control-label">Gender</label>
					    					<div class="controls">
												<select id="employee_gender" name="employee_gender" class="selectpicker span3">
					    						<?php echo listGenders(); ?>
					    					</select>
					    					</div>
									</div>
									
									<div class="control-group">
					    				<label for="dateofbirth" class="control-label">Date Of Birth</label>
					    					<div class="controls">
												<input  type="text"  name="employee_dob" id="employee_dob" class="span3 datepicker">
					    					</div>
									</div>
									<div class="control-group">
					    				<label for="ssn" class="control-label">Social Security Number</label>
					    					<div class="controls">
												<input  type="text"  name="employee_ssn" id="employee_ssn">
					    					</div>
									</div>
									<div class="control-group">
					    				<label for="hiredate" class="control-label">Hire Date</label>
					    					<div class="controls">
												<input  type="text"  name="employee_hdate" id="employee_hdate" class="span3 datepicker">
					    					</div>
									</div>
									<div class="control-group">
					    				<label for="releaseddate" class="control-label">Released Date</label>
					    					<div class="controls">
												<input  type="text"  name="employee_rdate" id="employee_rdate" class="span3 datepicker">
					    					</div>
									</div>
									
									<input type="hidden" value="<?php echo $company_id; ?>" name="cid">
                                    <input type="hidden" value="<?php echo $company_id; ?>" name="cmpid">
                                    <input type="hidden" id="sig" name="sig" value="<?php echo $sig; ?>" />
                                    <input type="hidden" id="expires" name="expires" value="<?php echo $expires; ?>" />
                                    <input type="submit" value="Create New" name="edit_product" class="btn btn-save btn-submit">
                                    <a href="<?php echo $employee_list_url; ?>" class="btn btn-save" style="float: left; margin: 0; margin-left: 6px;">Employee List</a>
					    				</div>
					    			</div>
					    		</form>
					    	</div>
				    	</div>
				    </div>