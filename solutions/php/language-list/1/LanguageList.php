<?php

function language_list(...$languages)
{
    return $languages; // [] if no args, otherwise list of languages given
}

function add_to_language_list($languages, $new_language)
{
    $languages[] = $new_language; // faster than array_push(), no simple concat
    return $languages;       
}

function prune_language_list($languages)
{
    array_shift($languages); // returns the element, unfortunately
    return $languages;
}

function current_language($languages)
{
    return $languages[0];
}

function language_list_length($languages)
{
    return count($languages);
}