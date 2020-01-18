<?php

namespace JMasci;

Class Str{

    /**
     * True for integers or strings containing only digits.
     *
     * @param $str
     * @return bool
     */
    public static function is_integer( $str ) {

        // todo: test if this check is necessary
        if ( ! $str ) {
            return $str === 0 || $str === "0";
        }

        // todo: test this...
        return ! preg_match( "/[^0-9]/", (string) $str );
    }

    /**
     * todo: add test.
     *
     * @param $str
     * @param bool $allow_underscores
     * @return string|string[]|null
     */
    public static function make_alphanumeric( $str, $allow_underscores = false ) {
        $pt = $allow_underscores ? "/[^A-Za-z0-9_]+/" : "/[^A-Za-z0-9]+/";
        return preg_replace( $pt, "", $str );
    }

    /**
     * // todo: should we allow more than on dot?
     *
     * @param $str
     * @param bool $allow_dots
     * @return string|string[]|null
     */
    public static function strip_non_numeric( $str, $allow_dots = false ) {

        $pattern = $allow_dots ? "/[^0-9.]/" : "/[^0-9]/";
        return preg_replace( $pattern, "", $str );
    }

    /**
     * Strips a $pre from $str if $str starts with $pre.
     *
     * todo: test.
     *
     * @param $str
     * @param $pre
     * @return false|string
     */
    public static function strip_prefix( $str, $pre ){
        return strpos( $str, $pre ) === 0 ? substr( $str, strlen( $pre ) ) : $str;
    }

    /**
     * todo: test.
     *
     * @param $str
     * @param $end
     * @return false|string
     */
    public static function strip_suffix( $str, $end ){

        if ( strpos( $str, $end ) === strlen( $str ) - strlen( $end ) ) {
            return (string) substr( $str, 0, strlen( $str ) - strlen( $end ) );
        }

        return $str;
    }

    /**
     * todo: add test. also, maybe we can write without using strip_suffix.
     * @param $str
     * @param $what
     * @return bool
     */
    public static function ends_with( $str, $what ) {
        return strlen( $str ) !== strlen( self::strip_suffix( $str, $what ) );
    }

    /**
     * todo: I modified the regex and have not tested even once yet
     *
     * @param $str
     * @param bool $allow_underscore
     * @return string|string[]|null
     */
    public static function slugify( $str, $allow_underscore = false ){

        $str = trim( strtolower( $str ) );

        // alphanumeric, or dash, whitespace, or underscore
        $str = preg_replace( "/[^a-z0-9_\s-]/", "", $str );

        // maybe convert underscores to dashes (do this early)
        if ( ! $allow_underscore ) {
            $str = str_replace( "_", "-", $str );
        }

        // convert single or multiple whitespaces to a single dash
        $str = preg_replace( "/[\s]{0,}/", "-", $str );

        // convert multiple dashes to a single dash
        $str = preg_replace( "/[-]{1,}/", "-", $str );

        return $str;
    }

    /**
     * todo: move...
     *
     * @param $test
     */
    public static function perform_tests( \PHPUnit\Framework\TestCase $test ){
        // todo: some of these are failing
        $test::assertEquals( "lorem-ipsum-dolor",  Str::slugify( "Lorem Ipsum !@#$%^&*()    Dolor", true ), "slugify 1");
        $test::assertEquals( "lorem-ipsum_dolor",  Str::slugify( "Lorem Ipsum !@#$%^&*()_   Dolor", true ), "slugify 2");
        $test::assertEquals( "a-b",  Str::slugify( "a-b" ), "slugify 3");
        $test::assertEquals( "a-b",  Str::slugify( "a----b" ), "slugify 4");
        $test::assertEquals( "a-b",  Str::slugify( "a  b" ), "slugify 5");
        $test::assertEquals( "a-b",  Str::slugify( "a - - - - b" ), "slugify 6");
        $test::assertTrue( false, "idk" );
    }
}