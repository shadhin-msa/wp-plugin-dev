<?php 
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

/**
* 
*/
class Admin extends BaseController
{
	public $settings_api;

	public $adminCallbacks;

	public $pages = array();

	public $subpages = array();

	public function register() 
	{
		$this->settings_api = new SettingsApi();

		$this->adminCallbacks = new AdminCallbacks();

		$this->setPages();

		$this->setSubpages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings_api->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();
	}

	public function setPages() 
	{
		$this->pages = array(
			array(
				'page_title' => 'Alecaddd Plugin', 
				'menu_title' => 'Alecaddd', 
				'capability' => 'manage_options', 
				'menu_slug' => 'mft_settings', 
				'callback' => array( $this->adminCallbacks, 'adminDashboard' ), 
				'icon_url' => 'dashicons-store', 
				'position' => 110
			)
		);
	}

	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'mft_settings', 
				'page_title' => 'Custom Post Types', 
				'menu_title' => 'CPT', 
				'capability' => 'manage_options', 
				'menu_slug' => 'mft_cpt', 
				'callback' => array( $this->adminCallbacks, 'adminCpt' )
			),
			array(
				'parent_slug' => 'mft_settings', 
				'page_title' => 'Custom Taxonomies', 
				'menu_title' => 'Taxonomies', 
				'capability' => 'manage_options', 
				'menu_slug' => 'mft_taxonomies', 
				'callback' => array( $this->adminCallbacks, 'adminTaxonomy' )
			),
			array(
				'parent_slug' => 'mft_settings', 
				'page_title' => 'Custom Widgets', 
				'menu_title' => 'Widgets', 
				'capability' => 'manage_options', 
				'menu_slug' => 'mft_widgets', 
				'callback' => array( $this->adminCallbacks, 'adminWidget' )
			)
		);
	}

	public function setSettings()
	{
		$args = array(
			array(
				'option_group' => 'mft_options_group',
				'option_name' => 'text_example',
				'callback' => array( $this->adminCallbacks, 'mftOptionsGroup' )
			),
			array(
				'option_group' => 'mft_options_group',
				'option_name' => 'first_name'
			)
		);

		$this->settings_api->setSettings( $args );
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'mft_admin_index',
				'title' => 'Settings',
				'callback' => array( $this->adminCallbacks, 'mftAdminSection' ),
				'page' => 'mft_settings'
			)
		);

		$this->settings_api->setSections( $args );
	}

	public function setFields()
	{
		$args = array(
			array(
				'id' => 'text_example',
				'title' => 'Text Example',
				'callback' => array( $this->adminCallbacks, 'mftTextExample' ),
				'page' => 'mft_settings',
				'section' => 'mft_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class'
				)
			),
			array(
				'id' => 'first_name',
				'title' => 'First Name',
				'callback' => array( $this->adminCallbacks, 'mftFirstName' ),
				'page' => 'mft_settings',
				'section' => 'mft_admin_index',
				'args' => array(
					'label_for' => 'first_name',
					'class' => 'example-class'
				)
			)
		);

		$this->settings_api->setFields( $args );
	}
}