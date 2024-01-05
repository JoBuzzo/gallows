<?php

namespace App\Services;

class WordsService
{
    public static function words() 
    {
        $rand = rand(1,4);

        switch ($rand) {
            case 1:
                $content = file_get_contents(storage_path('app/public/substantivos.txt'));
                break;
            case 2:
                $content = file_get_contents(storage_path('app/public/adjetivos.txt'));
                break;
            case 3:
                $content = file_get_contents(storage_path('app/public/verbos.txt'));
                break;
            default:
                $content = file_get_contents(storage_path('app/public/adverbios.txt'));
                break;
        }

        $words = explode(PHP_EOL, $content);

        return $words;
    }
}
