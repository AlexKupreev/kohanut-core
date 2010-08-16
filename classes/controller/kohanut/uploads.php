<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Uploads Controller (for Jelly modelling system)
 *
 * @package    Kohanut
 * @author     Alexander Kupreyeu (Kupreev)
 * @copyright  (c) Alexander Kupreyeu
 * @license    http://kohanut.com/license
 */
class Controller_Kohanut_Uploads extends Controller_Kohanut_Admin {

    public function before()
    {
        parent::before();
        
        $this->styles = array_merge($this->styles, array(
            Route::get('kohanut-media')->uri(array('file'=>'elfinder/css/elfinder.css'))        => array('media'=>'screen','charset'=>'utf-8') ,
            Route::get('kohanut-media')->uri(array('file'=>'jquery/ui-themes/base/ui.all.css')) => array('media'=>'screen','charset'=>'utf-8'),
            ));
        
        $this->scripts = array_merge($this->scripts, array(
            Route::get('kohanut-media')->uri(array('file'=>'jquery/jquery-1.4.2.min.js'))           => NULL,
            Route::get('kohanut-media')->uri(array('file'=>'jquery/jquery-ui-1.8.2.custom.min.js')) => NULL,
            Route::get('kohanut-media')->uri(array('file'=>'elfinder/js/elfinder.min.js'))          => NULL,
            )); 
               
    }
   
    public function action_index()
	{
		//require_once Kohana::find_file('vendor', 'elfinder/connector');
		
		$this->view->title = "Uploads";
		$this->view->body = View::factory('kohanut/uploads/list');
	}
	
    
    public function action_elfinder()
    {
        $this->view = View::factory('kohanut/uploads/elfinder');
        $this->view->set('styles', $this->styles);
        $this->view->set('scripts', $this->scripts);
                
    }
 
    public function action_connector()
    {
        require_once Kohana::find_file('vendor', 'elfinder/connector');
    }
}