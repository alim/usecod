<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>">
<head>
<title><?php print $head_title ?></title>
<?php print $head ?><?php print $styles ?><?php print $scripts ?>
<script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>

<?php if (theme_get_setting('litejazz_width')) { ?>
  <style type="text/css">
    #page {
      width : <?php print theme_get_setting('litejazz_fixedwidth') ?>px;
    }
  </style>
<?php } else { ?>
  <style type="text/css">
    #page {
      width: 95%;
    }
  </style>
<?php }  ?>
 
<?php if ($left_sidebar_width = theme_get_setting('litejazz_leftsidebarwidth')) { ?>
   <style type="text/css">
      body.sidebar-left #main { margin-left: -<?php print $left_sidebar_width ?>px; }
      body.two-sidebars #main { margin-left: -<?php print $left_sidebar_width ?>px; }
      body.sidebar-left #squeeze { margin-left: <?php print $left_sidebar_width ?>px; }
      body.two-sidebars #squeeze { margin-left: <?php print $left_sidebar_width ?>px; }
      #sidebar-left { width: <?php print $left_sidebar_width ?>px; }
</style>
<?php }  ?>
<?php if ($right_sidebar_width = theme_get_setting('litejazz_rightsidebarwidth')) { ?>
   <style type="text/css">
      body.sidebar-right #main { margin-right: -<?php print $right_sidebar_width ?>px; }
      body.two-sidebars #main { margin-right: -<?php print $right_sidebar_width ?>px; }
      body.sidebar-right #squeeze { margin-right: <?php print $right_sidebar_width ?>px; }
      body.two-sidebars #squeeze { margin-right: <?php print $right_sidebar_width ?>px; }
      #sidebar-right { width: <?php print $right_sidebar_width ?>px; }
   </style>
<?php }  ?>

   <?php if (theme_get_setting('litejazz_fontfamily')) { ?>
     <style type="text/css">
         body {
           font-family : <?php print theme_get_setting('litejazz_fontfamily') ?>;
         }
       </style>
     <?php }  ?>

     <?php if (theme_get_setting('litejazz_fontfamily') == 'Custom') { ?>

       <?php if (theme_get_setting('litejazz_customfont')) { ?>
         <style type="text/css">
            body {
              font-family : <?php print theme_get_setting('litejazz_customfont') ?>;
            }
         </style>
       <?php }  ?>
   <?php }  ?>

<?php if (theme_get_setting('litejazz_iepngfix')) { ?>
<!--[if lte IE 6]>
  <script type="text/javascript">$(document).ready(function(){ $(document).pngFix(); });</script>
<![endif]-->
<?php } ?>

   <?php if (theme_get_setting('litejazz_usecustomlogosize')) { ?>
      <style type="text/css">
        img#logo {
          width : <?php print theme_get_setting('litejazz_logowidth') ?>px;
          height: <?php print theme_get_setting('litejazz_logoheight') ?>px;
        }
      </style>
<?php }  ?>


<!--[if IE]>
  <style type="text/css" media="all">@import "<?php print base_path() . path_to_theme() ?>/css/ie.css";</style>
<![endif]-->

<?php if ($suckerfish) { ?>
  <?php if (theme_get_setting('litejazz_suckerfish')) { ?>
  <!--[if lte IE 6]>
    <script type="text/javascript" src="<?php print $GLOBALS['base_url'] . "/"; print $directory; ?>/js/suckerfish.js"></script>
  <![endif]-->
  <?php }  ?>
<?php } ?>
</head>
<body class="<?php print $body_classes;?>" >

<div id="page">
  <div id="masthead">
    <div id="header" class="clear-block">
      <div class="header-right">
        <div class="header-left"> <?php print $search_box; ?>
          <?php if ($logo): ?>
            <div id="logo-title">
              <a href="<?php print $base_path; ?>" title="<?php print t('Home'); ?>"> 
                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" id="logo" /> 
              </a>
            </div><!-- /logo-title -->
          <?php endif; ?>
          <div id="name-and-slogan">
            <?php if ($site_name): ?>
            <h1 id='site-name'> <a href="<?php print $base_path ?>" title="<?php print t('Home'); ?>"> <?php print $site_name; ?> </a> </h1>
            <?php endif; ?>
            <?php if ($site_slogan): ?>
            <div id='site-slogan'> <?php print $site_slogan; ?> </div>
            <?php endif; ?>
          </div>
          <!-- /name-and-slogan -->
          <?php if ($header): ?>
            <div style="clear:both"></div>
          <?php print $header; ?>
          <?php endif; ?>
        </div>
        <!-- /header-left -->
      </div>
      <!-- /header-right -->
    </div>
    <!-- /header -->
  </div>
  <div id="navigation" class="menu <?php if ($primary_links) { print "withprimary"; } if ($secondary_links) { print " withsecondary"; } ?> ">
    <?php if ($primary_links): ?>
    <div id="primary" class="clear-block"> <?php print theme('links', $primary_links); ?> </div>
    <?php endif; ?>
    <?php if ($secondary_links): ?>
    <div id="secondary" class="clear-block"> <?php print theme('links', $secondary_links); ?> </div>
    <?php endif; ?>
  </div>
    <?php if ($suckerfish): ?>
    <div id="suckerfishmenu" class="clear-block">
        <?php print $suckerfish; ?>
    </div>
    <?php endif; ?>
  <!-- /navigation -->
