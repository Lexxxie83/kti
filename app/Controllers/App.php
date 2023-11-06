<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    
    public function __construct()
    {
        if (!is_404()) {
            $this->acf = true;
        }
    }
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Laatste nieuws', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Zoekresultaten voor "%s"', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Niet gevonden', 'sage');
        }
        return get_the_title();
    }

    // public function getLogo()
    // {
    //     return (object)array(
    //         'desk' => get_field('opt_head_logo', 'option'),
    //         'mobile' => get_field('opt_head_logo_mobile', 'option'),
    //     );
    // }

    public function getLogoFooter()
    {
        return get_field('opt_foot_logo', 'option');
    }

    public function getContactTitle()
    {
        return get_field('opt_foot_contact_title', 'option');
    }

    public function getContactInfo()
    {
        $info = get_field('opt_foot_contact_info', 'option');
        return (object)array(
            'location' => $info['location'],
            'phone' => $info['phone'],
            'email' => $info['email'],
            'linkedin' => $info['linkedin'],
            'pinterest' => $info['pinterest'],
            'twitter' => $info['twitter'],
            'facebook' => $info['facebook'],
            'instagram' => $info['instagram'],
            'youtube' => $info['youtube'],
        );
    }

    // public function getForm()
    // {
    //     return get_field('opt_foot_newsletter_form', 'option');
    // }

    public function getIntro()
    {
        return (object)array(
            'title' => get_field('opt_foot_intro_title', 'option'),
            'text' => get_field('opt_foot_intro_txt', 'option'),
        );
    }

    // public function getSwitch()
    // {
    //     $switch = get_field('opt_head_site', 'option');
    //     return (object)array(
    //         'title' => $switch['txt'],
    //         'link' => $switch['link'],
    //     );
    // }

    // public static function getColor()
    // {
    //     return get_field('opt_general_style', 'option');
    // }

    // public static function getButton($button = array(), $class = '')
    // {
    //     if ($button['btn_lnk'] || $button['btn_url'] || $button['btn_special']) {
    //         $button_title = $button['btn_txt'];
    //         $content = $button_title;
    //         $button_link = '';
    //         switch ($button['btn_type']) {
    //             case 'page':
    //                 $button_link = $button['btn_lnk'];
    //                 break;
    //             case 'url':
    //                 $button_link = $button['btn_url'];
    //                 break;
    //             case 'special':
    //                 $button_link = $button['btn_special'];
    //                 break;
    //         }
    //         $target = '';
    //         if ($button['btn_target']) {
    //             $target = ' target="_blank"';
    //         }
    //         if ((!empty($button_title) && !empty($button_link))) {
    //             if ($button_link)
    //                 $button_link = ' href="' . $button_link . '" ';
    //             return '<a class="' . $class . '"' . $button_link . $target . '>' . $content . '</a>';
    //         }
    //         return $content;
    //     }
    //     return false;
    // }

    // public static function getButtonProject()
    // {
    //     $button = get_field('opt_general_adv_project', 'option');
    //     return self::getButton($button);
    // }

    // public function getUserInfo()
    // {
    //     $user = wp_get_current_user();
    //     return $user;
    // }

    public function get404()
    {
        $notice = get_field('opt_general_404', 'option');
        return (object)array(
            'title' => $notice['title'],
            'desc' => $notice['txt'],
        );
    }

    /**
     * @param $link_share
     *
     * @return string
     */
    public static  function facebook_share( $link_share ) {
        return 'https://www.facebook.com/sharer/sharer.php?u=' . $link_share;
    }

    /**
     * @param $link_share
     *
     * @return string
     */
    public  static function twitter_share( $link_share ) {
        return 'https://twitter.com/home?status=' . $link_share;
    }

    /**
     * @param $link_share
     * @param null $title
     * @param null $summary
     *
     * @return string
     */
    public static function linkedin_share( $link_share, $title = null, $summary = null ) {
        return 'https://www.linkedin.com/shareArticle?mini=true&url=' . $link_share . '&title=' . $title . '&summary=' . $summary;
    }

    /**
     * @param $link_share
     * @param null $title
     * @param null $summary
     *
     * @return string
     */
    public static function instagram_share( $link_share, $title = null, $summary = null ) {
        return 'https://www.linkedin.com/shareArticle?mini=true&url=' . $link_share . '&title=' . $title . '&summary=' . $summary;
    }

    /**
     * @param $image_source
     * @param null $image
     * @param null $description
     *
     * @return string
     */
    public static function pinterest_share( $image_source, $image = null, $description = null ) {
        return 'https://pinterest.com/pin/create/button/?url=' . $image_source . '&media=' . $image . '&description=' . $description;
    }
}
