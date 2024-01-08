<?php

namespace App\Services;

class WordsService
{
    public static function word($num) 
    {
        $content = file_get_contents("files\\{$num}.txt");

        $words = explode(PHP_EOL, $content);

        return $words[date('z') % count($words)];
    }
}
