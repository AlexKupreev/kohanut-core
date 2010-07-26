<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Handles long strings with Wysiwyg editor attached
 *
 * @package  Jelly
 */
abstract class Jelly_Field_Wysiwyg extends Jelly_Field_Text
{
	/**
     * Displays the Wysiwyg field
     *
     * @param string $prefix The prefix to put before the filename to be rendered
     * @return View
     **/
    public function input($prefix = 'jelly/field', $data = array())
    {
        // should WYSIWYG be on
        $wys_on = isset($data['wysiwyg_on']) ? (bool) $data['wysiwyg_on'] : FALSE;
        
        if ($wys_on)
        {
            static $is_wysiwyg_plugged = FALSE;
            
            // Get the view name
            $view = $this->_input_view($prefix);

            // Grant acces to all of the vars plus the field object
            $data = array_merge(get_object_vars($this), $data, array('field' => $this));

            // Make sure there is an 'attrs' array set to prevent error in view
            $data['attributes'] = Arr::get($data, 'attributes', array());
            
            $data['is_wysiwyg_plugged'] = $is_wysiwyg_plugged;
            
            $res = View::factory($view, $data);
            
            $is_wysiwyg_plugged = TRUE;

            // By default, a view object only needs a few defaults to display it properly
            return $res;
        }
        else 
        {
            return parent::input($prefix, $data);
        }
    }
}
