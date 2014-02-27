<div class="container-fluid content-fluid">				    	
    <div class="row-fluid">
        <div class="span12">
            <h2>Sales Invoice</h2>
        </div>
    </div>
    <div class="row-fluid" style="margin-top: 20px;">
        <div class="span12">					    		
            <form class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">Invoice No.</label>
                    <div class="controls">
                        <input type="text" class="span3" value="<?php echo $invnumber;?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Customer Name</label>
                    <div class="controls">
                        <input type="text" class="span3" value="" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Date</label>
                    <div class="controls">
                        <input type="text" class="span3 datepicker" value="" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Due Date</label>
                    <div class="controls">
                        <input type="text" class="span3 datepicker" value="" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Address</label>
                    <div class="controls">
                        <textarea rows="5" class="span3"></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">City</label>
                    <div class="controls">
                        <input type="text" class="span3" value="" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Zip</label>
                    <div class="controls">
                        <input type="text" class="span3" value="" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">State</label>
                    <div class="controls">
                        <input type="text" class="span3" value="" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Country</label>
                    <div class="controls">						    					
                        <select class="selectpicker span3">
                            <option>United States</option>
                        </select>
                    </div>				    				
                </div>		
                <div class="control-group">
                    <label class="control-label">Phone</label>
                    <div class="controls">
                        <input type="text" class="span3" value="" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <input type="text" class="span3" value="" />
                    </div>
                </div>	
                <div class="control-group">
                    <label class="control-label">Currency</label>
                    <div class="controls">						    					
                        <select class="selectpicker span3">
                            <option>USD</option>
                        </select>
                    </div>				    				
                </div>			    			
            </form>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <form class="form-horizontal">
                <table class="table table-striped table-bordered table-condensed" id="createInvoice">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Product/ Service</th>
                            <th>Rate</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="line_item[0][category]" class="selectpicker span2 category">
                                    <option>Select Category</option>
                                </select>
                            </td>
                            <td>
                                <select name="line_item[0][product]" class="selectpicker span2 products">
                                    <option value="">Select Product</option>									
									<?php foreach( $products as $product ):?>
									<option value="<?php echo $product->productID;?>" rate="<?php echo $product->rate;?>"><?php echo $product->prodname;?></option>
									<?php endforeach;?>
                                </select>
                            </td>
                            <td>
							  <input name="line_item[0][rate]" type="text" class="rate span2" />
                            </td>
                            <td>
                                <input name="line_item[0][qty]" type="text" class="qty span2" />
                            </td>
                            <td>
							  <input name="line_item[0][amount]" type="text" readonly="true" class="amount span2" />
							  <!--<div class="icon-remove"></div>-->
							</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Category</th>
                            <th>Product/ Service</th>
                            <th>Rate</th>
                            <th>Quantity</th>
                            <th>About</th>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <a class="btn btn-save btn-add">Add More Lines</a>
        </div>
    </div>
    <div class="row-fluid form-right">
        <div class="span12">					    		
            <form class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">Tax</label>
                    <div class="controls">
                        <span class="span3 uneditable-input"></span>
                    </div>				    				
                </div>
                <div class="control-group">
                    <label class="control-label">Deduction</label>
                    <div class="controls">
                        <span class="span3 uneditable-input"></span>
                    </div>				    				
                </div>
                <div class="control-group">
                    <label class="control-label">Total Amount</label>
                    <div class="controls">
                        <span class="span3 uneditable-input"></span>
                    </div>				    				
                </div>
                <div class="control-group">
                    <label class="control-label">IsTaxable</label>
                    <div class="controls">
                        <select class="selectpicker span3">
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>				    				
                </div>
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <input type="text" class="span3" value="" />
                    </div>				    				
                </div>
                <div class="control-group">
                    <label class="control-label">Deduction Rate</label>
                    <div class="controls">
                        <input type="text" class="span3" value="" />
                    </div>				    				
                </div>
                <div class="control-group">
                    <label class="control-label">Transaction Comment</label>
                    <div class="controls">
                        <textarea rows="5" class="span3"></textarea>
                    </div>				    				
                </div>
            </form>
        </div>
    </div>		
    <div class="row-fluid">
        <div class="span12">
            <a class="btn btn-save">Save &amp; Print</a>
            <a class="btn btn-save">Save Transaction</a>
        </div>
    </div>		    	
</div>