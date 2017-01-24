<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('login/fb', function() {
    $facebook = new Facebook(Config::get('facebook'));
    $params = array(
        'redirect_uri' => url('/login/fb/callback'),
        'scope' => 'email',
    );
    return redirect($facebook->getLoginUrl($params));
});


Route::get('login/fb/callback', function() {
    $code = Input::get('code');
    if (strlen($code) == 0) return redirect('/')->with('message', 'There was an error communicating with Facebook');

    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();

    if ($uid == 0) return redirect('/')->with('message', 'There was an error');

    $me = $facebook->api('/me?fields=first_name,last_name,email,id,gender');

    $profile = \App\Profile::whereUid($uid)->first();
    if (empty($profile)) {

        $user = new \App\User();
        $user->name = $me['first_name'].' '.$me['last_name'];
        $user->email = $me['email'];
        $user->gender = $me['gender'];
        $user->photo = 'https://graph.facebook.com/'.$me['id'].'/picture?type=large';

        $user->save();

        $profile = new \App\Profile();
        $profile->uid = $uid;
        $profile = $user->profiles()->save($profile);
    }

    $profile->access_token = $facebook->getAccessToken();
    $profile->save();

    $user = $profile->user;

    Auth::login($user);

    return redirect('/')->with('message', 'Logged in with Facebook');
});

Route::get('/', function()
{
    $data = array();

    if (Auth::check()) {
        $data = Auth::user();
    }
    return View::make('user', array('data'=>$data));
});

Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/');
});