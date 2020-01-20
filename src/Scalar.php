<?php

namespace JMasci;

/**
 * Scalar value types, ie, string, bool, int, float.
 *
 * Class Scalar
 * @package JMasci
 */
Class Scalar{

    /**
     * Force something to be scalar.
     *
     * @param $thing
     * @param null $default
     * @return bool|float|int|string|null
     */
    public static function force( $thing, $default = null ) {
        return is_scalar( $thing ) ? $thing : $default;
    }
}