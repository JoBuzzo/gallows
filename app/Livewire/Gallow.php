<?php

namespace App\Livewire;

use App\Services\GallowService;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class Gallow extends Component
{
    #[Title("Gallows")]
    public string $word;
    public $wordArr = array();
    public int $lifes;
    public $correctLetters = array();
    public $errorLetters = array();
    public $modal = false;
    public $win;
    public $numberImage = 0;
    public function mount()
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

        $this->word = $words[rand(0, count($words))];

        $this->wordArr = preg_split("/(?<!^)(?!$)/u", $this->word);

        $this->lifes = 6;

        if (in_array('-', $this->wordArr)) {
            $this->correctLetters[] = '-';
        }
        if (in_array("'", $this->wordArr)) {
            $this->correctLetters[] = "'";
        }
    }
    
    public function render()
    {
        if (GallowService::finishedWin($this->wordArr, $this->correctLetters)) {
            $this->modal = true;
            $this->win = true;
        } else if (GallowService::finishedLost($this->lifes)) {
            $this->modal = true;
            $this->win = false;
        }

        $this->numberImage = 6 - $this->lifes;

        return view('livewire.gallow');
    }
    public function verifyLetter($letter)
    {
        if (!in_array($letter, $this->correctLetters) && !in_array($letter, $this->errorLetters)) {
            GallowService::checkLetterInWord($letter, $this->wordArr, $this->correctLetters, $this->errorLetters, $this->lifes);
        }
    }

    #[Rule(['key' => ['required', 'min:1', 'max:1']], message: ['key.min'=> 'Só pode enviar uma letra por vez','key.max'=> 'Só pode enviar uma letra por vez', 'key.required'=> 'É obrigatório enviar uma letra'])]
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
