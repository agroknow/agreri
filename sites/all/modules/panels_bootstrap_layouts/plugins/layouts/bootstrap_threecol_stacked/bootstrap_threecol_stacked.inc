<?php

/**
 * Implements hook_panels_layouts().
 */
// Plugin definition
$plugin = array(
  'title' => t('Three Columns Stacked'),
  'category' => t('Bootstrap'),
  'icon' => 'bootstrap_threecol_stacked.png',
  'theme' => 'bootstrap_threecol_stacked',
  'admin css' => '../panels-bootstrap-layouts-admin.css',
  'regions' => array(
    'top' => t('Top'),
    'left' => t('Left'),
    'middle' => t('Middle'),
    'right' => t('Right'),
    'bottom' => t('Bottom'),
  ),
);
