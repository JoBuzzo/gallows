<?php

namespace App\Services;

class WordsService
{
    public static function word()
    {
        $content = file_get_contents("files/words8.txt");

        $words = explode(PHP_EOL, $content);

        if (count($words) == 1) {
            $words = explode("\n", $content);
        }

        return $words[date('z') % count($words)];
    }

    public static function duo()
    {
        $content = file_get_contents("files/words6.txt");

        $words = explode(PHP_EOL, $content);

        if (count($words) == 1) {
            $words = explode("\n", $content);
        }

        return [
            $words[date('z') % count($words)],
            $words[date('z')+10 % count($words)]
        ];
    }
    public static function quadra()
    {
        $content = file_get_contents("files/words5.txt");

        $words = explode(PHP_EOL, $content);

        if (count($words) == 1) {
            $words = explode("\n", $content);
        }

        return [
            $words[date('z') % count($words)],
            $words[date('z')+10 % count($words)],
            $words[date('z')+20 % count($words)],
            $words[date('z')+30 % count($words)],
        ];
    }
}
