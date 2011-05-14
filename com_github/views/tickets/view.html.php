<?php 
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

class GithubViewTickets extends JView
{
	function display($tpl = null)
	{
		global $option;
	   jimport('joomla.filter.output');
		// get data from Model
		$model = & $this->getModel();
		//add model function
		$tickets = $model->gettickets();
		
		$repos = $model->get_Repos();
		
		$user_info = $model->get_user_info();
		
		$labels = $model->get_list_project();
		
		$file_list_commits = $model->get_file_list_commits();
		
		$tree_list_contents = $model->get_tree_list_contents();
		
		$show_blob = $model->get_show_blob();
		
		$raw_content = $model->get_raw_content();
		
		$list_commits_branch = $model->get_list_commits_branch();
		
		$list_commit_file = $model->get_list_commit_file();
		
		$list_blob = $model->get_list_blob();
		
		print_r($list_blob);
		
		print_r($list_commit_file);
		
		print_r($list_commits_branch);
		
		print_r($raw_content);
		
		print_r($repos);
		
		print_r($file_list_commits);
		
		print_r($user_info);
		
		print_r($labels);
		
		print_r($tree_list_contents);
		
		print_r($show_blob);
		
		print_r($tickets);exit;
		$this->assignRef('tickets', $tickets);
		
		parent::display($tpl);
	}

}

?>