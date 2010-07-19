<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
	// Default kohanut ADMIN language
	'lang'		=> 'en-us',
	
	
	// Cache things like the navs and markdown elements, twig elements are cached by twig itself.
	'cache'     => true,
	// How long to cache things, in seconds. 60 = 1 minute, 300 = 5 minutes, 3600 = 1 hour
	'cachelength' => 60,
    
    // settings for admin panel
    'backend' => array(
        // navigation tabs to show 
        // define them in 'controller => name' format
        'navigation' => array(
            'pages' => 'Pages',
            'snippets' => 'Snippets',
            'layouts' => 'Layouts',
            'users' => 'Users',
            'redirects' => 'Redirects',
            ),
        ),
);

