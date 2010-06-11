<div class="grid_16">
	<div class="box">
		<h1><?php echo __('Adding :element',array(':element'=>__(ucfirst($element->type())))) ?></h1>
		
		<?php include Kohana::find_file('views', 'kohanut/errors') ?>
		
		<form method="post">
		
			<?php foreach ($element->meta()->fields() as $field)
            { 
                if ( ! $field->primary AND $field->in_db)
                {
                ?>
			<p>
				<label><?php  echo __($field->label) ?></label>
				<?php echo $element->input($field->name) ?>
			</p>
			<?php
                } 
            } ?>
			
			<p>
				<?php echo Form::submit('submit',__('Add Element'),array('class'=>'submit')) ?>
				<?php echo html::anchor(Route::get('kohanut-admin')->uri(array('controller'=>'pages','action'=>'edit','params'=>$page)),__('cancel')); ?>
			</p>
			
		</form>
		
		</div>
	</div>

</div>