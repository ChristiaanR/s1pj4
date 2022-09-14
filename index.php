<?php

/**
 * @package     s1pj4
 *
 * @copyright   Copyright (C) 2022 Christiaan Ruiter. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Uri\Uri;

$app = Factory::getApplication();
$wa  = $this->getWebAssetManager();

$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');

$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
$menu     = $app->getMenu()->getActive();
$pageclass = $menu !== null ? $menu->getParams()->get('pageclass_sfx', '') : '';

$wa->usePreset('template.s1pj4');
$wa->useScript('template.s1pj4.js');

$this->setMetaData('viewport', 'width=device-width, initial-scale=1');
$this->setMetaData('color-scheme', 'light dark');
$this->setMetaData('generator', '');

?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

<head>
  <jdoc:include type="metas" />
  <jdoc:include type="styles" />
  <jdoc:include type="scripts" />
  <link rel="stylesheet" href="./templates/s1pj4/css/template.css">
  <script src="./templates/s1pj4/js/template.js"></script>
  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">
</head>

<body class="site 
  <?php echo $option
    . ' view-' . $view
    . ($layout ? ' layout-' . $layout : ' no-layout')
    . ($task ? ' task-' . $task : ' no-task')
    . ($itemid ? ' itemid-' . $itemid : '')
    . ($pageclass ? ' ' . $pageclass : '');
  ?>">

  <?php if ($this->params->get('siteDescription')) : ?>
  <div><?php echo htmlspecialchars($this->params->get('siteDescription')); ?></div>
  <?php endif; ?>

  <header id="header" class="pageheader container" data-size="default">
    <a href="#maincontent" class="skip-link">Skip to content</a>
    <a href="/" class="logo">
      <img src="<?php echo $this->baseurl ?>/images/logo_samen1plan.png" alt="<?php echo $sitename ?>" />
    </a>
    <button type="button" id="navbutton" class="toggle btn btn-primary only-sm" data-toggle="collapse"
      data-target="#mainnav">Menu</button>

    <div id="mainnav" class="mainnav collapse" data-collapse="true">
      <jdoc:include type="modules" name="position-1" style="none" />
      <!-- <jdoc:include type="modules" name="search" style="none" /> -->
    </div>


  </header>


  <div class="container extra">
    <jdoc:include type="modules" name="banner" style="none" />
    <jdoc:include type="modules" name="breadcrumbs" style="none" />
  </div>
  <main>
    <div class="container">

      <jdoc:include type="modules" name="position-2" style="none" />
      <jdoc:include type="modules" name="position-3" style="none" />
      <jdoc:include type="modules" name="position-4" style="none" />
      <jdoc:include type="modules" name="position-5" style="none" />
      <jdoc:include type="modules" name="position-6" style="none" />
      <jdoc:include type="modules" name="position-7" style="none" />
      <jdoc:include type="modules" name="bottom1" style="none" />
      <jdoc:include type="modules" name="left" style="none" />
      <jdoc:include type="modules" name="lightbox" style="none" />

      <jdoc:include type="message" />
      <jdoc:include type="component" />
    </div>
  </main>
  <footer>
    <div class="container">

      <jdoc:include type="modules" name="footer" style="html5" />
    </div>
  </footer>
  <jdoc:include type="modules" name="debug" style="none" />


</body>

</html>