<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_tags
 *
 * @copyright   Copyright (C) 2005 - 2019 Joomlashack. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

HTMLHelper::_('behavior.keepalive');
HTMLHelper::_('behavior.formvalidator');

?>
<div class="com-users-reset-complete reset-complete">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <div class="page-header">
            <h1>
                <?php echo $this->escape($this->params->get('page_heading')); ?>
            </h1>
        </div>
    <?php endif; ?>
    <form action="<?php echo Route::_('index.php?option=com_users&task=reset.complete'); ?>" method="post" class="com-users-reset-complete__form form-validate form-horizontal well">
        <div class="card-body bg-light">
            <?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
                <?php if (isset($fieldset->label)) : ?>
                    <p><?php echo Text::_($fieldset->label); ?></p>
                <?php endif; ?>
                <?php echo $this->form->renderFieldset($fieldset->name); ?>
            <?php endforeach; ?>
            <div class="com-users-reset-complete__submit control-group mb-0">
                <div class="controls">
                    <button type="submit" class="btn btn-primary validate">
                        <?php echo Text::_('JSUBMIT'); ?>
                    </button>
                </div>
            </div>
            <?php echo HTMLHelper::_('form.token'); ?>
        </div>
    </form>
</div>

