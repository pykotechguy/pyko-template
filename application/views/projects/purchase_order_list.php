<script type="text/javascript" charset="utf-8">        
    jQuery(document).ready(function($) {

        var asInitVals = new Array();
        
        
        var purchaseorder_list_table = $('#po-list').dataTable
        ({
          'sDom'            : '<"clear">lfrtip',            
          'aaSorting'      : [[0, "desc"]],
          'aLengthMenu'    : [[5, 10, 15, 30, 45, 100], [5, 10, 15, 30, 45, 100]],
          'iDisplayLength' : 5,
          'sPaginationType': 'full_numbers',
          'aoColumns'      : [
                                                    {"sClass": "align-left"},
                                                    {"sClass": "align-left"},
                                                    {"sClass": "align-left"},
                                                    {"sClass": "align-left"},
													{"bSortable" : false, "sClass": "align-center"}
													
                             ],
          'bStateSave'     : true,
          'bProcessing'    : true,
          'bServerSide'    : true,
          'sAjaxSource'    : '<?php echo base_url() ?>events/vendor_event/get_purchase_orders',
          'fnServerData'   : function ( sSource, aoData, fnCallback ) {
                                aoData.push( {"name": "sig", "value": '<?php echo $sig; ?>'}, {"name": "expires", "value": '<?php echo $expires; ?>'});
                                $.ajax({
                                    "dataType": 'json',
                                    "type": "GET",
                                    "url": sSource,
                                    "data": aoData,
                                    "success": fnCallback,
                                    "error": function() {
                                        
                                    }
                                });
                             }
        });
        
        $("tfoot#po-list-filtering input").keyup( function () {
            clients_list_table.fnFilter( this.value, $("tfoot#clients-list-filtering input").index(this) );
        });        
        
        
        $("tfoot input").each( function (i) {
            asInitVals[i] = this.value;
        });

        $("tfoot input").focus( function () {
            if (this.className == "search_init")
            {
                this.className = "";
                this.value = "";
            }
        });

        $("tfoot input").blur( function (i) {
            if (this.value == "")
            {
                this.className = "search_init";
                this.value = asInitVals[$("tfoot input").index(this)];
            }
        });

    });
</script>                 

                    <div class="container-fluid content-fluid">
				    	<div class="row-fluid">
					    	<div class="span12">
					    		<h2><?php echo $section; ?></h2>					    	
					    		<a class="btn new-user"><div class="icon-plus"></div>New Purchase Order</a>
					    	</div>   
					    </div>
					    <div class="row-fluid" style="margin-top: 20px;">
					    	<div class="span12">
					    	
                                <div class="datatables">
                                    <table border="0" cellpadding="4" cellspacing="0" class="table table-striped table-bordered table-condensed" id="po-list">
                                    <thead>
                                      <tr class="tr-header">
                                        <th width="25%">Vendor Name</th>
                                        <th width="20%">Total</th>  
                                        <th width="20%">Date</th>
                                        <th width="20%">Status</th>
										<th width="15%">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>loading...</td>
                                      </tr>
                                    </tbody>
                                    <tfoot id="po-list-filtering">
                                        <tr>
                                            <th><input type="text" name="search_estimateno" value="Estimate No" class="search_init" /></th>
                                            <th><input type="text" name="search_total" value="Total" class="search_init" /></th>
											<th><input type="text" name="search_date" value="Date" class="search_init" /></th>
                                            <th><input type="text" name="search_status" value="Status" class="search_init" /></th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </tfoot>    
                                    </table>  
                                </div>                                
					    	</div>
					    </div>
				    </div>