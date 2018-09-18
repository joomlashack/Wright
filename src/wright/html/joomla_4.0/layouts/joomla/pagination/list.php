<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2018 Joomlashack. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$list = $displayData['list'];

$startDisabled = $list['start']['active'] ? '' : ' disabled'; 
$prevDisabled  = $list['previous']['active'] ? '' : ' disabled'; 
$nextDisabled  = $list['next']['active'] ? '' : ' disabled'; 
$endDisabled   = $list['end']['active'] ? '' : ' disabled'; 

?>
<ul class="pagination ml-0 mb-5 mt-5">
	<li class="pagination-start<?php echo $startDisabled; ?> page-item"><?php echo $list['start']['data']; ?></li>
	<li class="pagination-prev<?php echo $prevDisabled; ?> page-item"><?php echo $list['previous']['data']; ?></li>
	<?php foreach ($list['pages'] as $page) : ?>
		<?php $disabled = $page['active'] ? '' : ' disabled'; ?>
		<?php echo '<li class="page-item' . $disabled . '">' . $page['data'] . '</li>'; ?>
	<?php endforeach; ?>
	<li class="pagination-next<?php echo $nextDisabled; ?> page-item"><?php echo $list['next']['data']; ?></li>
	<li class="pagination-end<?php echo $endDisabled; ?> page-item"><?php echo $list['end']['data']; ?></li>
</ul>