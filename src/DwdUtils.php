<?php


class DwdUtils
{
    /**
     * Get string excerpt.
     *
     * @param $str string Input string
     * @param int    $length   Max length
     * @param string $trailing Trailing suffix
     *
     * @return string
     */
    public static function excerpt($str, $length = 25, $trailing = '…')
    {
        if (mb_strlen($str) > $length) {
            // string exceeded length, truncate and add trailing
            $excerpt = mb_substr($str, 0, $length);
            $lastSpace = mb_strrpos($excerpt, ' ');
            $excerpt = mb_substr($excerpt, 0, $lastSpace);
            $excerpt  .= $trailing;

            return $excerpt;
        }
        // string was already short enough, return the string
        return $str;
    }

}
