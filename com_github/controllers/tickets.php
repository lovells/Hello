<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

class GithubControllerTickets extends JController
{
	function tickets(){

		JRequest::setVar('view', 'tickets');
		
		$model = $this->getModel('tickets', 'GithubModel');
			
		$this->display();
	}

	function display()
	{
		$view = JRequest::getVar('view');

		$document = & JFactory :: getDocument();
		$user	=& JFactory::getUser();
		
		$viewName = JRequest :: getVar('view', 'tickets');
		$model =&$this->getModel( $viewName, 'GithubModel' ); 
		$layoutName = JRequest :: getVar('layout', 'tickets');
		$viewType = $document->getType();
		
		$view = & $this->getView($viewName, $viewType);
		
		if (!JError :: isError($model))
		{
			$view->setModel($model, true);
		}
		$view->setLayout($layoutName);
		$view->display();
		
		if (!$view) {
		//our view is named 'display'
			JRequest::setVar('view', 'display');
		}
		
		parent::display();
	}
}
?>