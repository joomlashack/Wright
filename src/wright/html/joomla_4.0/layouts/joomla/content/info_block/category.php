<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2018 Joomlashack. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

?>
			<dd class="category-name">
				<span class="icon-folder"></span> <?php // Wright v.4: Added icon ?>
				<?php $title = $this->escape($displayData['item']->category_title);
				$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($displayData['item']->catslug)).'">'.$title.'</a>';?>
				<?php if ($displayData['params']->get('link_category') && $displayData['item']->catslug) : ?>
					<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url);  // Wright v.4: Non-mobile version ?>
				<?php else : ?>
					<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title);  // Wright v.4: Non-mobile version
					?>
				<?php endif; ?>
			</dd>