<?php
         $section1count = 0;
         if ($user1)  { $section1count++; }
         if ($user2)  { $section1count++; }
         if ($user3)  { $section1count++; }
?>
  <?php if ($section1count): ?>
  <?php $section1width = 'width' . floor(99 / $section1count); ?>
  <div class="clear-block clr" id="section1">
    <div class="sections">
        <?php if ($user1): ?>
        <div class="section <?php echo $section1width ?>"><?php print $user1; ?></div>
        <?php endif; ?>
        <?php if ($user2): ?>
        <div class="section <?php echo $section1width ?>"><?php print $user2; ?></div>
        <?php endif; ?>
        <?php if ($user3): ?>
        <div class="section <?php echo $section1width ?>"><?php print $user3; ?></div>
        <?php endif; ?>
  </div>
<div style="clear:both"></div>
</div>
  <!-- /section1 -->
  <?php endif; ?>
  <div class="clear-block" id="middlecontainer">
        <?php if ($left) { ?>
        <div id="sidebar-left"><?php print $left ?> </div>
        <?php } ?>
          <div id="main"><div id="squeeze">
            <?php if (theme_get_setting('litejazz_breadcrumb')): ?>
              <?php if ($breadcrumb): ?>
                <div id="breadcrumb"> <?php print $breadcrumb; ?> </div>
              <?php endif; ?>
            <?php endif; ?>
            <?php if ($mission) { ?>
              <div id="mission"><?php print $mission ?></div>
            <?php } ?>
            <?php if ($content_top):?>
            <div id="content-top"><?php print $content_top; ?></div>
            <?php endif; ?>
            <h1 class="title"><?php print $title ?></h1>
            <div class="tabs"><?php print $tabs ?></div>
            <?php print $help ?> <?php if ($show_messages) { print $messages; } ?> <?php print $content; ?> <?php print $feed_icons; ?>
            <?php if ($content_bottom): ?>
            <div id="content-bottom"><?php print $content_bottom; ?></div>
            <?php endif; ?>
          </div></div>
        <?php if ($right) { ?>
        <div id="sidebar-right"><?php print $right ?> </div>
        <?php } ?>
  </div>
<div style="clear:both"></div>
<?php
         $section2count = 0;
         if ($user4)  { $section2count++; }
         if ($user5)  { $section2count++; }
         if ($user6)  { $section2count++; }
?>
  <?php if ($section2count): ?>
  <?php $section2width = 'width' . floor(99 / $section2count); ?>
  <div class="clear-block clr" id="section2">
    <div class="sections">
        <?php if ($user4): ?>
        <div class="section <?php echo $section2width ?>"><?php print $user4; ?></div>
        <?php endif; ?>
        <?php if ($user5): ?>
        <div class="section <?php echo $section2width ?>"><?php print $user5; ?></div>
        <?php endif; ?>
        <?php if ($user6): ?>
        <div class="section <?php echo $section2width ?>"><?php print $user6; ?></div>
        <?php endif; ?>
  </div>
<div style="clear:both"></div>
</div>
  <!-- /section2 -->
<?php endif; ?>
<?php if ($footer || $footer_message || theme_get_setting('litejazz_banner')): ?>
  <div id="footer">
    <?php if ($footer): ?>
      <div id="footer-region">
        <?php print $footer?>
      </div>
    <?php endif; ?>
    <?php if ($footer_message) { ?>
      <div id="footer-message">
        <?php print $footer_message ?>
      </div>
    <?php } ?>
    <?php if (theme_get_setting('litejazz_banner')): ?>
      <div class="rooplelogo">
        <a href="http://www.roopletheme.com" title="RoopleTheme!" target="_blank">
          <img src="<?php print  base_path() . path_to_theme() . "/images/" . get_litejazz_style() . "/roopletheme.png"; ?>" alt="RoopleTheme!"/>
        </a> 
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>
<div id="footer-wrapper" class="clear-block">
  <div class="footer-right">
    <div class="footer-left"> </div>
    <!-- /footer-left -->
  </div>
  <!-- /footer-right -->
</div>
<!-- /footer-wrapper -->
  <?php print $closure ?> </div>
</body>
</html>
