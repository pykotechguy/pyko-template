<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <base href="<?php echo BASE_URL; ?>">
    <title><?php echo SYSTEM_NAME . ' :: ' .$section; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

        
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600' rel='stylesheet' type='text/css'>    
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap-responsive.css">    
    <link rel="stylesheet" href="assets/css/main.css">

    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/apple-touch-icon-114x114.png">
    
    <script src="assets/js/jquery-1.9.1.min.js"></script>
    <script src="assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>    
    
    <?php if( ! empty($plugin)): ?>
        <?php if($plugin == 'datatables'): ?>
            <link rel="stylesheet" type="text/css" href="assets/css/plugins/datatables/jq.datatables.css" />
            <link rel="stylesheet" type="text/css" href="assets/css/plugins/datatables/jq.datatables.colvis.css" />
        <?php endif; ?>
    <?php endif; ?>
    
    
    <script>
        var _config = new Object();
        _config.base_url = "<?php echo BASE_URL;?>";
        
        var _validation = new Object();
        _validation.regexp_email = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
        _validation.regexp_whitespace = /^\s*$/g;
        _validation.regexp_name = /[!$%&*()+|={}\[\]:";<>?\/]/g; //,.~`_-^' are allowed aside from letters and numbers
        _validation.regexp_other = /[!$%*+|={}\[\]";<>?]/g; //,.~`_-^&()/:' are allowed aside from letters and numbers
        _validation.message = 'Please review error detail(s) below.';
    </script>
  </head>

  <body data-spy="scroll" data-target=".subnav" data-offset="50">
		<div class="container-fluid">
			<div class="row-fluid main-row">
				<div class="span3 panel left-panel">	
					<div class="logo">
						<a href="<?php echo BASE_URL; ?>" ><img src="assets/img/logo.png" /></a>
					</div>
					<div class="sidebar-menu">
						<div class="menu-title">
							<h2><div class="icon title-<?php echo strtolower($section); ?>"></div><?php echo $section; ?></h2>
						</div>
						<nav class="page-nav">
							<ul>
                            	<?php if( isset( $side_menus ) ):?>
								<?php foreach($side_menus as $url => $name): ?>
                                    <?php $new_item_mark = (strpos(NEW_ITEMS, $name)) ? ' <span>New!</span>' : ''; ?>
									<?php if($url == $page):?>
                                    <li class="active"><a href="<?php echo $url; ?>"><?php echo "$name $new_item_mark"; ?></a></li>
                                    <?php else: ?>
                                    <li><a href="<?php echo $url;?>"><?php echo "$name $new_item_mark"; ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php endif;?>
							</ul>
						</nav>
					</div>
				</div>  
                <div class="span9 panel right-panel">
                    <div class="navbar">
                      <div class="navbar-inner">
                        <div class="container-fluid">
                          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </a>				          
                          <div class="nav-collapse">
                            <ul class="nav">
                              <?php if($logged_user): ?>
                              <li>
                                <a href="dashboard" class="dashboard">Dashboard</a>
                              </li>
                              <li>
                                <a href="invoices" class="invoice">Invoices</a>
                              </li>
                              <li>
                                <a href="#" class="reports">Reports</a>
                              </li>
                              <li>
                                <a href="customers" class="customers">Customers</a>
                              </li>
                              <li>
                                <a href="company" class="company-top">Company</a>
                              </li>
                              <li>
                                <a href="vendors" class="vendor">Vendors</a>
                              </li>
                              <li>
                                <a href="#" class="banking">Banking</a>
                              </li>
                              <li>
                                <a href="employees" class="employee">Employee</a>
                              </li>
                              <li>
                                <a href="settings" class="settings">My Settings</a>
                              </li>
                              <li class="logout">
                                <a href="logout">Log Out <div class="icon-off"></div></a>
                              </li>
                              <?php else:?>
                              <li>
                                <a href="#">Home</a>
                              </li>
                              <li>
                                <a href="#">Tutorials</a>
                              </li>
                              <li>
                                <a href="#">Accounting Basics</a>
                              </li>
                              <li>
                                <a href="#">Help</a>
                              </li>
                              <li>
                                <a href="#">Articles</a>
                              </li>                    
                              <li>
                                <a href="#">Support</a>
                              </li>   
                              <li>
                                <a href="#">Blog</a>
                              </li>     
                              <li>
                                <a href="#">Contact Us</a>
                              </li>                                                
                              <li>
                                <a href="#">What's New</a>
                              </li>                                                            
                              <?php endif;?>
                            </ul>
                          </div><!--/.nav-collapse -->				          
                        </div>
                      </div>
                    </div>				