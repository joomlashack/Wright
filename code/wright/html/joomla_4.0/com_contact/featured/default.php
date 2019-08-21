<?php
// Wright v.3 Override: Joomla 3.2.2
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2019 Joomlashack. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// If the page class is defined, add to class as suffix.
// It will be a separate class if the user starts it with a space
?>
<div class="blog-featured<?php echo $this->pageclass_sfx;?>">
<?php if ($this->params->get('show_page_heading') != 0 ) : ?>
	<div class="page-header">  <?php // Wright v.3: Added page header ?>
		<h1>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
		</h1>
	</div>  <?php // Wright v.3: Added page header ?>
<?php endif; ?>

<?php echo $this->loadTemplate('items'); ?>
<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->pagesTotal > 1)) : ?>
	<div class="container-pagination mt-5">
		<?php if ($this->params->def('show_pagination_results', 1)) : ?>
			<p class="counter float-right">
				<?php echo $this->pagination->getPagesCounter(); ?>
			</p>
		<?php  endif; ?>
        <div class="float-left">
            <?php echo $this->pagination->getPagesLinks(); ?>
        </div>
	</div>
<?php endif; ?>

</div>
