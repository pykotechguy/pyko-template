
	<div class="container-fluid content-fluid">				    	
		<div class="row-fluid">
			<div class="span12">
				<h2>Add Vendor</h2>
			</div>
		</div>
		<div class="row-fluid" style="margin-top: 20px;">
			<div class="span12">

                <form id="vendor" class="form-horizontal" action="<?php echo base_url( "events/vendor_event/create" );?>">

					<div class="control-group">
						<label class="control-label" for="name">Name</label>
						<div class="controls">
							<input id="name" name="name" type="text" class="span3" value="" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="email">Nickname</label>
						<div class="controls">
							<input id="nickname" name="nickname" type="text" class="span3" value="" />
						</div>	
					</div>
					<div class="control-group">
						<label class="control-label" for="email">Email</label>
						<div class="controls">
							<input id="email" name="email" type="text" class="span3" value="" />
						</div>	
					</div>
					<div class="control-group">
						<label class="control-label" for="address">Address</label>
						<div class="controls">
							<input id="address" name="address" type="text" class="span3" value="" />
						</div>	
					</div>
					<div class="control-group">
						<label class="control-label" for="city">City</label>
						<div class="controls">
							<input id="city" name="city" type="text" class="span3" value="" />
						</div>	
					</div>
					<div class="control-group">
						<label class="control-label" for="state">State</label>
						<div class="controls">
							<input id="state" name="state" type="text" class="span3" value="" />
						</div>	
					</div>
					<div class="control-group">
						<label class="control-label" for="zip">Zip</label>
						<div class="controls">
							<input id="zipcode" name="zipcode" type="text" class="span3" value="" />
						</div>	
					</div>
					<div class="control-group">
						<label class="control-label" for="country">Country</label>
						<div class="controls">
							<select id="country" name="country"  class="span3" />
							<?php
								echo $countries;
							?>
							</select>
						</div>	
					</div>					
					<div class="control-group">
						<label class="control-label" for="phone">Phone</label>
						<div class="controls">
							<input id="phone" name="phone" type="text" class="span3" value="" />
						</div>	
					</div>
					<div class="control-group">
						<label class="control-label" for="fax">Fax</label>
						<div class="controls">
							<input id="fax" name="fax" type="text" class="span3" value="" />
						</div>	
					</div>
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls">
							<input type="hidden" name="company_id" value="<?php echo $company_id; ?>" />
							<input type="hidden" name="sig" value="<?php echo $sig; ?>" />
                            <input type="hidden" name="expires" value="<?php echo $expires; ?>" />
                            <input type="submit" value="Create" name="create" class="btn btn-save btn-submit">
							
						</div>
					</div>
                </form>
			</div>
		</div>
	</div>

