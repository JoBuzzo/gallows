<?php

use App\Livewire\About;
use App\Livewire\DuoGallows;
use App\Livewire\Gallows;
use App\Livewire\QuadraGallows;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Gallows::class)->name('gallows')
    ->middleware('checkSessionExpiration');
Route::get('/duo', DuoGallows::class)->name('gallows.duo')
    ->middleware('checkSessionExpiration');
Route::get('/quadra', QuadraGallows::class)->name('gallows.quadra')
    ->middleware('checkSessionExpiration');

Route::get('/sobre', About::class)->name('about');





// Route::get('/crawling-words', function () {
//     $httpClient = new \GuzzleHttp\Client();

//     $response = $httpClient->get('https://www.dicio.com.br/palavras-com-v-com-5-letras/');
//     $htmlString = (string) $response->getBody();

//     libxml_use_internal_errors(true);

//     $doc = new DOMDocument();

//     $doc->loadHTML($htmlString);

//     $xpath = new DOMXPath($doc);

//     $data = [];
//     foreach ($xpath->query('//div[@class="col-xs-12 col-md-8 card new-advanced-search-card mb20"]/p') as $paragraph) {
//         foreach ($paragraph->childNodes as $childNode) {
//             if ($childNode->nodeType === XML_TEXT_NODE) {
//                 $word = $childNode->textContent;

//                 if (mb_strlen($word, 'UTF-8') === 5) {
//                     $data[] = $word;
//                 }
//             }

//         }
//     }

//     file_put_contents('files/words5.txt', implode(PHP_EOL, $data));

// });
