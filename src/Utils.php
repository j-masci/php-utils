<?php

namespace JMasci;

/**
 * Generic PHP Utils without a better place to live.
 *
 * Class Utils
 * @package JMasci
 */
Class Utils{

    /**
     * Returns what you pass in. ie. Laravel with().
     *
     * ie. with( new Cls() )->do_something().
     *
     * @param $thing
     * @return mixed
     */
    public static function with( $thing ){
        return $thing;
    }

    /**
     * Invokes a callable and returns what the callable
     * prints.
     *
     * @param callable $function
     * @param array $args
     * @return false|string
     */
    public static function capture( callable $function, $args = [] ){
        ob_start();
        call_user_func_array( $function, $args );
        return ob_get_clean();
    }

    /**
     * Ie. <div style="{this}"></div>
     *
     * Note: style="" is preferable over style="background-image: url('')"
     *
     * @param $url
     * @param null $sanitation_callback
     * @return string
     */
    public static function get_background_style( $url, $sanitation_callback = null ) {

        // when this is provided, do not check if its callable.
        // prefer not to fail silently here.
        if ( $sanitation_callback ) {
            $url = call_user_func( $sanitation_callback, $url );
        }

        return $url ? "background-image: url('" . $url . "');" : "";
    }
}