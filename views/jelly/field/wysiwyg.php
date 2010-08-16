<?php defined('SYSPATH') or die('No direct script access.');  

if (isset($is_wysiwyg_plugged))
{
    if ( ! $is_wysiwyg_plugged)
    {
        echo html::script(Route::get('kohanut-media')->uri(array('file'=>'jquery/tiny_mce/tiny_mce.js')) ). "\n";
    }    
}

echo Form::textarea($name, $value, $attributes + array(
	'id' => 'field-'.$name,
	'rows' => 8,
	'cols' => 40,
)); 

if (isset($is_wysiwyg_plugged))
{
?>
<script>
    tinyMCE.init({
        // General options
        mode : "exact",
        elements : "<?php echo $name;?>",
        theme : "advanced",
        height: 400,
        width: '90%',
        plugins : "safari,pagebreak,style,layer,table,save,advhr,advlink,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
        convert_urls : false,
 
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect",
        theme_advanced_buttons2 : "bullist,numlist,|,undo,redo,|,link,unlink,media,cleanup,code,|,hr,removeformat,table,image",
        theme_advanced_buttons3 : "",
 
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,
        theme_advanced_buttons3_add : "template",
        
        file_browser_callback : function(field_name, url, type, win) {
            var w = window.open('<?php echo url::site('admin/uploads/elfinder')?>', null, 'width=600,height=500');
            w.tinymceFileField = field_name;
            w.tinymceFileWin = win;
        }
    });
</script>
<?php
}
