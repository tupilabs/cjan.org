<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * Template class.
 * 
 * @package hooks
 * @description Implements the template views in the framework.
 */
 
class Template {
    /**
     * Reference for base URL.
     * @var string|URL
     */
	public $base_url;
	/**
	 * CI index page.
	 * @var string|URL
	 */
	public $index_page;
	/**
	* Execute the implementation. This method is called through <em>hooks.php</em> 
	* in the <em>config</em> folder.
	*/
	public function init() {
		// CI instance
		$CI =& get_instance();
		 
		// Defining base_url
		$this->base_url = $CI->config->slash_item('base_url');
		
		$this->index_page = ($CI->config->slash_item('index_page')!='/') ? $CI->config->slash_item('index_page') : '';
		
		// Getting the normal output
		$output = $CI->output->get_output();
		 
		// Getting title, if defined in the controller
		$title = (isset($CI->title)) ? $CI->title : '';
		 
		// CSS files defined in the controller
		$css = (isset($CI->css)) ? $this->create_css_files($CI->css) : '';
		 
		// JS files defined in the controller
		$js = (isset($CI->js)) ? $this->create_js_files($CI->js) : '';
		
		// If layout is defined and regex doesn't match
		if (isset($CI->layout) && !preg_match('/(.+).php$/', $CI->layout)) {
			$CI->layout .= '.php';
		} else {
			$CI->layout = 'none.tpl.php';
		}
		
		// Defining the complete layout path
		$layout = LAYOUTPATH . $CI->layout;
		 
		// If template is not the default, and file does not exist
		if ($CI->layout !== 'default.tpl.php' && !file_exists($layout)) {
			// Displays message if layout does not end in '.php'.
			if ($CI->layout != '.php') {
				show_error("You have specified a invalid layout: " . $CI->layout);
			}
		}
		
		// If layout file exists
		if (file_exists($layout)) {
			// Load its content
			$layout = $CI->load->file($layout, true);
			
			// Replace {content_for_layout} by the layout output
			$view = str_replace('{content_for_layout}', $output, $layout);
			 
			// Replace {title_for_layout} by the view title
			$view = str_replace('{title_for_layout}', $title, $view);
			 
			// CSS files
			$view = str_replace('{css_for_layout}', $css, $view);
			 
			// JS files
			$view = str_replace('{js_for_layout}', $js, $view);
			
			// Replace {img_for_layout} by the images folder
			$view = str_replace('{img_path}', $this->base_url . IMGPATH, $view);
			
			// Replace {base_url} by $this->base_url 
			$view = str_replace('{base_url}', $this->base_url . $this->index_page, $view);
			
			// Replace {asset_path} by assets URL
			$view = str_replace('{asset_path}', $this->base_url . ASSETPATH, $view);
		} else {
			$view = $output;
		}
		 
		echo $view;
	}
	/**
	* CSS files used by template.
	*
	* @param $files array CSS files
	*/
	private function create_css_files($files) {
		$html = "";
		 
		for ($i = 0; $i < count($files); $i++) {
			$html .= "<link rel='stylesheet' type='text/css' href='" . $this->base_url . CSSPATH . $files[$i] . "' media='screen' />\n";
		}
		 
		return $html;
	}
	/**
	* JS files used by template.
	*
	* @param $files array JS files
	*/
	private function create_js_files($files)
	{
		$html = "";
		 
		for ($i = 0; $i < count($files); $i++)
		{
			$link = $files[$i];
			if(stripos($link, 'http://')===0 || stripos($link, 'https://')===0) {
				$html .= "<script type='text/javascript' src='" . $files[$i] . "'></script> \n";
			} else {
				$html .= "<script type='text/javascript' src='" . $this->base_url . JSPATH . $files[$i] . "'></script> \n";
			}
		}
		return $html;
	}
}
