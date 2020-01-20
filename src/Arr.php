<?php

namespace JMasci;

/**
 * Class Arr
 * @package JMasci
 */
Class Arr{

    /**
     * Returns an empty array if the input is not an array.
     *
     * @param $thing
     * @return array
     */
    public static function force( $thing ) {
        return is_array( $thing ) ? $thing : [];
    }

    /**
     * Turns something into an array without being too strict.
     *
     * @param $thing
     * @param $even_scalar
     * @return array
     */
    public static function make( $thing, $even_scalar = false ){
        if ( is_object( $thing ) ) {
            return (array) $thing;
        } else if ( is_array( $thing ) ) {
            return $thing;
        } else if ( $even_scalar && is_scalar( $thing ) ) {
            return [ $thing ];
        } else{
            return [];
        }
    }
}