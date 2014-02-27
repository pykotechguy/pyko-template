
	<div class="container-fluid content-fluid">				    	
		<div class="row-fluid">
			<div class="span12">
				<h2>Login</h2>
			</div>
		</div>
		<div class="row-fluid" style="margin-top: 20px;">
			<div class="span12">

                <form id="login" class="form-horizontal" action="events/user_event/login">
					<div class="control-group">
						<label class="control-label" for="email">Email Address</label>
						<div class="controls">
							<input id="email" name="email" type="text" class="span3" value="" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="password">Password</label>
						<div class="controls">
							<input id="password" name="password" type="password" class="span3" value="" />
						</div>	
					</div>
					<div class="control-group">
						<label class="control-label" style="padding: 0 !important;"></label>
						<div class="controls">
							<label class="checkbox span3 sub-chk">
								<input type="checkbox" name="optionsCheckboxList1" value="option1">
								Use secured login 
							</label>
						</div>
					</div>				    			
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls">
                            <input type="hidden" name="sig" value="<?php echo $sig; ?>" />
                            <input type="hidden" name="expires" value="<?php echo $expires; ?>" />
                            
                            <input type="submit" value="Login" name="login" class="btn btn-save btn-submit">
							<a class="btn btn-link change" style="float: left; margin: 0; margin-top: 7px;">Forgot Password</a>				    					
						</div>
					</div>
                </form>
			</div>
		</div>
	</div>