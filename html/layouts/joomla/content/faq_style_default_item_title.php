<?php

/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

// Create a shortcut for params.
$params  = $displayData->params;
$canEdit = $displayData->params->get('access-edit');

$currentDate = Factory::getDate()->format('Y-m-d H:i:s');
$link = RouteHelper::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language);
?>


<dt class="faq-header">
  <?php if ($params->get('show_title')) : ?>
  <button itemprop="name" id="header-<?php echo $this->escape($displayData->id); ?>"
    class="accordion-header accordionTrigger" aria-expanded="false"
    aria-controls="panel-<?php echo $this->escape($displayData->id); ?>" type="button">
    <?php echo $this->escape($displayData->title); ?>
  </button>

  <?php if ($displayData->state == 0) : ?>
  <span class="badge bg-warning"><?php echo Text::_('JUNPUBLISHED'); ?></span>
  <?php endif; ?>

  <?php if ($displayData->publish_up > $currentDate) : ?>
  <span class="badge bg-warning"><?php echo Text::_('JNOTPUBLISHEDYET'); ?></span>
  <?php endif; ?>

  <?php if ($displayData->publish_down !== null && $displayData->publish_down < $currentDate) : ?>
  <span class="badge bg-warning"><?php echo Text::_('JEXPIRED'); ?></span>
  <?php endif; ?>
</dt>
<?php endif; ?>