<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;
// use laravel\Socialite\Facades\Socialite;
use Socialite;

class TwitterController extends Controller
{
    //
    public function test()
    {
        $twitter = new TwitterOAuth(
            config('twitter.consumer_key'),
            config('twitter.consumer_secret'),
            config('twitter.access_token'),
            config('twitter.access_token_secret'),
        );

        // dd($twitter);
        $result = $twitter->post(
            "statuses/update",
            array("status" => "テスト投稿")
        );


        // DBに登録されたitemデータを取得し、サイトリンクと共にtwitterに投稿する。
        // twitterと連携し、そのアカウントでデータを投稿する。
    }


    // テスト 一度目の処理以降、進まない。
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('twitter')->user();

        dd($user);
        // return Socialite::driver('twitter')->user();
    }
}
