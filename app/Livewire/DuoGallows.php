<?php

namespace App\Livewire;

use App\Services\DuoGallowsService;
use App\Services\WordsService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class DuoGallows extends Component
{

    #[Title("DuoGallows")]

    public int $lifes;
    public $correctLetters = array();
    public $errorLetters = array();
    public $modal = false;
    public $win;
    public $numberImage = 0;
    public function mount()
    {
        $this->lifes = (Session::get('lifes2') !== null && Session::get('lifes2') >= 0) ? Session::get('lifes2') : 6;

        $this->correctLetters = Session::get('correctLetters2') ?: array();
        $this->errorLetters = Session::get('errorLetters2') ?: array();

        if (in_array('-', DuoGallowsService::getWordArr1()) || in_array('-', DuoGallowsService::getWordArr2())) {
            $this->correctLetters[] = '-';
        }
        if (in_array("'", DuoGallowsService::getWordArr1()) || in_array("'", DuoGallowsService::getWordArr2())) {
            $this->correctLetters[] = "'";
        }

    }
    public function render()
    {
        if (DuoGallowsService::finishedWin(DuoGallowsService::getWordArr1(), DuoGallowsService::getWordArr2(), $this->correctLetters) ) {
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
            DuoGallowsService::checkLetterInWord($letter, DuoGallowsService::getWordArr1(), DuoGallowsService::getWordArr2(), $this->correctLetters, $this->errorLetters, $this->lifes);
            Session::put('correctLetters2', $this->correctLetters);
            Session::put('errorLetters2', $this->errorLetters);
            Session::put('lifes2', $this->lifes);
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
