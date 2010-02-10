<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Kohanut Layout Model
 *
 * @package    Kohanut
 * @author     Michael Peters
 * @copyright  (c) Michael Peters
 * @license    http://kohanut.com/license
 */
class Model_Kohanut_Layout extends Sprig {

	protected function _init()
	{
		$this->_fields += array(
			'id' => new Sprig_Field_Auto,
			
			'name' => new Sprig_Field_Char(array('label'=>'Name')),
			'desc' => new Sprig_Field_Char(array('label'=>'Description')),
			'code' => new Sprig_Field_Text(array('label'=>'Code')),
			
			'pages' => new Sprig_Field_HasMany(array(
				'model' => 'page',
			)),
			
		);
	}
	
	public function create()
	{
		// Make sure there are no twig syntax errors
		try
		{
			$test = Kohanut_Twig::render($_POST['code']);
		}
		catch (Twig_SyntaxError $e)
		{
			$e->setFilename('code');
			throw new Kohanut_Exception("There was a Twig Syntax error: " . $e->getMessage());
		}
		catch (Exception $e)
		{
			throw new Kohanut_Exception("There was an error: " . $e->getMessage() . " on line " . $e->getLine());
		}
		parent::create();
	}
	
	public function update()
	{
		// Make sure there are no twig syntax errors
		try
		{
			$test = Kohanut_Twig::render($_POST['code']);
		}
		catch (Twig_SyntaxError $e)
		{
			$e->setFilename('code');
			throw new Kohanut_Exception("There was a Twig Syntax error: " . $e->getMessage());
		}
		catch (Exception $e)
		{
			throw new Kohanut_Exception("There was an error: " . $e->getMessage() . " on line " . $e->getLine());
		}
		parent::update();
	}
	
	public function render()
	{
		// Ensure the layout is loaded
		if ( ! $this->loaded())
		{
			return "Layout Failed to render because it wasn't loaded.";
		}
		
		return Kohanut_Twig::render($this->code);
	}

}