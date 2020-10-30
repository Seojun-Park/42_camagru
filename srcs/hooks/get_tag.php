<?php
function getAttribute($html, $tag)
{
    preg_match('@' . $tag . '="([^"]+)"@', $html, $match);
    return array_pop($match);
}

function getParameter($url, $tag)
{
    $parts = parse_url($url);
    parse_str($parts['query'], $query);
    return $query[$tag];
}

function getTextBetweenTags($string, $tagname)
{
    $pattern = "/<$tagname>(.*?)</$tagname>/";
    preg_match($pattern, $string, $matches);
    return $matches[1];
}

