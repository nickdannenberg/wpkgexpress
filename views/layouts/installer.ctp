<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-AU">

<head>
  <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
  <meta name="author" content="Brian White" />
  <meta name="description" content="Web-based graphical frontend to the open source project wpkg software deployment management system" />
  <meta name="keywords" content="wpkg, wpkg express, wpgkexpress, wpkg frontend, open source" />

  <title>wpkgExpress :: Installer - <?php echo $title_for_layout; ?></title>

  <?php echo $html->css('plain'); ?>
  <?php echo $html->css('installer'); ?>
  <?php echo $scripts_for_layout; ?>
</head>

<body>

<!-- Main site container starts -->
<div id="siteBox">

  <div id="content">
    <?php if ($session->check('Message.flash')) $session->flash(); ?>
    <?php echo $content_for_layout; ?>
  </div>

  <?php echo $cakeDebug; ?>

</div>

</body>
</html>