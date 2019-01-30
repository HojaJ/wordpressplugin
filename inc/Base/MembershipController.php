<?php
/**
 * @package AlecadddPlugin
 */

namespace Inc\Base;


use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\SettingsApi;

class MembershipController extends BaseController
{

    public $callbacks;
    public $settings;
    public $subpages = array();

    public function register()
    {
        if ( ! $this->activated( 'membership_manager' ) ) return;

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setSubpages();

        $this->settings->addSubPages( $this->subpages )->register();
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'alecaddd_plugin',
                'page_title' => 'Membership Manager',
                'menu_title' => 'Membership Manager',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_membership',
                'callback' => array( $this->callbacks, 'adminMembership' )
            )
        );
    }
}