<div class="container-fluid content-fluid account">	
    <div class="parent">
        <div class="row-fluid">
            <div class="span12">
                <div class="toggle">
                    <h2>Account Preferences</h2>					    			
                </div>
            </div>		
        </div>
        <div class="row-fluid child-toggle" style="display: block">
            <div class="span12">
                <form class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Currency</label>
                        <div class="controls">
                            <div class="input-append">
                                <select class="selectpicker span3">
                                    <?php listCurrencies( $currency );?>
                                </select>
                                <span class="add-on"><span>Recommended:</span> <?php echo getRecommendedCurrency( $country, true );?></span>
                            </div>
                            
                        </div>				    				
                    </div>
                    <div class="control-group">
                        <label class="control-label">Date Format</label>
                        <div class="controls">
                            <select class="selectpicker span3">
                                <?php dateFormats();?>
                            </select>
                        </div>				    				
                    </div>						    	
                    <div class="control-group">
                        <label class="control-label">
                            Fiscal Month of the Year 
                            <!-- <a href="#" class="icon-question-sign" rel="popover" id='el3' data-content="This is my popover content" data-original-title="My Popover Title">
                            </a> -->
                            <div class="icon-question-sign"></div>
                        </label>
                        <div class="controls">
                            <select class="selectpicker span2">
                                <?php getMonths( $fiscalmonth );?>
                            </select>
                        </div>				    				
                    </div>
                    <div class="control-group">
                        <label class="control-label">IT Month of the Year</label>
                        <div class="controls">
                            <select class="selectpicker span2">
                                <?php getMonths( $itmonth );?>
                            </select>
                        </div>				    				
                    </div>
                    <div class="control-group">
                        <label class="control-label">Manual Closing of Books</label>
                        <div class="controls">
                            <select class="selectpicker span2">
                                <option value="0" <?php if( !$closebook ) echo "selected='selected'";?>>No</option>
                                <option value="1" <?php if( $closebook ) echo "selected='selected'";?>>Yes</option>
                            </select>
                        </div>				    				
                    </div>
                    <div class="control-group">
                        <label class="control-label">Sales Tax</label>
                        <div class="controls">
                            <select class="selectpicker span2">
                                <option value="0" <?php if( !$salestax ) echo "selected='selected'";?>>No</option>
                                <option value="1" <?php if( $salestax ) echo "selected='selected'";?>>Yes</option>
                            </select>
                        </div>				    				
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tax Rate</label>
                        <div class="controls">
                            <div class="input-append">
                                <input class="span2" size="16" type="text" value="<?php echo $taxrate;?>">
                                <span class="add-on">%</span>
                            </div>
                        </div>				    				
                    </div>
                </form>
            </div>	
        </div>
    </div>			    	
    
    <div class="parent">
        <div class="row-fluid">
            <div class="span12">
                <div class="toggle">
                    <h2>Number Settings</h2>					    			
                </div>
            </div>		
        </div>
        <div class="row-fluid child-toggle">
            <div class="span12">
                <form class="form-horizontal number-settings">
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label">Negative Numbers</label>
                                <div class="controls">
                                    <label class="radio">
                                        <input type="radio" name="negative" value="normal" <?php if( $negative == "normal" ) echo "checked";?> >
                                        Display Normally
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="negative" value="paren" <?php if( $negative == "paren" ) echo "checked";?>>
                                        In Parenthesis
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="negative" value="minus" <?php if( $negative == "minus" ) echo "checked";?>>
                                        Trailing Negative ( - )
                                    </label>
                                </div>				    				
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label">Number Display</label>
                                <div class="controls">
                                    <label class="checkbox">
                                        <input type="checkbox" name="red" value="red" <?php if( $red ) echo "checked";?>>
                                        RED Fonts
                                    </label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="divide" value="divide" <?php if( $divide ) echo "checked";?>>
                                        Divided by 1000 
                                    </label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="cents" value="cents" <?php if( $cents	 ) echo "checked";?>>
                                        Without Cents 
                                    </label>
                                </div>				    				
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label">Decimal Separator</label>
                                <div class="controls">
                                    <label class="radio">
                                        <input type="radio" name="seperator" value="." <?php if( $seperator == "." ) echo "checked";?>>
                                        Decimal Point ( . )
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="seperator" value="," <?php if( $seperator == "," ) echo "checked";?>>
                                        Comma ( , )
                                    </label>
                                </div>				    				
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label">Number Separator</label>
                                <div class="controls">
                                    <label class="radio">
                                        <input type="radio" name="separatornum" value="." <?php if( $seperatornum == "." ) echo "checked";?>>
                                        Decimal Point ( . )
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="separatornum" value="," <?php if( $seperatornum == "," ) echo "checked";?>>
                                        Comma ( , )
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="separatornum" value="none" <?php if( $seperatornum == "none" ) echo "checked";?>>
                                        None
                                    </label>
                                </div>				    				
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label">Number of Decimal Places</label>
                                <div class="controls">
                                <label class="radio">
                                    <input type="radio" name="numberspec" value="2" <?php if( $numberspec == "2" ) echo "checked";?>>
                                    2
                                </label>
                                <label class="radio">
                                    <input type="radio" name="numberspec" value="3" <?php if( $numberspec == "3" ) echo "checked";?>>
                                    3
                                </label>
                                <label class="radio">
                                    <input type="radio" name="numberspec" value="none" <?php if( $numberspec == "2" ) echo "checked";?>>
                                    None
                                </label>
                            </div>				    				
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    
    <div class="parent">
        <div class="row-fluid">
            <div class="span12">
                <div class="toggle">
                    <h2>Invoice Aging Option</h2>					    			
                </div>
            </div>		
        </div>
        <div class="row-fluid child-toggle">
            <div class="span12">
                <form class="form-horizontal invoice-aging">
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label">30 Days Due</label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input class="span2" size="16" type="text" value="<?php echo $due_30_days;?>">
                                        <span class="add-on">%</span>
                                    </div>
                                </div>				    				
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label">90 Days Due</label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input class="span2" size="16" type="text" value="<?php echo $due_90_days;?>">
                                        <span class="add-on">%</span>
                                    </div>
                                </div>				    				
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label">60 Days Due</label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input class="span2" size="16" type="text" value="<?php echo $due_60_days;?>">
                                        <span class="add-on">%</span>
                                    </div>
                                </div>				    				
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label">Over 90 Days Due</label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input class="span2" size="16" type="text" value="<?php echo $over_90_days;?>">
                                        <span class="add-on">%</span>
                                    </div>
                                </div>				    				
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="parent">
        <div class="row-fluid">
            <div class="span12">
                <div class="toggle">
                    <h2>Help Links</h2>					    			
                </div>
            </div>		
        </div>
        <div class="row-fluid child-toggle">
            <div class="span12">
                <form class="form-horizontal help-links">
                    <div class="row-fluid">
                        <div class="span12">
                            <a href="">What is Fiscal Month of the Year? What is IT Month of the Year?</a>
                            <a href="">How to set the Preferences for my Company?</a>
                            <a href="">How to have two different currencies?</a>
                            <a href="">Require manual closing of Books</a>
                            <a href="">What is IT Month of the Year?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
