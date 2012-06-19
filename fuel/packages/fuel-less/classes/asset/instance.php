<?php
/**
 * Fuel
 *
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2012 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * FuelPHP LessCSS package implementation. This namespace controls all Google
 * package functionality, including multiple sub-namespaces for the various
 * tools.
 *
 * @author     Kriansa
 * @version    1.0
 * @package    Fuel
 * @subpackage Less
 */
namespace Less;

class Asset_Instance extends \Fuel\Core\Asset_Instance
{
	/**
	 * Less
	 *
	 * Compile a Less file and load it as a CSS asset.
	 *
	 * @access	public
	 * @param	mixed	       The file name, or an array files.
	 * @param	array	       An array of extra attributes
	 * @param	string	       The asset group name
	 * @return	string|object  Rendered asset or current instance when adding to group
	 */
	public function less($stylesheets = array(), $attr = array(), $group = null, $raw = false)
	{
		if ( ! is_array($stylesheets))
		{
			$stylesheets = array($stylesheets);
		}
		
		foreach($stylesheets as &$lessfile)
		{
			$source_less  = \Config::get('asset.less_source_dir').$lessfile;
			
			if( ! is_file($source_less))
			{
				throw new \Exception('Could not find less source file: '.$source_less);
			}
			
			// Change the name for loading with Asset::css
			$lessfile = str_replace('.'.pathinfo($lessfile, PATHINFO_EXTENSION), '', $lessfile).'.css';
			
			// Full path to css compiled file
			$compiled_css = \Config::get('asset.less_output_dir').$lessfile;


			// Compile only if source is newer than compiled file
			//if ( ! is_file($compiled_css) or filemtime($source_less) > filemtime($compiled_css))
			if ( ! is_file($compiled_css) or $this->shouldRecompile($compiled_css, \Config::get('asset.less_source_dir')))
			{
				require_once PKGPATH.'fuel-less'.DS.'vendor'.DS.'lessphp'.DS.'lessc.inc.php';
				
				$handle = new \lessc($source_less);
				$handle->indentChar = \Config::get('asset.indent_with');
				
				$compile_path = dirname($compiled_css);
				$css_name     = pathinfo($compiled_css, PATHINFO_BASENAME);
				\File::update($compile_path, $css_name, $handle->parse());
			}
		}
		
		return static::css($stylesheets, $attr, $group, $raw);
	}


	/**
	 * Checks if any file in the asset/less_source_dir is newer then the compiled file.
	 *
	 * I created this functions because I import files within my .less file. And then I
	 * updated an imported .less file the main .less file won't be recompiled cuz this script
	 * just chekcs the main .less files modification date.
	 *
	 * Note: This function works for my situation there I just use one .less file
	 * that import others .less files. 
	 *
	 * If you use many .less files this file may recompile files that dosen't need too be recompiled.
	 *
	 * @author Sony?
	 */
	private function shouldRecompile($compiled_css, $dir)
	{
		foreach(glob($dir . '*') as $file)
		{
			if(is_dir($file)) {
				if($this->shouldRecompile($compiled_css, $dir . $file . '/')) {
					return true;
				}
			}
			else {
				if(filemtime($file) > filemtime($compiled_css)) {
					return true;
				}
			}
		}

		return false;
	}
}