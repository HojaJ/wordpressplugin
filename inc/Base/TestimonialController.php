<?php
/**
 * @package AlecadddPlugin
 */

namespace Inc\Base;


use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\SettingsApi;

class TestimonialController extends BaseController
{
    public $callbacks;
    public $settings;
    public $subpages = array();

    public function register()
    {
        if ( ! $this->activated( 'testimonial_manager' ) ) return;

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
                'page_title' => 'Testimonial Manager',
                'menu_title' => 'Testimonial Manager',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_testimonial',
                'callback' => array( $this->callbacks, 'adminTestimonial' )
            )
        );
    }
}