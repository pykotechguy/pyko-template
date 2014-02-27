<script type="text/javascript" charset="utf-8">        
    jQuery(document).ready(function($) {

        var asInitVals = new Array();
        
        
        var paid_invoices_list_table = $('#paid-invoices-list').dataTable
        ({
          'sDom'            : '<"clear">rt',            
          'aaSorting'      : [[0, "desc"]],
          'aLengthMenu'    : [[5, 10, 15, 30, 45, 100], [5, 10, 15, 30, 45, 100]],
          'iDisplayLength' : 5,
          'sPaginationType': 'full_numbers',
          'aoColumns'      : [
                                                    {"sClass": "align-left", "mDataProp": "invoice_no"},
                                                    {"sClass": "align-left", "mDataProp": "name"},
                                                    {"sClass": "align-left", "mDataProp": "total"},
                                                    {"sClass": "align-left", "mDataProp": "total_payment"},
                                                    {"bVisible": false, "mDataProp": "deduction"},
                                                    {"sClass": "align-left", "mDataProp": "balance"},
                                                    {"sClass": "align-center", "mDataProp": "invoice_date"},
                                                    {"bSortable" : false, "sClass": "align-center", "mDataProp": "action"}
                             ],
          'bStateSave'     : true,
          'bProcessing'    : true,
          'bServerSide'    : true,
          'sAjaxSource'    : '<?php echo base_url() ?>events/invoice_event/get_invoices_list',
          'fnServerData'   : function ( sSource, aoData, fnCallback ) {
                                aoData.push( {"name": "sig", "value": '<?php echo $sig; ?>'}, {"name": "expires", "value": '<?php echo $expires; ?>'}, {"name": "status", "value": 'paid'});
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
        
        var unpaid_invoices_list_table = $('#unpaid-invoices-list').dataTable
        ({
          'sDom'            : '<"clear">rt',            
          'aaSorting'      : [[0, "desc"]],
          'aLengthMenu'    : [[5, 10, 15, 30, 45, 100], [5, 10, 15, 30, 45, 100]],
          'iDisplayLength' : 5,
          'sPaginationType': 'full_numbers',
          'aoColumns'      : [
                                                    {"sClass": "align-left", "mDataProp": "invoice_no"},
                                                    {"sClass": "align-left", "mDataProp": "name"},
                                                    {"sClass": "align-left", "mDataProp": "total"},
                                                    {"sClass": "align-left", "mDataProp": "total_payment"},
                                                    {"bVisible": false, "mDataProp": "deduction"},
                                                    {"sClass": "align-left", "mDataProp": "balance"},
                                                    {"sClass": "align-left", "mDataProp": "days_due"},
                                                    {"sClass": "align-center", "mDataProp": "invoice_date"},
                                                    {"bSortable" : false, "sClass": "align-center", "mDataProp": "action"}
                             ],
          'bStateSave'     : true,
          'bProcessing'    : true,
          'bServerSide'    : true,
          'sAjaxSource'    : '<?php echo base_url() ?>events/invoice_event/get_invoices_list',
          'fnServerData'   : function ( sSource, aoData, fnCallback ) {
                                aoData.push( {"name": "sig", "value": '<?php echo $sig; ?>'}, {"name": "expires", "value": '<?php echo $expires; ?>'}, {"name": "status", "value": 'unpaid'});
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
        
        /* TODO
        $("tfoot#invoices-list-filtering input").keyup( function () {
            invoices_list_table.fnFilter( this.value, $("tfoot#invoices-list-filtering input").index(this) );
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
        }); */

    });
</script>                 
                    <div class="container-fluid content-fluid">
				    	<div class="row-fluid">
					    	<div class="span12">
					    		<h2><?php echo $section; ?></h2>					    	
					    	</div>   
					    </div>
					    <div class="row-fluid" style="margin-top: 20px;">
					    	<div class="span12">
<ul id="sub-section-tab" class="nav nav-tabs">
  <li class="active"><a href="#paid-invoices" data-toggle="tab">Paid Invoices</a></li>
  <li><a href="#unpaid-invoices" data-toggle="tab">Unpaid Invoices</a></li>
</ul>                                
                                <div class="datatables tab-content">
                                    <div class="tab-pane active" id="paid-invoices">
                                        <table border="0" cellpadding="4" cellspacing="0" class="table table-striped table-bordered table-condensed" id="paid-invoices-list">
                                        <thead>
                                          <tr class="tr-header">
                                            <th width="10%">Invoice No.</th>
                                            <th width="15%">Customer Name</th>  
                                            <th width="10%">Total</th>
                                            <th width="10%">Total Payment</th>
                                            <th width="10%">Deduction</th>
                                            <th width="10%">Balance</th>
                                            <th width="10%">Date</th>
                                            <th width="10%">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>loading...</td>
                                          </tr>
                                        </tbody>
                                        <!--
                                        <tfoot id="invoices-list-filtering">
                                            <tr>
                                                <th><input type="text" name="search_invoice_no" value="Invoice No" class="search_init" /></th>
                                                <th><input type="text" name="search_customer_name" value="Customer Name" class="search_init" /></th>
                                                <th><input type="text" name="search_total" value="Total" class="search_init" /></th>
                                                <th><input type="text" name="search_total_payment" value="Total Payment" class="search_init" /></th>
                                                <th><input type="text" name="search_deduction" value="Deduction" class="search_init" /></th>
                                                <th><input type="text" name="search_balance" value="Balance" class="search_init" /></th>
                                                <th><input type="text" name="search_date" value="Date" class="search_init" /></th>
                                                <th>&nbsp;</th>
                                                <th><input type="text" name="search_days_due" value="Days Due" class="search_init" /></th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </tfoot>-->    
                                        </table>
                                    </div>
                                    
                                    <div class="tab-pane" id="unpaid-invoices">
                                        <table border="0" cellpadding="4" cellspacing="0" class="table table-striped table-bordered table-condensed" id="unpaid-invoices-list">
                                        <thead>
                                          <tr class="tr-header">
                                            <th width="10%">Invoice No.</th>
                                            <th width="15%">Customer Name</th>  
                                            <th width="10%">Total</th>
                                            <th width="10%">Total Payment</th>
                                            <th width="10%">Deduction</th>
                                            <th width="10%">Balance</th>
                                            <th width="10%">Days Due</th>
                                            <th width="10%">Date</th>
                                            <th width="10%">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>loading...</td>
                                          </tr>
                                        </tbody>
                                        <!--
                                        <tfoot id="invoices-list-filtering">
                                            <tr>
                                                <th><input type="text" name="search_invoice_no" value="Invoice No" class="search_init" /></th>
                                                <th><input type="text" name="search_customer_name" value="Customer Name" class="search_init" /></th>
                                                <th><input type="text" name="search_total" value="Total" class="search_init" /></th>
                                                <th><input type="text" name="search_total_payment" value="Total Payment" class="search_init" /></th>
                                                <th><input type="text" name="search_deduction" value="Deduction" class="search_init" /></th>
                                                <th><input type="text" name="search_balance" value="Balance" class="search_init" /></th>
                                                <th><input type="text" name="search_date" value="Date" class="search_init" /></th>
                                                <th>&nbsp;</th>
                                                <th><input type="text" name="search_days_due" value="Days Due" class="search_init" /></th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </tfoot>-->    
                                        </table>
                                    </div>    
                                </div>                                
					    	</div>
					    </div>
				    </div>
