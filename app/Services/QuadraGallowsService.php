<?php

namespace App\Services;

use Illuminate\Support\Str;

class QuadraGallowsService
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

    public static function checkLetterInWord($letter, $wordArr1, $wordArr2, $wordArr3, $wordArr4, &$correctLetters, &$errorLetters, &$lifes)
    {
        $hasLetterinArr1 = self::compareLetterWithAccent($letter, $wordArr1, $correctLetters);
        $hasLetterinArr2 = self::compareLetterWithAccent($letter, $wordArr2, $correctLetters);
        $hasLetterinArr3 = self::compareLetterWithAccent($letter, $wordArr3, $correctLetters);
        $hasLetterinArr4 = self::compareLetterWithAccent($letter, $wordArr4, $correctLetters);
        if (!$hasLetterinArr1 && !$hasLetterinArr2 && !$hasLetterinArr3 && !$hasLetterinArr4) {
            $errorLetters[] = $letter;
            $lifes--;
            return false;
        }
        return true;
    }

    public static function finishedWin($wordArr1, $wordArr2, $wordArr3, $wordArr4, $correctLetters)
    {
        return count($correctLetters) == count($wordArr1) + count($wordArr2) + count($wordArr3) + count($wordArr4);
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

    public static function getWord1(): string
    {
        return WordsService::quadra()[0];
    }
    public static function getWord2(): string
    {
        return WordsService::quadra()[1];
    }
    public static function getWord3(): string
    {
        return WordsService::quadra()[2];
    }
    public static function getWord4(): string
    {
        return WordsService::quadra()[3];
    }

    public static function getWordArr1()
    {
        return preg_split("/(?<!^)(?!$)/u", Self::getWord1());
    }
    public static function getWordArr2()
    {
        return preg_split("/(?<!^)(?!$)/u", Self::getWord2());
    }
    public static function getWordArr3()
    {
        return preg_split("/(?<!^)(?!$)/u", Self::getWord3());
    }
    public static function getWordArr4()
    {
        return preg_split("/(?<!^)(?!$)/u", Self::getWord4());
    }
}
