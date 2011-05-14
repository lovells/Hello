<?php 
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

class GithubViewTickets extends JView
{
	function display($tpl = null)
	{
		global $option;
	
		// get data from Model
		$model = &$this->getModel();
		//add model function
		$tickets = $model->tickets();
		
		$this->assignRef('tickets', $tickets);
		
		parent::display($tpl);
	}

}

?>