<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ExpressionEngine - by EllisLab
 *
 * @package		ExpressionEngine
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license		http://expressionengine.com/user_guide/license.html
 * @link		http://expressionengine.com
 * @since		Version 2.0
 * @filesource
 */
 
// ------------------------------------------------------------------------

/**
 * Time From Now Plugin
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Plugin
 * @author		jbueler
 * @link		http://jbueler.com
 */

$plugin_info = array(
	'pi_name'		=> 'Time From Now',
	'pi_version'	=> '1.0',
	'pi_author'		=> 'jbueler',
	'pi_author_url'	=> 'http://jbueler.com',
	'pi_description'=> 'Get a timestamp with a modifier',
	'pi_usage'		=> Time_from_now::usage()
);


class Time_from_now {

	public $return_data;
    
	/**
	 * Constructor
	 */
	public function __construct()
	{
    $this->EE =& get_instance();
    $modifier = ee()->TMPL->fetch_param('modifier');
    $format = (ee()->TMPL->fetch_param('format')) ? ee()->TMPL->fetch_param('format') : '%Y-%m-%d %H:%i';    
    $time = strtotime($modifier,ee()->localize->now);
    $this->return_data = ee()->localize->format_date($format, $time);
	}
	
	// ----------------------------------------------------------------
	
	/**
	 * Plugin Usage
	 */
	public static function usage()
	{
		ob_start();
?>

{exp:time_from_now time_from_now="-7 days"}

<?php
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}
}


/* End of file pi.time_from_now.php */
/* Location: /system/expressionengine/third_party/time_from_now/pi.time_from_now.php */