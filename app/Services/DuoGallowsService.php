<?php

namespace App\Services;

use Illuminate\Support\Str;

class DuoGallowsService
{
    protected static function compareLetterWithAccent($letter, $wordArr, &$correctLetters)
    {
        $return = false;
        foreach ($wordArr as $l) {
            if ($letter == Str::ascii($l)) {
                $correctLetters[] = $l;
                $return = true;
            }
        }
        return $return;
    }

    public static function checkLetterInWord($letter, $wordArr1, $wordArr2, &$correctLetters, &$errorLetters, &$lifes)
    {
        if (
            !self::compareLetterWithAccent($letter, $wordArr1, $correctLetters)
            && !self::compareLetterWithAccent($letter, $wordArr2, $correctLetters)
        ) {
            $errorLetters[] = $letter;
            $lifes--;
            return false;
        }
        return true;
    }

    public static function finishedWin($wordArr1, $wordArr2, $correctLetters)
    {
        return count($wordArr1) + count($wordArr2) == count($correctLetters);
    }

    public static function finishedLost($lifes)
    {
        return !($lifes >= 1);
    }

    public static function tip($wordArr, &$correctLetters)
    {
        $key = array_rand($wordArr, 1);

        while (in_array($wordArr[$key], $correctLetters)) {
            $key = array_rand($wordArr, 1);
        }

        self::compareLetterWithAccent(Str::ascii($wordArr[$key]), $wordArr, $correctLetters);
    }
}
