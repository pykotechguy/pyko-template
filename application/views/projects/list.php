<div class="container-fluid content-fluid">				    	
	 <div class="row-fluid">
        <div class="span12">
            <h2>Vendor List</h2>					    	
            <a class="btn new-vendor" href="<?php echo base_url('vendors/create') ?>"><div class="icon-plus" ></div>New Vendor</a>
        </div>   
    </div>
	<div class="row-fluid"> <!-- dashboard-widget -->
		<div class="span12 column">
			<div class=""> <!-- class=single widget" -->
				
				<table class="table table-striped table-bordered table-condensed">
					<thead>
						<tr>
							<th>Name</th>
							<th>Address</th>
							<th>City</th>
							<th>Zip</th>
							<th>Country</th>
							<th>Phone</th>
							<th>Fax</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody>
					<?php if(!empty($vendors)) : ?>
						<?php foreach($vendors as $vendor) :?>
                            <tr>
                                <td><?php echo $vendor->name ?></td>
                                <td><?php echo $vendor->address ?></td>
                                <td><?php echo $vendor->city ?></td>
                                <td><?php echo $vendor->zip ?></td>
                                <td><?php echo $vendor->country ?></td>
                                <td><?php echo $vendor->phone ?></td>
                                <td><?php echo $vendor->fax ?></td>
                                <td>
                                    <?php echo $vendor->email ?>
                                    <a href="<?php echo base_url('events/vendor_event/delete'); ?>" data-id="<?php echo $vendor->contactID; ?>" class="delete-vendor">
                                    	<div class="del-user icon-remove" alt="<?php echo $vendor->name; ?>">&nbsp;</div>
                                    </a>
                                </td>
                                <td class="edit">
                                	<a class="edit-user" alt="<?php echo $vendor->name; ?>" href="<?php echo base_url('vendors/edit/'. $vendor->contactID ) ?>">
                                    	Edit
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
					<?php else: ?>
						<tr><td colspan="8">no vendors </td></tr>
					<?php endif;?>
					</tbody>
				</table>

				<input type="hidden" name="sig" id="sig" value="<?php echo $sig; ?>" />
                <input type="hidden" name="expires" id="expires" value="<?php echo $expires; ?>" />
			</div>
		 	<?php echo $this->pagination->create_links(); ?>
		</div>
		
	</div>
</div>