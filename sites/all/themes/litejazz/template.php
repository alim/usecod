<?php

if (is_null(theme_get_setting('litejazz_style'))) {
  global $theme_key;
  // Save default theme settings
  $defaults = array(
    'litejazz_style' => 0,
    'litejazz_width' => 0,
    'litejazz_fixedwidth' => '850',
    'litejazz_breadcrumb' => 0,
    'litejazz_iepngfix' => 0,
    'litejazz_themelogo' => 0,
    'litejazz_fontfamily' => 0,
    'litejazz_customfont' => '',
    'litejazz_uselocalcontent' => 0,
    'litejazz_localcontentfile' => '',
    'litejazz_leftsidebarwidth' => '210',
    'litejazz_rightsidebarwidth' => '210',
    'litejazz_suckerfish' => 0,
    'litejazz_usecustomlogosize' => 0,
    'litejazz_logowidth' => '100',
    'litejazz_logoheight' => '100',
    'litejazz_banner' => 1,
    'litejazz_pickstyle' => 0,
  );

  variable_set(
    str_replace('/', '_', 'theme_'. $theme_key .'_settings'),
    array_merge(theme_get_settings($theme_key), $defaults)
  );
  // Force refresh of Drupal internals
  theme_get_setting('', TRUE);
}

function get_litejazz_style() {
  $style = theme_get_setting('litejazz_style');
  if (!$style) {
    $style = 'blue';
  }
  if (theme_get_setting('litejazz_pickstyle')) {
    if (isset($_COOKIE["litejazzstyle"])) {
      $style = $_COOKIE["litejazzstyle"];
    }
  }
  return $style;
}

drupal_add_css(drupal_get_path('theme', 'litejazz') . '/css/' . get_litejazz_style() . '.css', 'theme');

if (theme_get_setting('litejazz_suckerfish')) {
   drupal_add_css(drupal_get_path('theme', 'litejazz') . '/css/suckerfish_' . get_litejazz_style() . '.css', 'theme');
}

if (theme_get_setting('litejazz_uselocalcontent')) {
  $local_content = theme_get_setting('litejazz_localcontentfile');
  if (file_exists($local_content)) {
    drupal_add_css($local_content, 'theme');
  }
}

if (theme_get_setting('litejazz_iepngfix')) {
   drupal_add_js(drupal_get_path('theme', 'litejazz') . '/js/jquery.pngFix.js', 'theme');
}

if (theme_get_setting('litejazz_pickstyle')) {
  drupal_add_js(drupal_get_path('theme', 'litejazz') . '/js/pickstyle.js', 'theme');
}

function litejazz_preprocess_page(&$variables) {
  if (theme_get_setting('litejazz_themelogo')) {
    $variables['logo'] = base_path() . path_to_theme() . '/images/' . get_litejazz_style() . '/logo.png';
  }
}

function phptemplate_menu_links($links, $attributes = array()) {

  if (!count($links)) {
    return '';
  }
  $level_tmp = explode('-', key($links));
  $level = $level_tmp[0];
  $output = "<ul class=\"links-$level ". $attributes['class'] . "\" id=\"". $attributes['id'] ."\">\n";

  $num_links = count($links);
  $i = 1;

  foreach ($links as $index => $link) {
    $output .= '<li';

    $output .= ' class="';
    if (stristr($index, 'active')) {
      $output .= 'active';
    } // frontpage AND current-link in menu is <front>
    elseif ((drupal_is_front_page()) && ($link['href']=='<front>')) {
      $link['attributes']['class'] = 'active'; //add class active to <li
      $output .= 'active'; //add class active to <a
    }
    if ($i == 1) {
      $output .= ' first'; }
    if ($i == $num_links) {
      $output .= ' last'; }
    $output .= '"';
    $output .= ">" . l($link['title'], $link['href'], $link['attributes'], $link['query'], $link['fragment']) . "</li>\n";
    $i++;
  }
  $output .= '</ul>';
  return $output;
} 

