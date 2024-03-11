<?php

namespace App\Livewire;

use App\Services\GallowsService;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Gallows extends Component
{
    #[Title("Gallows")]

    public int $lifes;
    public $correctLetters = array();
    public $errorLetters = array();
    public $modal = false;
    public $win;
    public $numberImage = 0;

    public function mount()
    {
        $this->lifes = (Session::get('lifes1') !== null && Session::get('lifes1') >= 0) ? Session::get('lifes1') : 6;

        $this->correctLetters = Session::get('correctLetters1') ?: array();
        $this->errorLetters = Session::get('errorLetters1') ?: array();

        if (in_array('-', GallowsService::getWordArr())) {
            $this->correctLetters[] = '-';
        }
        if (in_array("'", GallowsService::getWordArr())) {
            $this->correctLetters[] = "'";
        }
    }

    public function render()
    {
        if (GallowsService::finishedWin(GallowsService::getWordArr(), $this->correctLetters)) {
            $this->modal = true;
            $this->win = true;
        } else if (GallowsService::finishedLost($this->lifes)) {
            $this->modal = true;
            $this->win = false;
        }

        $this->numberImage = 6 - $this->lifes;

        return view('livewire.gallows');
    }
    public function verifyLetter($letter)
    {
        if (!in_array($letter, $this->correctLetters) && !in_array($letter, $this->errorLetters)) {
            GallowsService::checkLetterInWord($letter, GallowsService::getWordArr(), $this->correctLetters, $this->errorLetters, $this->lifes);
            Session::put('correctLetters1', $this->correctLetters);
            Session::put('errorLetters1', $this->errorLetters);
            Session::put('lifes1', $this->lifes);
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
