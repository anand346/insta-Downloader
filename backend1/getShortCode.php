<?php
function getPostShortcode($url)
{
    if (substr($url, -1) != '/') {
        $url .= '/';
    }
    preg_match('/\/(p|tv|reel)\/(.*?)\//', $url, $output);
    return ($output['2'] ?? '');
}
echo getPostShortcode("https://www.instagram.com/p/CRyBauep3aq/");
?>