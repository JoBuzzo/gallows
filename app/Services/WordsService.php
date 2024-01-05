<?php

namespace App\Services;

class WordsService
{
    public static function words() 
    {
        $rand = rand(1,4);

        switch ($rand) {
            case 1:
                $content = file_get_contents('files\\adjetivos.txt');
                break;
            case 2:
                $content = file_get_contents('files\\adjetivos.txt');
                break;
            case 3:
                $content = file_get_contents('files\\verbos.txt');
                break;
            default:
                $content = file_get_contents('files\\adverbios.txt');
                break;
        }

        $words = explode(PHP_EOL, $content);

        return $words;
    }
}
