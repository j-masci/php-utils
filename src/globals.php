<?php
/**
 * Very simple global variables interface.
 *
 * Keeps related global mutable state in the same place
 * for better debugging capabilities.
 */

namespace JMasci;

/**
 * Get a global variable or default.
 *
 * @param $key
 * @param $default
 * @return mixed|null
 */
function get_global( $key, $default ) {
    return Globals::get( $key, $default );
}

/**
 * Set a global variable.
 *
 * @param $key
 * @param $value
 */
function set_global( $key, $value ) {
    Globals::set( $key, $value );
}

/**
 * Stores an array of globals in a static property.
 *
 * Class Globals
 * @package JM
 */
Final Class Globals{

    /**
     * Allowing public access to this variable for
     * easier use of common array operations.
     *
     * @var
     */
    public static $data = [];

    /**
     * Note: use the set_global function which wraps this.
     *
     * @param $key
     * @param $value
     */
    public static function set( $key, $value ){
        self::$data[$key] = $value;
    }

    /**
     * Note: use the get_global function which wraps this.
     *
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    public static function get( $key, $default = null ) {
        // intentionally use self, not static. I guess.
        return isset( self::$data[$key] ) ? self::$data[$key] : $default;
    }
}