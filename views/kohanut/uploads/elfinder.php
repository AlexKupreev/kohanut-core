<?php defined('SYSPATH') or die('No direct script access.');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Uploads</title>
 
    <?php
    if (isset($styles) AND ! empty($styles) AND is_array($styles))
    {        
        foreach ($styles as $uri => $attrs)
        {
            echo html::style($uri, $attrs) . "\n";
        }
    }

    if (isset($scripts) AND ! empty($scripts) AND is_array($scripts))
    {
        foreach ($scripts as $uri => $attrs)
        {
            echo html::script($uri, $attrs) . "\n";
        }
    }
    ?>
 
    <script type="text/javascript" charset="utf-8">
        $().ready(function() {
 
            var f = $('#finder').elfinder({
                url : '<? echo url::site('admin/uploads/connector'); ?>',
                lang : 'en',
                places : '',
 
                editorCallback : function(url) {
                    window.tinymceFileWin.document.forms[0].elements[window.tinymceFileField].value = url;
                    window.tinymceFileWin.focus();
                    window.close();
 
                },
                closeOnEditorCallback : true
            })
            
        })
    </script>
 
</head>
<body>
    <div id="finder">finder</div>
</body>
</html>