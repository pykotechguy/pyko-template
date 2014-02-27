				</div>
			</div>
		</div>

    
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-select.js"></script>
    <script src="assets/js/scripts.js"></script>
    <?php if(isset($js)): ?>
    <?php foreach($js as $js_url): ?>
        <script src="<?php echo $js_url; ?>"></script>
    <?php endforeach; ?>
    <?php endif; ?>

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    
    <?php if( ! empty($plugin)): ?>
        <?php if($plugin == 'datatables'): ?>
            <script src="assets/js/plugins/datatables/jq.datatables.min.js"></script>
            <script type="text/javascript" language="javascript" src="assets/js/plugins/datatables/jq.datatables.colvis-1.0.7/jq.datatables.colvis.min.js"></script>    
        <?php endif; ?>
    <?php endif; ?>    
    
  </body>
</html>