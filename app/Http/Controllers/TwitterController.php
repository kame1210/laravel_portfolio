<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

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

        var_dump($result);

        // DBに登録されたitemデータを取得し、サイトリンクと共にtwitterに投稿する。
        // twitterと連携し、そのアカウントでデータを投稿する。
    }
}
