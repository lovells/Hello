<?php 
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class GithubModelTickets extends JModel
{
	
	function gettickets(){
	    
		Github_Autoloader::register();
		$github = new Github_Client();
		$user = $github->getUserApi()->show('lovells');
		$commits = $github->getCommitApi()->getBranchCommits('lovells', 'Hello', 'master');
		
		return $commits;
	}

	

	function get_Repos(){
		Github_Autoloader::register();
		$github = new Github_Client();
	    $myRepos = $github->getRepoApi()->getUserRepos('lovells');

		return $myRepos;
	}
	
	//Get information about a user
	function get_user_info(){
		Github_Autoloader::register();
		$github = new Github_Client();
		$user = $github->getUserApi()->show('lovells');
		return $user;
	} 
	
	//List project labels
	function get_list_project(){
		Github_Autoloader::register();
		$github = new Github_Client();
		$labels = $github->getIssueApi()->getLabels('lovells', 'Hello');
		return $labels;
	}
	
	//List commits for a file
	function get_file_list_commits(){
		Github_Autoloader::register();
		$github = new Github_Client();
		$commits = $github->getCommitApi()->getFileCommits('lovells', 'Hello', 'master', 'com_github/github.php');
		return $labels;
	}
	
	//List contents of a tree
	function get_tree_list_contents(){
		Github_Autoloader::register();
		$github = new Github_Client();
		$tree = $github->getObjectApi()->showTree('lovells', 'Hello', '1bf770792c6f4bc45b11a1facd58ef4a6a4da505');
		return $tree;
	}
	
	//Show the informations of a blob
	function get_show_blob(){
	Github_Autoloader::register();
	$github = new Github_Client();
	$blob = $github->getObjectApi()->showBlob('lovells', 'Hello', '9a274c8aeed1b1ca43734c820e2607a3c73e0353', 'com_github/github.php');
	//$blobs = $github->getObjectApi()->listBlobs('ornicar', 'php-github-api', '691c2ec7fd0b948042047b515886fec40fe76e2b');
	return $blob;
	}
	
	//Show the raw content of an object
	function get_raw_content(){
		Github_Autoloader::register();
		$github = new Github_Client();
		$rawText = $github->getObjectApi()->getRawData('lovells', 'Hello', '9a274c8aeed1b1ca43734c820e2607a3c73e0353');
		return $rawText;
	}
} 
?>