<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.vote
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;

/**
 * Layout variables
 * -----------------
 * @var   string   $context  The context of the content being passed to the plugin
 * @var   object   &$row     The article object
 * @var   object   &$params  The article params
 * @var   integer  $page     The 'page' number
 * @var   array    $parts    The context segments
 * @var   string   $path     Path to this file
 */

if ($context == 'com_content.categories')
{
	return;
}

$rating = (int) $row->rating;

// Icons for rating
$starImageOn  = '<span class="icon-star"></span>';
$starImageOff = '<span class="icon-regular icon-star"></span>';

$img = '';
for ($i = 0; $i < $rating; $i++)
{
	$img .= $starImageOn;
}

for ($i = $rating; $i < 5; $i++)
{
	$img .= $starImageOff;
}

?>
<div class="content_rating" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
	<p class="unseen sr-only">
		<?php echo Text::sprintf('PLG_VOTE_USER_RATING', '<span itemprop="ratingValue">' . $rating . '</span>', '<span itemprop="bestRating">5</span>'); ?>
		<meta itemprop="ratingCount" content="<?php echo (int) $row->rating_count; ?>">
		<meta itemprop="worstRating" content="0">
	</p>
	<?php echo $img; ?>
</div>
