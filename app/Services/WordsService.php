<?php

namespace App\Services;

class WordsService
{
    public static function words($num) 
    {
        $content = file_get_contents("files\\{$num}.txt");

        $words = explode(PHP_EOL, $content);

        return $words;
    }
}
