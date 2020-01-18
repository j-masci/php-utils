<?php

namespace JMasci;

/**
 * Type checking helpers.
 *
 * Class Types
 * @package JM
 */
Class Types{

    /**
     * Generally, returns true when $v is not an object, array, or a closure.
     *
     * @param $v
     * @return bool
     */
    public static function is_singular( $v ) {
        // todo: verify
        return is_string( $v ) || is_int( $v ) || is_bool( $v ) || is_null( $v ) || is_float( $v );
    }

    /**
     * @param $v
     * @return string
     */
    public static function force_singular( $v ) {
        return self::is_singular( $v ) ? $v : "";
    }
}
