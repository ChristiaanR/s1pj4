<?php

/**
 * @package     Joomla.Site
 * @subpackage  Templates.j4test
 *
 * @copyright   (C) 2017 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;

/** @var Joomla\CMS\Document\HtmlDocument $this */

$app = Factory::getApplication();
$wa  = $this->getWebAssetManager();

$wa->usePreset('template.j4test');
$wa->useScript('template.j4test.js');

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

<head>
  <jdoc:include type="metas" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <jdoc:include type="styles" />
  <jdoc:include type="scripts" />
</head>

<body class="<?php echo $this->direction === 'rtl' ? 'rtl' : ''; ?>">
  <jdoc:include type="message" />
  <jdoc:include type="component" />
</body>

</html>