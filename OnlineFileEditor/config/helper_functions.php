<?php

function showShortString($string, $maxLength) {
    $shortString; // function used to show x length of origial string
    if(strlen($string) > $maxLength) { // if string is longer than wanted max length then shorten else leave and return string failed
        $modified_string = substr($string, 0, $maxLength);
        $shortString = $modified_string . "...";
        return $shortString;
        exit;
    } else if(strlen($string) <= $maxLength) {
        $shortString = $string;
        return $shortString;
        exit;
    }else {
        return $string;
        exit;
    }
}
















?>