<?php

//reference: https://ikreativ.com/combine-minify-css-with-php/

header('Content-type: text/css');
ob_start("compress");

    function compress( $minify )
    {
	/* remove comments */
    	$minify = preg_replace( '!/*[^*]**+([^/][^*]**+)*/!', '', $minify );

        /* remove tabs, spaces, newlines, etc. */
    	$minify = str_replace( array("rn", "r", "n", "t", '  ', '    ', '    '), '', $minify );

        return $minify;
    }

    /* css files for combining */
    include('reset.css');
    include('application.css');
    include('responsive.css');

ob_end_flush();
