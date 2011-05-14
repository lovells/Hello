<?php 
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class GithubModelTickets extends JModel
{
	var $data = null;

	
	function __construct()
  		{
        parent::__construct();
  }

	function tickets(){
		global $option,$mainframe;
		Github_Autoloader::register();
		$github = new Github_Client();
		$user = $github->getUserApi()->show('lovells');
		$commits = $github->getCommitApi()->getBranchCommits('lovells', 'Hello', 'master');
		$tree = $github->getObjectApi()->showTree('lovells', 'Hello', '1bf770792c6f4bc45b11a1facd58ef4a6a4da505');
		$result = $tree;
		
		return $result;
	}


	
} 
?>