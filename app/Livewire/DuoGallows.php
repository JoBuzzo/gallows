<?php

namespace App\Livewire;

use App\Services\DuoGallowsService;
use App\Services\WordsService;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class DuoGallows extends Component
{

    #[Title("DuoGallows")]
    public string $word1;
    public string $word2;
    public $wordArr1 = array();
    public $wordArr2 = array();
    public int $lifes;
    public $correctLetters = array();
    public $errorLetters = array();
    public $modal = false;
    public $win;
    public $numberImage = 0;
    public $wordIsBig;
    public function mount()
    {
        $words = WordsService::words();

        $this->word1 = $words[rand(0, count($words))];
        $this->word2 = $words[rand(0, count($words))];

        $this->wordArr1 = preg_split("/(?<!^)(?!$)/u", $this->word1);
        $this->wordArr2 = preg_split("/(?<!^)(?!$)/u", $this->word2);

        $this->lifes = 6;

        if (in_array('-', $this->wordArr1) || in_array('-', $this->wordArr2)) {
            $this->correctLetters[] = '-';
        }
        if (in_array("'", $this->wordArr1) || in_array("'", $this->wordArr2)) {
            $this->correctLetters[] = "'";
        }

        $this->wordIsBig = count($this->wordArr1) > 16 || count($this->wordArr2) > 16;
    }
    public function render()
    {
        if (DuoGallowsService::finishedWin($this->wordArr1, $this->wordArr2, $this->correctLetters) ) {
            $this->modal = true;
            $this->win = true;
        } else if (DuoGallowsService::finishedLost($this->lifes)) {
            $this->modal = true;
            $this->win = false;
        }

        $this->numberImage = 6 - $this->lifes;

        return view('livewire.duo-gallows');
    }

    public function verifyLetter($letter)
    {
        if (!in_array($letter, $this->correctLetters) && !in_array($letter, $this->errorLetters)) {
            DuoGallowsService::checkLetterInWord($letter, $this->wordArr1, $this->wordArr2, $this->correctLetters, $this->errorLetters, $this->lifes);
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
