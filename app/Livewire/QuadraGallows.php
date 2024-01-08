<?php

namespace App\Livewire;

use App\Services\QuadraGallowsService;
use App\Services\WordsService;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Illuminate\Support\Str;
use Livewire\Component;

class QuadraGallows extends Component
{
    #[Title("QuadraGallows")]
    public string $word1;
    public string $word2;
    public string $word3;
    public string $word4;
    public $wordArr1 = array();
    public $wordArr2 = array();
    public $wordArr3 = array();
    public $wordArr4 = array();
    public int $lifes;
    public $correctLetters = array();
    public $errorLetters = array();
    public $modal = false;
    public $win;
    public $numberImage = 0;
    public function render()
    {
        if (QuadraGallowsService::finishedWin($this->wordArr1, $this->wordArr2, $this->wordArr3, $this->wordArr4, $this->correctLetters)) {
            $this->modal = true;
            $this->win = true;
        } else if (QuadraGallowsService::finishedLost($this->lifes)) {
            $this->modal = true;
            $this->win = false;
        }

        $this->numberImage = 6 - $this->lifes;
        return view('livewire.quadra-gallows');
    }

    public function mount()
    {
        $this->word1 = WordsService::word(4);
        $this->word2 = WordsService::word(5);
        $this->word3 = WordsService::word(6);
        $this->word4 = WordsService::word(7);


        $this->wordArr1 = preg_split("/(?<!^)(?!$)/u", $this->word1);
        $this->wordArr2 = preg_split("/(?<!^)(?!$)/u", $this->word2);
        $this->wordArr3 = preg_split("/(?<!^)(?!$)/u", $this->word3);
        $this->wordArr4 = preg_split("/(?<!^)(?!$)/u", $this->word4);

        $this->lifes = (Session::get('lifes4') !== null && Session::get('lifes4') >= 0) ? Session::get('lifes4') : 6;

        $this->correctLetters = Session::get('correctLetters4') ?: array();
        $this->errorLetters = Session::get('errorLetters4') ?: array();

        if (
            in_array('-', $this->wordArr1) ||
            in_array('-', $this->wordArr2) ||
            in_array('-', $this->wordArr3) ||
            in_array('-', $this->wordArr4)
        ) {
            $this->correctLetters[] = '-';
        }
        if (
            in_array("'", $this->wordArr1) ||
            in_array("'", $this->wordArr2) ||
            in_array("'", $this->wordArr3) ||
            in_array("'", $this->wordArr4)
        ) {
            $this->correctLetters[] = "'";
        }

    }

    public function verifyLetter($letter)
    {
        if (!in_array($letter, $this->correctLetters) && !in_array($letter, $this->errorLetters)) {
            QuadraGallowsService::checkLetterInWord($letter, $this->wordArr1, $this->wordArr2, $this->wordArr3, $this->wordArr4, $this->correctLetters, $this->errorLetters, $this->lifes);
            Session::put('correctLetters4', $this->correctLetters);
            Session::put('errorLetters4', $this->errorLetters);
            Session::put('lifes4', $this->lifes);
        }
    }

    #[Rule(['key' => ['required', 'min:1', 'max:1']], message: ['key.min' => 'Só pode enviar uma letra por vez', 'key.max' => 'Só pode enviar uma letra por vez', 'key.required' => 'É obrigatório enviar uma letra'])]
    public $key = '';
    public function handleKeyDown()
    {
        $this->key = Str::lower(str_replace(' ', '-', Str::ascii($this->key)));

        if (strlen($this->key) == 1 && $this->key != '-') {
            $this->verifyLetter($this->key);
        }

        $this->reset('key');
    }
}
