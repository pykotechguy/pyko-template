<?php
//$this->output->enable_profiler(true);
?>

<div class="container-fluid content-fluid">				    	
	<input type='hidden' name='contact_source_data' id='contact_source_data' value='<?php echo json_encode($contact_names); ?>'>
	
	<div class="row-fluid" style="margin-top: 20px;">
		<div class="span12">		
			<h2>Create an invoice</h2>
		</div>
	</div>			
	<div class="row-fluid create" style="margin-top: 20px;">
		<div class="span12">		

			<form id="invoice" name="form1" class="form-horizontal" action="<?php echo base_url( "events/invoice_event/create_invoice" ); ?>" method="post">

				<fieldset>
				<div class="control-group">
					<label class="control-label" for="name">Customer Name</label>
					<div class="controls">
						<input id="customer_name" name="customer_name" type="text" class="span3" value="" />
					</div>
				</div>


					<div class="control-group">
					<label class="control-label" for="name">Address</label>
					<div class="controls">
						<input id="address" name="address" type="text" class="span3" value="" />
					</div>
				</div>
				
				
					<div class="control-group">
					<label class="control-label" for="email">Email</label>
					<div class="controls">
						<input id="email" name="email" type="text" class="span3" value="" />
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="country">Country</label>
					<div class="controls">
						<select id="country" name="country" class="span3" />
						<?php listCountries(); ?>
						</select>
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
						<input id="zip" name="zip" type="text" class="span3" value="" />
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="currency">Currency</label>
					<div class="controls">
						<input id="currency" name="currency" type="text" class="span3" value="" />
					</div>
				</div>
				</fieldset>
				

				<fieldset>
							<div class="control-group">
								<table id="invoice_list" class="appendo">
						<thead>
							<tr>
								<th>Category</th>
								<th>Product/Service</th>
								<th>Rate</th>
								<th>Quantity</th>
								<th>Amount</th>
								
							</tr>
						</thead>
							<tr>
								<td>
								<select name="category[]">
									
									<?php  if($categories->num_rows() > 0): ?>
										<?php foreach($categories->result() as $category): ?>
												<option value="<?php echo $category->ID ?>"><?php echo $category->accountname ?></option>
										<?php endforeach; ?>
									<?php  else: ?>
										<option value="">No items found</option>
									<?php	endif; ?>
								</select>
								</td>
								<td>
								<select name="product[]">
									<?php foreach($products->result() as $product): ?>
											<option value="<?php echo $product->productID ?>"><?php echo $product->prodname; ?></option>
									<?php endforeach; ?>
									
								</select>
								
								</td>
								
								<td><input  type="text" id="rate" name="rate[]"></td>
								<td><input type="text" name="quantity[]"></td>
								<td><input type="text" name="amount[]"></td>
								
							</tr>
							
							
							
							
						</table>


						</div>
				</fieldset>

				<fieldset>
				<div class="control-group">
					<label class="control-label" for="name">Is Taxable?</label>
					<div class="controls">
						<div class="span4">
							<input id="is_taxed" name="is_taxed" type="radio" value="yes" class="span1" />Yes &nbsp;
							<br />
							<input id="is_taxed" name="is_taxed" type="radio" value="no"  class="span1" /> No
						</div>
					</div>
				</div>
			
			
				<div class="control-group">
						<label class="control-label" for="name">Tax Rate</label>
						<div class="controls">
							<input id="taxchg" name="taxchg" type="text" class="span3" />
						</div>
				</div>
				
				<div class="control-group">
						<label class="control-label" for="name">Deduction Rate</label>
						<div class="controls">
							<input id="dedrate" name="dedrate" type="text" class="span3" />
				</div>

				<div class="control-group">
					<label class="control-label" for="name">Deduction:</label>
						<div class="controls">
							<input id="deduction" name="deduction" type="text" class="span3" />
				</div>
				
				<div class="control-group">
					<label class="control-label" for="name">Due Date:</label>
						<div class="controls">
								<input id="duedate" name="duedate" type="text" class="span3 datepicker" />
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="name">Total Amount:</label>
						<div class="controls">
							<input id="dedrate" name="dedrate" type="text" class="span3" />
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

				</fieldset>
				
				
		</div>
		


				</div>
				
				
				
				</div>	
			
				<input type="hidden" value="<?php echo base_url('invoices/load_newline_to_invoice_list') ?>" name="invoice_form_url" id="invoice_form_url">
				<input type="hidden" value="<?php echo $company_id; ?>" id="company_id" name="cid" >
				</form>

			</div>
			<!-- end div row -->



		</div>
	</div>			    		    
</div>