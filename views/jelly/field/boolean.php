<?php
echo Form::hidden(
    $name,
    0
    );
     
echo Form::checkbox(
    $name, 
    1, 
    $value ? TRUE : FALSE, 
    $attributes + array('id' => 'field-'.$name)
    ); ?>