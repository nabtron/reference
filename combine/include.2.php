<?php 
// reference: https://wp-mix.com/combine-all-css-files-php/
// combine all CSS files
	header('Content-type: text/css');
	$path_to_css = '/css'; // edit path to css directory
	function get_files($dir = '.', $sort = 0) {
		$files = scandir($dir, $sort);
		$files = array_diff($files, array('.', '..'));
		return $files;
	}
	$files = get_files($path_to_css, 1);
	foreach($files as $file) {
		include_once($path_to_css . '/' . $file);
	} 
?>

<link rel='stylesheet' href='http://example.com/css/css.php' type='text/css' media='all'>

