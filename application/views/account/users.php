<div class="container-fluid content-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h2>User List</h2>					    	
            <a class="btn new-user"><div class="icon-plus"></div>New User</a>
        </div>   
    </div>
    <div class="row-fluid">
        <div class="span12">
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Users Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $users as $item ):?>
                    <tr>
                        <td><?php echo $item->name;?></td>
                        <td><?php echo $item->email;?></td>
                        <td><?php echo $item->mobile;?></td>
                        <td><?php echo ucfirst( strtolower( $item->role ) );?> <div class="del-user icon-remove" alt="<?php echo $item->email;?>"></div></td>
                        <td class="edit"><a class="edit-user" alt="<?php echo $item->email;?>">Edit</a></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Users Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!--
    <div class="row-fluid">
        <div class="span12">
            <div class="pagination">
                <ul>
                    <li class="active">
                      <a href="#">1</a>
                    </li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                </ul>
            </div>
        </div>
    </div>
    -->
    <div id="user_form" style="display:none;">
        <div class="row-fluid">
            <div class="span12">
                <a id="save-user" class="btn btn-save">Save User</a>
            </div>
        </div>
        <div class="row-fluid edit-user">
            <div class="span12">					    		
                <form class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Users Name</label>
                        <div class="controls">
                            <input id="user_name" type="text" class="span3" />
                        </div>				    				
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input id="email" type="text" class="span3" />
                        </div>				    				
                    </div>
                    <div class="control-group">
                        <label class="control-label">Re-enter Email	</label>
                        <div class="controls">
                            <input id="re-email" type="text" class="span3" />
                        </div>				    				
                    </div>
                    <div class="control-group">
                        <label class="control-label">Phone</label>
                        <div class="controls">
                            <input id="phone" type="text" class="span3"/>
                        </div>				    				
                    </div>
                    <div class="control-group">
                        <label class="control-label">Role</label>
                        <div class="controls">						    					
                            <select id="role" class="selectpicker span3">
                                <option value="admin">Admin</option>
                                <option value="accountant">Accountant</option>
                            </select>
                        </div>				    				
                    </div>
                    <div class="control-group" id="password_control">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input id="password" type="password" class="span3" />
                        </div>	
                    </div>
                    <input type="hidden" id="reference" />
                </form>
            </div>
        </div>
    </div>
</div>
