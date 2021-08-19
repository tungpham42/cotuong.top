<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::view('/admin{any}', 'admin')
//     ->where('any', '.*');

Route::get('/choi-voi-nhau', function () {
    return view(Controller::getView('human'), ['headTitle' => 'Chơi với nhau', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/play-with-friend'), 'canonicalUrl' => Controller::getUrl('/choi-voi-nhau')]);
});
Route::get('/play-with-friend', function () {
    return view(Controller::getView('en/human'), ['headTitle' => 'Play with friend', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/choi-voi-nhau'), 'canonicalUrl' => Controller::getUrl('/play-with-friend')]);
});

Route::get('/co-the', function () {
  return view(Controller::getView('setup'), ['headTitle' => 'Xếp bàn cờ thế', 'bodyClass' => 'setup', 'board' => '', 'roomCode' => '', 'langUrl' => Controller::getUrl('/set-up'), 'canonicalUrl' => Controller::getUrl('/co-the')]);
});
Route::get('/set-up', function () {
  return view(Controller::getView('en/setup'), ['headTitle' => 'Set up the board', 'bodyClass' => 'setup', 'board' => '', 'roomCode' => '', 'langUrl' => Controller::getUrl('/co-the'), 'canonicalUrl' => Controller::getUrl('/set-up')]);
});

Route::get('/co-the/{board}', function ($board) {
  return view(Controller::getView('setup'), ['headTitle' => 'Xếp bàn cờ thế', 'bodyClass' => 'setup', 'board' => $board, 'roomCode' => '', 'langUrl' => Controller::getUrl('/set-up/'.$board), 'canonicalUrl' => Controller::getUrl('/co-the/'.$board)]);
})->where(['board' => "[a-zA-Z0-9\-\/\s|&nbsp;]+"]);
Route::get('/set-up/{board}', function ($board) {
  return view(Controller::getView('en/setup'), ['headTitle' => 'Set up the board', 'bodyClass' => 'setup', 'board' => $board, 'roomCode' => '', 'langUrl' => Controller::getUrl('/co-the/'.$board), 'canonicalUrl' => Controller::getUrl('/set-up/'.$board)]);
})->where(['board' => "[a-zA-Z0-9\-\/\s|&nbsp;]+"]);

Route::get('/ban-co/{fen}', function ($fen) {
  return view(Controller::getView('board'), ['headTitle' => 'Bàn cờ tự giải', 'bodyClass' => 'home', 'fen' => $fen, 'roomCode' => '', 'langUrl' => Controller::getUrl('/board/'.$fen), 'canonicalUrl' => Controller::getUrl('/ban-co/'.$fen)]);
})->where(['fen' => "[a-zA-Z0-9\-\/\s|&nbsp;]+"]);

Route::get('/ban-co-de-nhat/{fen}', function ($fen) {
  return view(Controller::getView('boardAi'), ['headTitle' => 'Bàn cờ dễ nhất', 'bodyClass' => 'home', 'fen' => $fen, 'roomCode' => '', 'level' => '1', 'levelTxt' => 'Dễ nhất', 'langUrl' => Controller::getUrl('/easiest-board/'.$fen), 'canonicalUrl' => Controller::getUrl('/ban-co-de-nhat/'.$fen)]);
})->where(['fen' => "[a-zA-Z0-9\-\/\s|&nbsp;]+"]);
Route::get('/ban-co-moi-choi/{fen}', function ($fen) {
  return view(Controller::getView('boardAi'), ['headTitle' => 'Bàn cờ mới chơi', 'bodyClass' => 'home', 'fen' => $fen, 'roomCode' => '', 'level' => '1', 'levelTxt' => 'Mới chơi', 'langUrl' => Controller::getUrl('/newbie-board/'.$fen), 'canonicalUrl' => Controller::getUrl('/ban-co-moi-choi/'.$fen)]);
})->where(['fen' => "[a-zA-Z0-9\-\/\s|&nbsp;]+"]);
Route::get('/ban-co-de/{fen}', function ($fen) {
  return view(Controller::getView('boardAi'), ['headTitle' => 'Bàn cờ dễ', 'bodyClass' => 'home', 'fen' => $fen, 'roomCode' => '', 'level' => '2', 'levelTxt' => 'Dễ', 'langUrl' => Controller::getUrl('/easy-board/'.$fen), 'canonicalUrl' => Controller::getUrl('/ban-co-de/'.$fen)]);
})->where(['fen' => "[a-zA-Z0-9\-\/\s|&nbsp;]+"]);
Route::get('/ban-co-binh-thuong/{fen}', function ($fen) {
  return view(Controller::getView('boardAi'), ['headTitle' => 'Bàn cờ bình thường', 'bodyClass' => 'home', 'fen' => $fen, 'roomCode' => '', 'level' => '3', 'levelTxt' => 'Bình thường', 'langUrl' => Controller::getUrl('/normal-board/'.$fen), 'canonicalUrl' => Controller::getUrl('/ban-co-binh-thuong/'.$fen)]);
})->where(['fen' => "[a-zA-Z0-9\-\/\s|&nbsp;]+"]);
Route::get('/ban-co-kho/{fen}', function ($fen) {
  return view(Controller::getView('boardAi'), ['headTitle' => 'Bàn cờ khó', 'bodyClass' => 'home', 'fen' => $fen, 'roomCode' => '', 'level' => '4', 'levelTxt' => 'Khó', 'langUrl' => Controller::getUrl('/hard-board/'.$fen), 'canonicalUrl' => Controller::getUrl('/ban-co-kho/'.$fen)]);
})->where(['fen' => "[a-zA-Z0-9\-\/\s|&nbsp;]+"]);
Route::get('/ban-co-kho-nhat/{fen}', function ($fen) {
  return view(Controller::getView('boardAi'), ['headTitle' => 'Bàn cờ khó nhất', 'bodyClass' => 'home', 'fen' => $fen, 'roomCode' => '', 'level' => '5', 'levelTxt' => 'Khó nhất', 'langUrl' => Controller::getUrl('/hardest-board/'.$fen), 'canonicalUrl' => Controller::getUrl('/ban-co-kho-nhat/'.$fen)]);
})->where(['fen' => "[a-zA-Z0-9\-\/\s|&nbsp;]+"]);

Route::get('/board/{fen}', function ($fen) {
    return view(Controller::getView('en/board'), ['headTitle' => 'Board', 'bodyClass' => 'home', 'fen' => $fen, 'roomCode' => '', 'langUrl' => Controller::getUrl('/ban-co/'.$fen), 'canonicalUrl' => Controller::getUrl('/board/'.$fen)]);
})->where(['fen' => "[a-zA-Z0-9\-\/\s|&nbsp;]+"]);

Route::get('/easiest-board/{fen}', function ($fen) {
    return view(Controller::getView('en/boardAi'), ['headTitle' => 'Easiest board', 'bodyClass' => 'home', 'fen' => $fen, 'roomCode' => '', 'level' => '1', 'levelTxt' => 'Easiest', 'langUrl' => Controller::getUrl('/ban-co-de-nhat/'.$fen), 'canonicalUrl' => Controller::getUrl('/easiest-board/'.$fen)]);
})->where(['fen' => "[a-zA-Z0-9\-\/\s|&nbsp;]+"]);
Route::get('/newbie-board/{fen}', function ($fen) {
    return view(Controller::getView('en/boardAi'), ['headTitle' => 'Newbie board', 'bodyClass' => 'home', 'fen' => $fen, 'roomCode' => '', 'level' => '1', 'levelTxt' => 'Newbie', 'langUrl' => Controller::getUrl('/ban-co-de-nhat/'.$fen), 'canonicalUrl' => Controller::getUrl('/newbie-board/'.$fen)]);
})->where(['fen' => "[a-zA-Z0-9\-\/\s|&nbsp;]+"]);
Route::get('/easy-board/{fen}', function ($fen) {
    return view(Controller::getView('en/boardAi'), ['headTitle' => 'Easy board', 'bodyClass' => 'home', 'fen' => $fen, 'roomCode' => '', 'level' => '2', 'levelTxt' => 'Easy', 'langUrl' => Controller::getUrl('/ban-co-de/'.$fen), 'canonicalUrl' => Controller::getUrl('/easy-board/'.$fen)]);
})->where(['fen' => "[a-zA-Z0-9\-\/\s|&nbsp;]+"]);
Route::get('/normal-board/{fen}', function ($fen) {
    return view(Controller::getView('en/boardAi'), ['headTitle' => 'Normal board', 'bodyClass' => 'home', 'fen' => $fen, 'roomCode' => '', 'level' => '3', 'levelTxt' => 'Normal', 'langUrl' => Controller::getUrl('/ban-co-binh-thuong/'.$fen), 'canonicalUrl' => Controller::getUrl('/normal-board/'.$fen)]);
})->where(['fen' => "[a-zA-Z0-9\-\/\s|&nbsp;]+"]);
Route::get('/hard-board/{fen}', function ($fen) {
    return view(Controller::getView('en/boardAi'), ['headTitle' => 'Hard board', 'bodyClass' => 'home', 'fen' => $fen, 'roomCode' => '', 'level' => '4', 'levelTxt' => 'Hard', 'langUrl' => Controller::getUrl('/ban-co-kho/'.$fen), 'canonicalUrl' => Controller::getUrl('/hard-board/'.$fen)]);
})->where(['fen' => "[a-zA-Z0-9\-\/\s|&nbsp;]+"]);
Route::get('/hardest-board/{fen}', function ($fen) {
    return view(Controller::getView('en/boardAi'), ['headTitle' => 'Hardest board', 'bodyClass' => 'home', 'fen' => $fen, 'roomCode' => '', 'level' => '5', 'levelTxt' => 'Hardest', 'langUrl' => Controller::getUrl('/ban-co-kho-nhat/'.$fen), 'canonicalUrl' => Controller::getUrl('/hardest-board/'.$fen)]);
})->where(['fen' => "[a-zA-Z0-9\-\/\s|&nbsp;]+"]);

Route::get('/', function () {
  return view(Controller::getView('ai'), ['headTitle' => 'Trang chủ', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/en'), 'level' => '3', 'levelTxt' => 'Bình thường', 'canonicalUrl' => Controller::getUrl('/')]);
});
Route::get('/de-nhat', function () {
  return view(Controller::getView('ai'), ['headTitle' => 'Dễ nhất', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/easiest'), 'level' => '1', 'levelTxt' => 'Dễ nhất', 'canonicalUrl' => Controller::getUrl('/de-nhat')]);
});
Route::get('/moi-choi', function () {
    return view(Controller::getView('ai'), ['headTitle' => 'Mới chơi', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/newbie'), 'level' => '1', 'levelTxt' => 'Mới chơi', 'canonicalUrl' => Controller::getUrl('/moi-choi')]);
});
Route::get('/de', function () {
  return view(Controller::getView('ai'), ['headTitle' => 'Dễ', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/easy'), 'level' => '2', 'levelTxt' => 'Dễ', 'canonicalUrl' => Controller::getUrl('/de')]);
});
Route::get('/binh-thuong', function () {
  return view(Controller::getView('ai'), ['headTitle' => 'Bình thường', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/normal'), 'level' => '3', 'levelTxt' => 'Bình thường', 'canonicalUrl' => Controller::getUrl('/binh-thuong')]);
});
Route::get('/kho', function () {
  return view(Controller::getView('ai'), ['headTitle' => 'Khó', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/hard'), 'level' => '4', 'levelTxt' => 'Khó', 'canonicalUrl' => Controller::getUrl('/kho')]);
});
Route::get('/kho-nhat', function () {
  return view(Controller::getView('ai'), ['headTitle' => 'Khó nhất', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/hardest'), 'level' => '5', 'levelTxt' => 'Khó nhất', 'canonicalUrl' => Controller::getUrl('/kho-nhat')]);
});
Route::get('/choi-co-tuong', function () {
  return redirect('/', 301);
});
Route::get('/choi-voi-may', function () {
  return redirect('/', 301);
});
Route::get('/choi-voi-may/de-nhat', function () {
  return redirect('/de-nhat', 301);
});
Route::get('/choi-voi-may/moi-choi', function () {
  return redirect('/moi-choi', 301);
});
Route::get('/choi-voi-may/de', function () {
  return redirect('/de', 301);
});
Route::get('/choi-voi-may/binh-thuong', function () {
  return redirect('/binh-thuong', 301);
});
Route::get('/choi-voi-may/kho', function () {
  return redirect('/kho', 301);
});
Route::get('/choi-voi-may/kho-nhat', function () {
  return redirect('/kho-nhat', 301);
});

Route::get('/en', function () {
  return view(Controller::getView('en/ai'), ['headTitle' => 'Home', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/'), 'level' => '3', 'levelTxt' => 'Normal', 'canonicalUrl' => Controller::getUrl('/en')]);
});
Route::get('/easiest', function () {
  return view(Controller::getView('en/ai'), ['headTitle' => 'Easiest', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/de-nhat'), 'level' => '1', 'levelTxt' => 'Easiest', 'canonicalUrl' => Controller::getUrl('/easiest')]);
});
Route::get('/newbie', function () {
    return view(Controller::getView('en/ai'), ['headTitle' => 'Newbie', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/moi-choi'), 'level' => '1', 'levelTxt' => 'Newbie', 'canonicalUrl' => Controller::getUrl('/newbie')]);
});
Route::get('/easy', function () {
  return view(Controller::getView('en/ai'), ['headTitle' => 'Easy', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/de'), 'level' => '2', 'levelTxt' => 'Easy', 'canonicalUrl' => Controller::getUrl('/easy')]);
});
Route::get('/normal', function () {
  return view(Controller::getView('en/ai'), ['headTitle' => 'Normal', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/binh-thuong'), 'level' => '3', 'levelTxt' => 'Normal', 'canonicalUrl' => Controller::getUrl('/normal')]);
});
Route::get('/hard', function () {
  return view(Controller::getView('en/ai'), ['headTitle' => 'Hard', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/kho'), 'level' => '4', 'levelTxt' => 'Hard', 'canonicalUrl' => Controller::getUrl('/hard')]);
});
Route::get('/hardest', function () {
  return view(Controller::getView('en/ai'), ['headTitle' => 'Hardest', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/kho-nhat'), 'level' => '5', 'levelTxt' => 'Hardest', 'canonicalUrl' => Controller::getUrl('/hardest')]);
});
Route::get('/play-with-ai', function () {
  return redirect('/en', 301);
});
Route::get('/play-with-ai/easiest', function () {
  return redirect('/easiest', 301);
});
Route::get('/play-with-ai/newbie', function () {
  return redirect('/newbie', 301);
});
Route::get('/play-with-ai/easy', function () {
  return redirect('/easy', 301);
});
Route::get('/play-with-ai/normal', function () {
  return redirect('/normal', 301);
});
Route::get('/play-with-ai/hard', function () {
  return redirect('/hard', 301);
});
Route::get('/play-with-ai/hardest', function () {
  return redirect('/hardest', 301);
});

Route::get('/gioi-thieu', function () {
    return view(Controller::getView('about'), ['headTitle' => 'Giới thiệu', 'bodyClass' => 'about', 'roomCode' => '', 'langUrl' => Controller::getUrl('/about-us'), 'canonicalUrl' => Controller::getUrl('/gioi-thieu')]);
});
Route::get('/about-us', function () {
    return view(Controller::getView('en/about'), ['headTitle' => 'About us', 'bodyClass' => 'about', 'roomCode' => '', 'langUrl' => Controller::getUrl('/gioi-thieu'), 'canonicalUrl' => Controller::getUrl('/about-us')]);
});
Route::get('/lien-he', function () {
    return view(Controller::getView('contact'), ['headTitle' => 'Liên hệ', 'bodyClass' => 'contact', 'roomCode' => '', 'langUrl' => Controller::getUrl('/contact-us'), 'canonicalUrl' => Controller::getUrl('/lien-he')]);
});
Route::get('/contact-us', function () {
    return view(Controller::getView('en/contact'), ['headTitle' => 'Contact us', 'bodyClass' => 'contact', 'roomCode' => '', 'langUrl' => Controller::getUrl('/lien-he'), 'canonicalUrl' => Controller::getUrl('/contact-us')]);
});
Route::get('/danh-sach-phong', [
    "uses" => 'RoomController@index',
    "as" => 'index'
]);
Route::get('/rooms', [
    "uses" => 'RoomController@index_en',
    "as" => 'index_en'
]);
Route::get('/phong/{code}', function($code) {
  return view(Controller::getView('roomHost'), ['headTitle' => 'Chủ phòng - Phòng: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => Controller::getUrl('/room/'.$code), 'canonicalUrl' => Controller::getUrl('/phong/'.$code)]);
});
Route::get('/phong/{code}/duoc-moi', function($code) {
  return view(Controller::getView('roomGuest'), ['headTitle' => 'Khách - Phòng: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => Controller::getUrl('/room/'.$code.'/invited'), 'canonicalUrl' => Controller::getUrl('/phong/'.$code.'/duoc-moi')]);
});
Route::get('/phong/{code}/do', function($code) {
  return view(Controller::getView('roomRed'), ['headTitle' => 'Bên đỏ - Phòng: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => Controller::getUrl('/room/'.$code.'/red'), 'canonicalUrl' => Controller::getUrl('/phong/'.$code.'/do')]);
});
Route::get('/phong/{code}/den', function($code) {
  return view(Controller::getView('roomBlack'), ['headTitle' => 'Bên đen - Phòng: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => Controller::getUrl('/room/'.$code.'/black'), 'canonicalUrl' => Controller::getUrl('/phong/'.$code.'/den')]);
});

Route::get('/room/{code}', function($code) {
  return view(Controller::getView('en/roomHost'), ['headTitle' => 'Host - Room: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => Controller::getUrl('/phong/'.$code), 'canonicalUrl' => Controller::getUrl('/room/'.$code)]);
});
Route::get('/room/{code}/invited', function($code) {
  return view(Controller::getView('en/roomGuest'), ['headTitle' => 'Guest - Room: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => Controller::getUrl('/phong/'.$code.'/duoc-moi'), 'canonicalUrl' => Controller::getUrl('/room/'.$code.'/invited')]);
});
Route::get('/room/{code}/red', function($code) {
  return view(Controller::getView('en/roomRed'), ['headTitle' => 'Red side - Room: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => Controller::getUrl('/phong/'.$code.'/do'), 'canonicalUrl' => Controller::getUrl('/room/'.$code.'/red')]);
});
Route::get('/room/{code}/black', function($code) {
  return view(Controller::getView('en/roomBlack'), ['headTitle' => 'Black side - Room: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => Controller::getUrl('/phong/'.$code.'/den'), 'canonicalUrl' => Controller::getUrl('/room/'.$code.'/black')]);
});
Route::post('/createRoom', [
  "uses" => 'RoomController@create',
  "as" => 'create'
]);
Route::get('/getPass/{code}', [
  "uses" => 'RoomController@getPass',
  "as" => 'getPass'
]);
Route::post('/changePass', [
  "uses" => 'RoomController@changePass',
  "as" => 'changePass'
]);
Route::post('/doiPass', [
  "uses" => 'RoomController@doiPass',
  "as" => 'doiPass'
]);
Route::post('/updateFEN', [
  "uses" => 'RoomController@store',
  "as" => 'store'
]);
Route::get('/readFEN/{code}', [
  "uses" => 'RoomController@show',
  "as" => 'show'
]);
Route::post('/processMail', [
  "uses" => 'MailController@send',
  "as" => 'send'
]);
Route::post('/xulyMail', [
  "uses" => 'MailController@gui',
  "as" => 'gui'
]);
Route::prefix('canvas-ui')->group(function () {
    Route::prefix('api')->group(function () {
        Route::get('posts', [\App\Http\Controllers\CanvasUiController::class, 'getPosts']);
        Route::get('posts/{slug}', [\App\Http\Controllers\CanvasUiController::class, 'showPost'])
             ->middleware('Canvas\Http\Middleware\Session');

        Route::get('tags', [\App\Http\Controllers\CanvasUiController::class, 'getTags']);
        Route::get('tags/{slug}', [\App\Http\Controllers\CanvasUiController::class, 'showTag']);
        Route::get('tags/{slug}/posts', [\App\Http\Controllers\CanvasUiController::class, 'getPostsForTag']);

        Route::get('topics', [\App\Http\Controllers\CanvasUiController::class, 'getTopics']);
        Route::get('topics/{slug}', [\App\Http\Controllers\CanvasUiController::class, 'showTopic']);
        Route::get('topics/{slug}/posts', [\App\Http\Controllers\CanvasUiController::class, 'getPostsForTopic']);

        Route::get('users/{id}', [\App\Http\Controllers\CanvasUiController::class, 'showUser']);
        Route::get('users/{id}/posts', [\App\Http\Controllers\CanvasUiController::class, 'getPostsForUser']);
    });

    Route::get('/{view?}', [\App\Http\Controllers\CanvasUiController::class, 'index'])
         ->where('view', '(.*)')
         ->name('canvas-ui');
});


// Route::group(['prefix' => 'admin'], function () {
//     Voyager::routes();
// });
