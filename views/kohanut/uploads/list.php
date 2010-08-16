<script type="text/javascript" charset="utf-8">
$().ready(function() {
    var f = $('#finder').elfinder({
        url : '<?php echo url::site('admin/uploads/connector'); ?>',
        lang : 'en',
        places : '',
    })
})
 </script>
<div class="grid_12">
	
	<div class="box">
		<h1><?php echo __('Uploads') ?></h1>
		
        <div id="finder">finder</div>
		<div class="clear"></div>
		
	</div>
	
</div>

<div class="grid_4">
	<div class="box">
		<h1><?php echo __('Help') ?></h1>
		<p>Help goes here</p>
	</div>
</div>