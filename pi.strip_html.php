<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ini_set('display_errors');
error_reporting(E_ALL|E_STRICT);

$plugin_info = array(
	'pi_name' => 'Strip HTML',
	'pi_version' =>'1.0',
	'pi_author' =>'Steve Callan',
	'pi_author_url' => 'http://www.stevecallan.com/',
	'pi_description' => 'Strips out HTML content.',
	'pi_usage' => trimee::usage()
);

/**
* Form Class
*
* @package		ExpressionEngine
* @category		Plugin
* @author		Steve Callan
* @copyright	Copyright (c) 2011, Watts Water Technologies
*/

class strip_html {

	function __construct()
	{
		$this->EE =& get_instance();
	}
	
	function strip()
	{	
	
		/* Intitial Variables */
			$tag_content = $this->EE->TMPL->tagdata;
			$tags = $this->EE->TMPL->fetch_param('tags');
			
			
		/* TRIM content down */
			if($tags != "")
			{
				$output = strip_tags($tag_content, $tags);
			}
			else
			{
				$output = strip_tags($tag_content);
			}
			
		/*  AND finally return */
			return $output;
		
	}
		
	function usage()
	{
	
		ob_start(); 
		?>
		Allows you to strip HTML tags out of ExpressionEngine content.  Works like php strip_tags();
		
		{exp:strip_html:strip}
			<a href="/">This is my content.</a>
		{/exp:strip_html:strip}
		
		returns "This is my content."
		
		
		<?php
		$buffer = ob_get_contents();
		
		ob_end_clean(); 
		
		return $buffer;
	
	}
	
}

