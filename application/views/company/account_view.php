<script type="text/javascript" charset="utf-8">        
    jQuery(document).ready(function($) {

        var asInitVals = new Array();
        
        
        var account_transactions_list_table = $('#account-transactions-list').dataTable
        ({
          'sDom'            : '<"clear">rt',            
          'aaSorting'      : [[0, "desc"]],
          'aLengthMenu'    : [[5, 10, 15, 30, 45, 100], [5, 10, 15, 30, 45, 100]],
          'iDisplayLength' : 5,
          'sPaginationType': 'full_numbers',
          'aoColumns'      : [
                                                    {"sClass": "align-left"},
                                                    {"sClass": "align-left"},
                                                    {"sClass": "align-left"}
                             ],
          'bStateSave'     : true,
          'bProcessing'    : true,
          'bServerSide'    : true,
          'sAjaxSource'    : '<?php echo base_url() ?>events/company_event/get_account_transactions_list',
          'fnServerData'   : function ( sSource, aoData, fnCallback ) {
                                aoData.push( {"name": "sig", "value": '<?php echo $sig; ?>'}, {"name": "expires", "value": '<?php echo $expires; ?>'}, {"name": "accid", "value": '<?php echo $account->id; ?>'});
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
        
        $("tfoot#account-transactions-list-filtering input").keyup( function () {
            account_transactions_list_table.fnFilter( this.value, $("tfoot#account-transactions-list-filtering input").index(this) );
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
					    		<h2><?php echo $account->name.': '.$section; ?></h2>					    	
					    	</div>   
					    </div>                        
					    <div class="row-fluid" style="margin-top: 20px;">
					    	<div class="span12">
                                <div class="datatables">
                                    <table border="0" cellpadding="4" cellspacing="0" class="table table-striped table-bordered table-condensed" id="account-transactions-list">
                                    <thead>
                                      <tr class="tr-header">
                                        <th width="25%">Date</th>
                                        <th width="15%">Transaction Type</th>  
                                        <th width="15%">Amount</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>loading...</td>
                                      </tr>
                                    </tbody>   
                                    </table>  
                                </div>                                
					    	</div>
					    </div>
				    </div>