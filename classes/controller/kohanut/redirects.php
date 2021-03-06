<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Redirects Controller
 * Modified for Jelly modelling system
 *
 * @package    Kohanut
 * @author     Michael Peters
 * @author     Alexander Kupreyeu (Kupreev)
 * @copyright  (c) Michael Peters
 * @license    http://kohanut.com/license
 */
class Controller_Kohanut_Redirects extends Controller_Kohanut_Admin {

	public function action_index()
	{
		$redirects = Jelly::select('kohanut_redirect')
            ->execute();
		
		$this->view->title = "Redirects";
		$this->view->body = View::factory('/kohanut/redirects/list',array('redirects'=>$redirects));
	}
	
	public function action_new()
	{
		
		$redirect = Jelly::factory('kohanut_redirect');
		
		$errors = false;
		
		if ($_POST)
		{
			try
			{
				$redirect->set($_POST);
				$redirect->save();
				
				$this->request->redirect(Route::get('kohanut-admin')->uri(array('controller'=>'redirects')));
			}
			catch (Validate_Exception $e)
			{
				$errors = $e->array->errors('redirect');
			}
		}
		
		$this->view->title = "New Redirect";
		$this->view->body = View::factory('/kohanut/redirects/new');
		$this->view->body->redirect = $redirect;
		$this->view->body->errors = $errors;
	}
	
	public function action_edit($id)
	{
		// Sanitize
		$id = (int) $id;
		
		// Find the redirect
		$redirect = Jelly::select('kohanut_redirect')->load($id);
		
		if ( ! $redirect->loaded())
		{
			return $this->admin_error("Could not find redirect with id <strong>$id</strong>.");
		}
		
		$errors = false;
		$success = false;
		
		if ($_POST)
		{
			try
			{
				$redirect->set($_POST);
				$redirect->save();
				$success = "Updated Successfully";
			}
			catch (Validate_Exception $e)
			{
				$errors = $e->array->errors('redirect');
			}
		}
		
		$this->view->title = "Editing Redirect";
		$this->view->body = new View('kohanut/redirects/edit');
	
		$this->view->body->redirect = $redirect;
		$this->view->body->errors = $errors;
		$this->view->body->success = $success;
	}
	
	public function action_delete($id)
	{
		
		// Sanitize
		$id = (int) $id;
		
		// Find the redirect
		$redirect = Jelly::select('kohanut_redirect')->load(1);
		
		if ( ! $redirect->loaded())
		{
			return $this->admin_error("Could not find redirect with id <strong>$id</strong>.");
		}
		
		$errors = false;

		if ($_POST)
		{
			try
			{
				$redirect->delete();
				$this->request->redirect(Route::get('kohanut-admin')->uri(array('controller'=>'redirects')));
			}
			catch (Validate_Exception $e)
			{
				$errors = array('submit'=>"Delete failed!");
			}
			
		}

		$this->view->title = "Delete Redirect";
		$this->view->body = View::factory('/kohanut/redirects/delete',array('redirect'=>$redirect));
		
		$this->view->body->redirect = $redirect;
		$this->view->body->errors = $errors;
		
	}
}