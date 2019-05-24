<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2019 Joomlashack. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Create shortcut
$urls = json_decode($this->item->urls);

// Create shortcuts to some parameters.
$params = $this->item->params;
if ($urls && (!empty($urls->urla) || !empty($urls->urlb) || !empty($urls->urlc))) :
?>
<div class="clearfix"></div>
<div class="content-links mb-3">
	<div class="list-group">
		<?php
			$urlarray = array(
			array($urls->urla, $urls->urlatext, $urls->targeta, 'a'),
			array($urls->urlb, $urls->urlbtext, $urls->targetb, 'b'),
			array($urls->urlc, $urls->urlctext, $urls->targetc, 'c')
			);
			foreach ($urlarray as $url) :
				$link = $url[0];
				$label = $url[1];
				$target = $url[2];
				$id = $url[3];

				if ( ! $link) :
					continue;
				endif;

				// If no label is present, take the link
				$label = ($label) ? $label : $link;

				// If no target is present, use the default
				$target = $target ? $target : $params->get('target'.$id);

                // Compute the correct link

                switch ($target)
                {
                    case 1:
                        // open in a new window
                        echo '<a href="'. htmlspecialchars($link) .'" target="_blank"  rel="nofollow" class="list-group-item list-group-item-action">'.
                            htmlspecialchars($label) .'</a>';
                        break;

                    case 2:
                        // open in a popup window
                        $attribs = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=600';
                        echo "<a href=\"" . htmlspecialchars($link) . "\" onclick=\"window.open(this.href, 'targetWindow', '".$attribs."'); return false;\" class=\"list-group-item list-group-item-action\">".
                            htmlspecialchars($label).'</a>';
                        break;
                    case 3:
                        // open in a modal window
                        JHtml::_('behavior.modal', 'a.modal');
                        echo '<a class="modal" href="'.htmlspecialchars($link).'"  rel="{handler: \'iframe\', size: {x:600, y:600}}" class="list-group-item list-group-item-action">'.
                            htmlspecialchars($label) . ' </a>';
                        break;

                    default:
                        // open in parent window
                        echo '<a href="'.  htmlspecialchars($link) . '" rel="nofollow" class="list-group-item list-group-item-action">'.
                            htmlspecialchars($label) . ' </a>';
                        break;
                }
		endforeach; ?>
	</div>
</div>
<?php endif; ?>