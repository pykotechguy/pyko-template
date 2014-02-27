<script type="text/javascript" charset="utf-8">        
    jQuery(document).ready(function($) {

        var asInitVals = new Array();
        
        
        var default_accounts_list_table = $('#default-accounts-list').dataTable
        ({
          'sDom'            : '<"clear">lfrtip',            
          'aaSorting'      : [[0, "asc"]],
          'aLengthMenu'    : [[10, 15, 30, 45, 100], [10, 15, 30, 45, 100]],
          'iDisplayLength' : 10,
          'sPaginationType': 'full_numbers',
          'aoColumns'      : [
                                                    {"sClass": "align-left"},
                                                    {"sClass": "align-left"},
                                                    {"bSortable" : false, "sClass": "align-center"}
        
                             ],
          'bStateSave'     : true,
          'bProcessing'    : true,
          'bServerSide'    : true,
          'sAjaxSource'    : '<?php echo base_url() ?>events/company_event/get_chart_of_accounts_list',
          'fnServerData'   : function ( sSource, aoData, fnCallback ) {
                                aoData.push( {"name": "sig", "value": '<?php echo $sig; ?>'}, {"name": "expires", "value": '<?php echo $expires; ?>'}, {"name": "account_list_type", "value": 'default'});
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
        
        var user_created_accounts_list_table = $('#user-created-accounts-list').dataTable
        ({
          'sDom'            : '<"clear">lfrtip',            
          'aaSorting'      : [[0, "asc"]],
          'aLengthMenu'    : [[10, 15, 30, 45, 100], [10, 15, 30, 45, 100]],
          'iDisplayLength' : 10,
          'sPaginationType': 'full_numbers',
          'aoColumns'      : [
                                                    {"sClass": "align-left"},
                                                    {"sClass": "align-left"},
                                                    {"bSortable" : false, "sClass": "align-center"}
                             ],
          'bStateSave'     : true,
          'bProcessing'    : true,
          'bServerSide'    : true,
          'sAjaxSource'    : '<?php echo base_url() ?>events/company_event/get_chart_of_accounts_list',
          'fnServerData'   : function ( sSource, aoData, fnCallback ) {
                                aoData.push( {"name": "sig", "value": '<?php echo $sig; ?>'}, {"name": "expires", "value": '<?php echo $expires; ?>'}, {"name": "account_list_type", "value": 'user-created'});
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
        
        /* TODO */
        $("tfoot#default-accounts-list-filtering input").keyup( function () {
            default_accounts_list_table.fnFilter( this.value, $("tfoot#default-accounts-list-filtering input").index(this) );
        });
        
        $("tfoot#user-created-accounts-list-filtering input").keyup( function () {
            user_created_accounts_list_table.fnFilter( this.value, $("tfoot#user-created-accounts-list-filtering input").index(this) );
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
        }); /* */

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
                              <li class="active"><a href="#default-accounts" data-toggle="tab">Default Accounts</a></li>
                              <li><a href="#user-created-accounts" data-toggle="tab">User Created Accounts</a></li>
                            </ul>                                
                                <div class="datatables tab-content">
                                    <div class="tab-pane active" id="default-accounts">
                                        <table border="0" cellpadding="4" cellspacing="0" class="table table-striped table-bordered table-condensed" id="default-accounts-list">
                                        <thead>
                                          <tr class="tr-header">
                                            <th width="40%">Account Name</th>
                                            <th width="40%">Account Type</th>
                                            <th width="20%">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>loading...</td>
                                          </tr>
                                        </tbody>
                                        <tfoot id="default-accounts-list-filtering">
                                            <tr>
                                                <th><input type="text" name="search_account_name" value="Account Name" class="search_init" /></th>
                                                <th><input type="text" name="search_account_type" value="Account Type" class="search_init" /></th>
                                            </tr>
                                        </tfoot>    
                                        </table>
                                    </div>
                                    
                                    <div class="tab-pane" id="user-created-accounts">
                                        <table border="0" cellpadding="4" cellspacing="0" class="table table-striped table-bordered table-condensed" id="user-created-accounts-list">
                                        <thead>
                                          <tr class="tr-header">
                                            <th width="40%">Account Name</th>
                                            <th width="40%">Account Type</th>  
                                            <th width="20%">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>loading...</td>
                                          </tr>
                                        </tbody>
                                        <tfoot id="user-created-accounts-list-filtering">
                                            <tr>
                                                <th><input type="text" name="search_account_name" value="Account Name" class="search_init" /></th>
                                                <th><input type="text" name="search_account_type" value="Account Type" class="search_init" /></th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </tfoot>    
                                        </table>
                                    </div>    
                                </div>                                
					    	</div>
					    </div>
				    </div>