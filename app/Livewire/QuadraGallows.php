<?php

namespace App\Livewire;

use App\Services\QuadraGallowsService;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Illuminate\Support\Str;
use Livewire\Component;

class QuadraGallows extends Component
{
    #[Title("QuadraGallows")]
    public int $lifes;
    public $correctLetters = array();
    public $errorLetters = array();
    public $modal = false;
    public $win;
    public $numberImage = 0;
    public function render()
    {
        if (QuadraGallowsService::finishedWin(QuadraGallowsService::getWordArr1(), QuadraGallowsService::getWordArr2(), QuadraGallowsService::getWordArr3(), QuadraGallowsService::getWordArr4(), $this->correctLetters)) {
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
        $this->lifes = (Session::get('lifes4') !== null && Session::get('lifes4') >= 0) ? Session::get('lifes4') : 6;

        $this->correctLetters = Session::get('correctLetters4') ?: array();
        $this->errorLetters = Session::get('errorLetters4') ?: array();

        if (
            in_array('-', QuadraGallowsService::getWordArr1()) ||
            in_array('-', QuadraGallowsService::getWordArr2()) ||
            in_array('-', QuadraGallowsService::getWordArr3()) ||
            in_array('-', QuadraGallowsService::getWordArr4())
        ) {
            $this->correctLetters[] = '-';
        }
        if (
            in_array("'", QuadraGallowsService::getWordArr1()) ||
            in_array("'", QuadraGallowsService::getWordArr2()) ||
            in_array("'", QuadraGallowsService::getWordArr3()) ||
            in_array("'", QuadraGallowsService::getWordArr4())
        ) {
            $this->correctLetters[] = "'";
        }

    }

    public function verifyLetter($letter)
    {
        if (!in_array($letter, $this->correctLetters) && !in_array($letter, $this->errorLetters)) {
            QuadraGallowsService::checkLetterInWord($letter, QuadraGallowsService::getWordArr1(), QuadraGallowsService::getWordArr2(), QuadraGallowsService::getWordArr3(), QuadraGallowsService::getWordArr4(), $this->correctLetters, $this->errorLetters, $this->lifes);
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
