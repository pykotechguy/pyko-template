<script type="text/javascript" charset="utf-8">        
    jQuery(document).ready(function($) {

        var asInitVals = new Array();
        
        
        var employees_list_table = $('#employees-list').dataTable
        ({
          'sDom'            : '<"clear">lfrtip',            
          'aaSorting'      : [[0, "desc"]],
		  "aoColumnDefs": [ {
			"aTargets": [ 0 ],
		
			} ],
          'aLengthMenu'    : [[5, 10, 15, 30, 45, 100], [5, 10, 15, 30, 45, 100]],
          'iDisplayLength' : 5,
          'sPaginationType': 'full_numbers',
          'aoColumns'      : [
                                                    {"sClass": "align-left"},
                                                    {"sClass": "align-left"},
                                                    {"sClass": "align-left"},
                                                    {"sClass": "align-left"},
                                                    {"sClass": "align-left"},
													 {"sClass": "align-left"},
													{"sClass": "align-left"},
													{"sClass": "align-left"},
													{"sClass": "align-left"},
													{"sClass": "align-left"}
                             ],
          'bStateSave'     : true,
          'bProcessing'    : true,
          'bServerSide'    : true,
          'sAjaxSource'    : '<?php echo base_url() ?>events/employee_event/get_employees',
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
        
        $("tfoot#employees-list-filtering input").keyup( function () {
            employees_list_table.fnFilter( this.value, $("tfoot#employees-list-filtering input").index(this) );
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
					    		<a class="btn new-user" href="<?php echo base_url('employees/employee_add'); ?>"><div class="icon-plus"></div>Add Employee</a>
					    	</div>   
					    </div>
                <?php if(isset($this->params['msg'])) : ?>
                  <div class="row-fluid">
                    <div class="span12">
                       <div id="message">
                          <?php echo html_entity_decode($this->params['msg']) ?>
                        </div>
                    </div>
                  </div>
                <?php  endif;    ?>
					    <div class="row-fluid" style="margin-top: 20px;">
					    	<div class="span12">
					    		
								<p id="employee_result"></p>
                                <div class="datatables">
                                    <table border="0" cellpadding="4" cellspacing="0" class="table table-striped table-bordered table-condensed" id="employees-list">
                                    <thead>
                                      <tr class="tr-header">
                                        <th>Employee Name</th>
                                        <th>City</th>
                                        <th>Zip</th>
                                        <th>Country</th>
                                        <th>Phone Number</th>
										<th>Email</th>
										<th>Social Security No.</th>
										<th>Hire Date</th>
										<th>Released Date</th>
										<th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>loading...</td>
                                      </tr>
                                    </tbody>
                                    <tfoot id="employees-list-filtering">
                                        <tr>
                                            <th><input type="text" name="search_name" value="Name" class="search_init" /></th>
                                            <th><input type="text" name="search_city" value="City" class="search_init" /></th>
                                            <th><input type="text" name="search_Zip" value="Zip" class="search_zip" /></th>
                                            <th><input type="text" name="search_country" value="Country" class="search_init" /></th>
                                            <th><input type="text" name="search_phone" value="Phone" class="search_init" /></th>
											<th><input type="text" name="search_email" value="Email" class="search_init" /></th>
											<th><input type="text" name="search_social" value="Social Securityl" class="search_init" /></th>
											<th><input type="text" name="search_hiredate" value="Hire Date" class="search_init" /></th>
											<th><input type="text" name="search_releasedate" value="Released Datee" class="search_init" /></th>
											<th>&nbsp;</th>
                                        </tr>
                                    </tfoot>    
                                    </table>  
								</div>
								<input type="hidden" name="sig" id="sig" value="<?php echo $sig; ?>">                          
								<input type="hidden" name="expires" id="expires" value="<?php echo $expires; ?>">                                
					    	</div>
					    </div>
				    </div>