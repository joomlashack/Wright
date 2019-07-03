<?php
/**
 * @package     Wright
 * @subpackage  HTML Layouts
 *
 * @copyright   Copyright (C) 2005 - 2019 Joomlashack.   All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

use Joomla\CMS\Layout\LayoutHelper;

?>
<div class="com-content-category category-list">

    <?php
    $this->subtemplatename = 'articles';
    echo LayoutHelper::render('joomla.content.category_default', $this);
    ?>

</div>


