<div class="container-fluid content-fluid">				    	
    <div class="row-fluid">
        <div class="span12">
            <h2>Purchase Order</h2>
        </div>
    </div>
    <div class="row-fluid" style="margin-top: 20px;">
        <div class="span12">					   
			<h3>Vendor Information</h3>
            <form class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">Vendor Name</label>
				<?php				foreach($vendorinfo as $vendor) : 			?>
                    <div class="controls ">
                        <span class="span3 uneditable-input"><?php echo $vendor->vendor_name; ?></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"  for="vendor address">Vendor Address</label>
                    <div class="controls">
						<span class="span3 uneditable-input"><?php echo $vendor->vendor_address; ?></span>
                        </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="city">City</label>
                    <div class="controls">
                        <span class="span3 uneditable-input"><?php echo $vendor->vendor_city; ?></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="address">Address</label>
                    <div class="controls">
                        <span class="span3 uneditable-input"><?php echo $vendor->vendor_address; ?></span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="zip">Zip</label>
                    <div class="controls">
                        <span class="span3 uneditable-input"><?php echo $vendor->vendor_zip; ?></span>	
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="phone">Phone</label>
                    <div class="controls">
                        <span class="span3 uneditable-input"><?php echo $vendor->vendor_phone; ?></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="state">State</label>
                    <div class="controls">
                        <span class="span3 uneditable-input"><?php echo $vendor->vendor_state; ?></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="country">Country</label>
                    <div class="controls">						    					
                        <span class="span3 uneditable-input"><?php echo $vendor->vendor_country; ?></span>
                    </div>				    				
                </div>

                <div class="control-group">
                    <label class="control-label" for="country">Email</label>
                    <div class="controls">						    					
                        <span class="span3 uneditable-input"><?php echo $vendor->vendor_email; ?></span>
                    </div>				    				
                </div>
				<?php endforeach; ?>
				<hr>
				<h3>Purchase Product / Service Information</h3>
				
				<?php 	if(isset($products) && (count($products) >= 1)) : ?>
						<table>
							<thead>
								<tr>
									<th>Product/Service
									<th>Rate</th>
									<th>Quantity</th>
									<th>Amount</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($products as $product): ?>
									<tr>
										<td><?php echo $product->description; ?></td>
										<td><?php echo $product->rate; ?></td>
										<td><?php echo $product->quantity; ?></td>
										<td><?php echo $product->amount; ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
				<?php endif; 	?>
				
				  <table width="100%"  border="0" cellpadding="4" cellspacing="0" class="table table-striped table-bordered table-condensed">
                    	<tr>
                        	<td width="100"><strong>Tax :</strong></td>
                            <td colspan="3"><?php echo $tax; ?></td>
                        </tr>
                        <tr>
                        	<td><strong>Deductions :</strong></td>
                            <td colspan="3"><?php echo $deduction;?></td>
                        </tr>
                        <tr>
                        	<td><strong>Total :</strong></td>
                            <td colspan="3"><?php echo $total_amount;?></td>
                        </tr>
                    </table>
				
				
				
				<h3>Shipping Details</h3>
				
				<?php foreach($vendorinfo as $vendor) :  ?>
				<div class="control-group">
                    <label class="control-label">Shipping Address</label>
                    <div class="controls">
                        <span class="span3 uneditable-input"><?php echo $vendor->shipping_address; ?></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Shipping City</label>
                    <div class="controls">
                        <span class="span3 uneditable-input"><?php echo $vendor->shipping_city; ?></span>
                    </div>
                </div>	
				<div class="control-group">
                    <label class="control-label">Shipping Zip</label>
                    <div class="controls">
                        <span class="span3 uneditable-input"><?php echo $vendor->shipping_zip; ?></span>
                    </div>
                </div>	
				<div class="control-group">
                    <label class="control-label">Shipping State</label>
                    <div class="controls">
                        <span class="span3 uneditable-input"><?php echo $vendor->shipping_state; ?></span>
                    </div>
                </div>	
				<div class="control-group">
                    <label class="control-label">Description</label>
                    <div class="controls">
                        <span class="span3 uneditable-input"><?php echo $vendor->description; ?></span>
                    </div>
                </div>	
				
				<?php endforeach; ?>
                <h3>Related Credit Purchase</h3>
				<?php if(isset($creditpurchaseinfo) && count($creditpurchaseinfo) > 0): ?>
					  <table border="0" cellpadding="4" cellspacing="0" class="table table-striped table-bordered table-condensed" >
						<thead>
								<tr>
									<th>Vendor Name</th>
									<th>Date</th>
									<th>Total Amount</th>
								</tr>
						</head>
						<tbody>
							<?php foreach($creditpurchaseinfo as $creditpurchase): ?>
								<tr>
										<td><?php echo $creditpurchase->vendor_name; ?></td>
										<td><?php  echo $creditpurchase->transaction_date;?></td>
										<td><?php  echo $creditpurchase->total_amount;?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
				<?php else : ?>
					<div id="notify-container" class="ui-notify alert">
						<div id="notify-template">
							No Related Credit Purchases found.
						</div>
					</div>
				<?php endif; ?>
				
				