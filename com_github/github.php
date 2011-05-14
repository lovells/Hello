<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.helper');
require_once( JPATH_LIBRARIES.DS.'Github'.DS. 'Autoloader.php' );

global $mainframe;

$select=JRequest::getCmd('view', 'tickets');
require_once( JPATH_COMPONENT.DS.'models'.DS.$select.'.php' );
$controller =$select;
if ($c = $select)
{
	$path = JPATH_COMPONENT . DS . 'controllers' . DS . $c . '.php';
	jimport('joomla.filesystem.file');

	if (JFile :: exists($path))
	{
		require_once ($path);
	}
	else
	{
		JError :: raiseError('500', JText :: _('Unknown controller: <br>' . $c . ':' . $path));
	}
}

$controllerName = 'GithubController'.$controller;
$controller = new $controllerName();
$controller->execute(JRequest :: getCmd('task', 'display'));				

$controller->redirect();
		
?>