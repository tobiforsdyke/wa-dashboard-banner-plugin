<?php
/*
Plugin Name: Wac Arts Dashboard Banner Plugin
Plugin URI: https://www.tobiforsdyke.co.uk
Description: Replaces the welcome message in the admin dashboard for Wac Arts
Author: Tobi Forsdyke
Author URI: https://www.tobiforsdyke.co.uk
Version: 1.0
License: GLP2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

class DashboardBannerPlugin_Class {
  private static $instance;

  public static function getInstance() {
    if (self::$instance == NULL) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  private function __construct() {
    // implement hooks here
    remove_action( 'welcome_panel', 'wp_welcome_panel' );
    add_action( 'welcome_panel', array( $this, 'welcome_panel' ) );
    add_action( 'admin_enqueue_scripts', array( $this, 'add_css' ) );
  }

  function welcome_panel() {
    ?>
      <div class="welcome-panel-content">
        <div class="logo"></div>
        <h1>Welcome to the admin section for Wac Arts</h1>
        <p>If you need help with anything here please contact the <a href="mailto:tobi.forsdyke@wacarts.co.uk">Site Administrator</a>.</p>
      </div>
    <?php
  }

  function add_css() {
    wp_register_style( 'wa-dashboard-banner-plugin', plugin_dir_url( __FILE__ ) . 'wa-dashboard-banner-plugin.css' );
    wp_enqueue_style( 'wa-dashboard-banner-plugin' );
  }

}

DashboardBannerPlugin_Class::getInstance();
