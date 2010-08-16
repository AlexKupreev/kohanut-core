<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title><?php echo (isset($title) ? __("Admin") . " - " . $title : __("Admin")); ?></title>
    
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
</head>
<body>

	<div id="head">
		<?php echo html::image(Route::get('kohanut-media')->uri(array('file'=>'img/logo.png')),array('alt'=>'Kohanut Logo','class'=>'logo')); ?>
		<h1>Kohanut</h1>
		
		<p class="info">
			<?php echo __('Logged in as :user',array(':user'=> $user)); ?> |
			<?php echo html::anchor( Route::get('kohanut-login')->uri(array('action'=>'lang')), Arr::get(Kohana::message('kohanut', 'translations'),Cookie::get('kohanut_language', Kohana::config('kohanut')->lang),'Language?') ) ?> |
			<?php echo html::anchor('/',__('Visit Site')); ?> |
			<?php echo html::anchor( Route::get('kohanut-login')->uri(array('action'=>'logout')) , __('Logout') ) ?>
		</p>
	</div>
	
<?php
$back_nav = Kohana::config('kohanut.backend.navigation');

if ($back_nav AND is_array($back_nav) AND ! empty($back_nav))
{
?>
	<ul id="navigation">
<?php
    foreach ($back_nav as $controller => $name)
    {
?>
		<li><?php echo html::anchor( Route::get('kohanut-admin')->uri(array('controller' => $controller)) , __($name) ) ?></li>
<?php
    }
?>
	</ul>
<?php
}
?>

	<div id="content" class="container_16 clearfix">
		<?php echo $body ?>
	</div>
	
</body>
</html>
