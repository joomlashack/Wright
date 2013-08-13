<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
if (!function_exists("wright_joomla_finder_search")) :

	
	
	
	function wright_joomla_finder_search($buffer) {
		$buffer = preg_replace('/ class="button"/Ui', 'class="button btn btn-primary"', $buffer);
		$buffer = preg_replace('/<span class="small">/Ui', '<span class="label label-info small">', $buffer);
		$buffer = preg_replace('/id="finder-search">/Ui', 'id="finder-search" class="form-inline"', $buffer);
		
				return $buffer;
	}

endif;

ob_start("wright_joomla_finder_search");
require('components/com_finder/views/search/tmpl/default.php');
ob_end_flush();
