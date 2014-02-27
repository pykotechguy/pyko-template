<div class="container-fluid content-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h2>Hi, <?php echo $company; ?></h2>
        </div>				   
    </div>
    <div class="row-fluid">
        <div class="span3 left-profile">
            <div class="profile-pic">
                <div class="delete" title="Delete"></div>
                <?php if( !empty( $logo ) ):?>
                <img src="<?php echo $logo;?>" />
                <?php endif;?>
            </div>
            <button>Change Picture</button>
        </div>
        <div class="span9">
            <form class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">Company Name</label>
                    <div class="controls">
                        <input type="text" class="span3" value="<?php echo $company;?>" />
                    </div>				    				
                </div>
                <div class="control-group">
                    <label class="control-label">Website</label>
                    <div class="controls">
                        <input type="text" class="span3" value="<?php echo $website;?>" />
                    </div>				    				
                </div>
                <div class="control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <input type="text" class="span3" value="<?php echo $email;?>" />
                    </div>				    				
                </div>
                <div class="control-group">
                    <label class="control-label">Phone</label>
                    <div class="controls">
                        <input type="text" class="span3" value="<?php echo $phone;?>" />
                    </div>				    				
                </div>
                <div class="control-group">
                    <label class="control-label">Password</label>
                    <div class="controls">
                        <input type="password" class="span3" value="" />
                        <button class="btn btn-link change">Change</button>
                    </div>	
                </div>
            </form>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12 user">
            <h2>Company Address</h2>
        </div>				   
    </div>
    <div class="row-fluid">
        <div class="span3">
            <div class="spacer"></div>
        </div>
        <div class="span9">
            <form class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">Country</label>
                    <div class="controls">
                        <input type="text" class="span3" value="<?php echo $country;?>" />
                    </div>				    				
                </div>
                <div class="control-group">
                    <label class="control-label">City</label>
                    <div class="controls">
                        <input type="text" class="span3" value="<?php echo $city;?>" />
                    </div>				    				
                </div>
                <div class="control-group">
                    <label class="control-label">Street Address</label>
                    <div class="controls">
                        <input type="text" class="span3" value="<?php echo $street;?>" />
                    </div>				    				
                </div>
                <div class="control-group">
                    <label class="control-label">State</label>
                    <div class="controls">
                        <input type="text" class="span3" value="<?php echo $state;?>" />
                    </div>				    				
                </div>
                <div class="control-group">
                    <label class="control-label">Zip/Post Code</label>
                    <div class="controls">
                        <input type="text" class="span3" value="<?php echo $zipcode;?>" />
                    </div>	
                </div>
            </form>
        </div>
    </div>
</div>
