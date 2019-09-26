<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_newsfeeds
 *
 * @copyright   Copyright (C) 2005 - 2019 Joomlashack. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\String\PunycodeHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Newsfeeds\Site\Helper\Route as NewsfeedsHelperRoute;

$n         = count($this->items);
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));

?>
<div class="com-newsfeeds-category__items">
    <?php if (empty($this->items)) : ?>
        <p><?php echo Text::_('COM_NEWSFEEDS_NO_ARTICLES'); ?></p>
    <?php else : ?>
        <form action="<?php echo htmlspecialchars(Uri::getInstance()->toString(), ENT_COMPAT, 'UTF-8'); ?>" method="post" name="adminForm" id="adminForm">
            <?php if ($this->params->get('filter_field') !== 'hide' || $this->params->get('show_pagination_limit')) : ?>
                <fieldset class="com-newsfeeds-category__filters filters card-body bg-light mb-3">
                    <?php if ($this->params->get('filter_field') !== 'hide' && $this->params->get('filter_field') == '1') : ?>
                        <div class="btn-group">
                            <label class="filter-search-lbl sr-only" for="filter-search">
								<span class="badge badge-warning">
									<?php echo Text::_('JUNPUBLISHED'); ?>
								</span>
                                <?php echo Text::_('COM_NEWSFEEDS_FILTER_LABEL') . '&#160;'; ?>
                            </label>
                            <input type="text" name="filter-search" id="filter-search" value="<?php echo $this->escape($this->state->get('list.filter')); ?>" class="form-control" onchange="document.adminForm.submit();" placeholder="<?php echo Text::_('COM_NEWSFEEDS_FILTER_SEARCH_DESC'); ?>">
                        </div>
                    <?php endif; ?>
                    <?php if ($this->params->get('show_pagination_limit')) : ?>
                        <div class="btn-group float-right">
                            <label for="limit" class="sr-only">
                                <?php echo Text::_('JGLOBAL_DISPLAY_NUM'); ?>
                            </label>
                            <?php echo $this->pagination->getLimitBox(); ?>
                        </div>
                    <?php endif; ?>
                </fieldset>
            <?php endif; ?>
            <div class="wf-newsfeeds-category list-striped">
                <?php foreach ($this->items as $i => $item) : ?>
                    <?php if ($this->items[$i]->published == 0) : ?>
                        <div class="wf-newsfeed-item system-unpublished cat-list-row<?php echo $i % 2; ?>">
                    <?php else : ?>
                        <div class="wf-newsfeed-item cat-list-row<?php echo $i % 2; ?>">
                    <?php endif; ?>
                    <?php if ($this->params->get('show_articles')) : ?>
                        <span class="list-hits badge badge-info float-right">
							<?php echo Text::sprintf('COM_NEWSFEEDS_NUM_ARTICLES_COUNT', $item->numarticles); ?>
						</span>
                        <br>
                    <?php endif; ?>
                    <div class="list">
						<div class="list-title">
                            <h4>
                                <a href="<?php echo Route::_(NewsfeedsHelperRoute::getNewsfeedRoute($item->slug, $item->catid)); ?>">
                                    <?php echo $item->name; ?>
                                </a>
                            </h4>
                        </div>
					</div>
                    <?php if ($this->items[$i]->published == 0) : ?>
                        <span class="badge badge-warning">
							<?php echo Text::_('JUNPUBLISHED'); ?>
						</span>
                        <br>
                    <?php endif; ?>
                    <?php if ($this->params->get('show_link')) : ?>
                        <?php $link = PunycodeHelper::urlToUTF8($item->link); ?>
                        <div class="list">
							<a href="<?php echo $item->link; ?>">
                                <?php echo $link; ?>
                            </a>
						</div>
                    <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php // Add pagination links ?>
            <?php if (!empty($this->items)) : ?>
                <?php if (($this->params->def('show_pagination', 2) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->pagesTotal > 1)) : ?>
                    <div class="wf-container-pagination mt-5">
                        <?php if ($this->params->def('show_pagination_results', 1)) : ?>
                            <div class="counter float-right pt-3 pr-2">
                                <?php echo $this->pagination->getPagesCounter(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="float-left">
                            <?php echo $this->pagination->getPagesLinks(); ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                <?php endif; ?>
            <?php endif; ?>
        </form>
    <?php endif; ?>
</div>

