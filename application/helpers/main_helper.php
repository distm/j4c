<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * assets_url(string uri)
 * refers to assets folder
 * 
 * @param string $uri
 * @return string
 */
function assets_url($uri='')
{
    return base_url("assets/{$uri}");
}
