<div class="container-fluid content-fluid">				    	
	<div class="row-fluid">
		<div class="span12">
			<h2>Account Information</h2>
		</div>
	</div>
	<div class="row-fluid" style="margin-top: 20px;">
		<div class="span12">					    		
			<p>You'll have your free account in less than a minute! Just type-in your details below.</p>
			<p>* Required fields</p>
			<div id="msg_success">Sample Message</div>
			<form id="register" class="form-horizontal" action="events/user_event/register" >
				<div class="control-group">
					<label class="control-label">Company Name*</label>
					<div class="controls">
						<input id="cname" name="cname" type="text" class="span3" value="" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Email Address*</label>
					<div class="controls">
						<input id="email" name="email" type="text" class="span3" value="" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Repeat Email Address*</label>
					<div class="controls">
						<input id="remail" name="remail" type="text" class="span3" value="" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">First Name*</label>
					<div class="controls">
						<input id="fname" name="fname" type="text" class="span3" value="" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Last Name*</label>
					<div class="controls">
						<input id="lname" name="lname" type="text" class="span3" value="" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Numia Password*</label>
					<div class="controls">
						<input id="password" name="password" type="password" class="span3" value="" />
					</div>	
				</div>
				<div class="control-group">
					<label class="control-label">Repeat Password*</label>
					<div class="controls">
						<input id="rpassword" name="rpassword" type="password" class="span3" value="" />
					</div>	
				</div>
				<div class="control-group">
					<label class="control-label" style="padding: 0 !important;"></label>
					<div class="controls">
						<label class="checkbox span3 sub-chk">
							<input id="agree" type="checkbox" name="optionsCheckboxList1" value="option1">
							I agree to the numia.biz Terms and Conditions and Privacy Policy 
						</label>
					</div>
				</div>				    			
				<div class="control-group">
					<label class="control-label"></label>
					 <input type="hidden" name="sig" value="<?php echo $sig; ?>" />
                     <input type="hidden" name="expires" value="<?php echo $expires; ?>" />
                    <div class="controls">
					  <input type="submit" value="Create My Account" name="login" class="btn btn-save btn-submit">					    					
					</div>
				</div>
			</form>
		</div>
	</div>
</div>