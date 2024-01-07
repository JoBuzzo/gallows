<?php

namespace App\Services;

class WordsService
{
    public static function words() 
    {
        $content = file_get_contents('files\\words.txt');

        $words = explode(PHP_EOL, $content);

        return $words;
    }
}
