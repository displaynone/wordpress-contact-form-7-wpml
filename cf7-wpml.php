<?php
/*
Plugin Name: Contact Form 7 - WPML
Description: Translates Contact Form 7 forms using WPML 
Version: 1.0
*/

/**
 * Translate CF7 Forms
 */
class CF7_WPML {
  function CF7_WPML() {
    // Init
    add_action('init', array($this, 'init'));
  }
  
  /**
   * Init add filter if the plugins are activated
   */
  function init() {
    if (class_exists('SitePress') && class_exists('WPCF7')) {
      // Filter form tags
      add_filter( 'wpcf7_form_tag', array($this, 'wpml_cf7_tags'));
    }
  }
  
  /**
   * Adds every tag into WPML translations
   * 
   * @param array $scanned_tag list of tags
   * @param object $exec not used
   * @return array
   */
  function wpml_cf7_tags($scanned_tag, $exec ) {
    // For each tags values
    foreach($scanned_tag['values'] as $i=>$v) {
      // Register translation
      icl_register_string('Contact Form 7', $v, $v);
      // Translate value
      $scanned_tag['values'][$i] = icl_t('Contact Form 7', $v, $v);
    }
    return $scanned_tag;
  }
}