<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Kohanut Request Element. Executes a Kohana HMVC request and returns the result.
 * Modified for Jelly modelling system
 *
 * @package    Kohanut
 * @author     Michael Peters
 * @author     Alexander Kupreyeu (Kupreev)
 * @copyright  (c) Michael Peters
 * @license    http://kohanut.com/license
 */
class Kohanut_Element_Request extends Kohanut_Element
{
	protected $_table = 'kohanut_element_request';

	public static function initialize(Jelly_Meta $meta)
	{
		$meta->fields(array(
			'id' => new Field_Primary,
			
			'url' => new Field_String,
		));
	}
	
	public function title()
	{
		return "Kohana Request";
	}
	
	protected function _render()
	{
		// Don't allow recursion :)
		if ($this->url == "kohanut/view" OR $this->url == "/kohanut/view")
			return "Recursion is bad!";
		
		$out = "";
		try
		{
			$out = Request::factory($this->url)->execute()->response;
		}
		catch (ReflectionException $e)
		{
			$out = "Request failed. Error: " . $e->getMessage();
		}
		return $out;
	}
}