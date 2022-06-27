<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\ultimi_ascolti;
use App\Models\favorites;

class Songs extends Controller{

    public static function get_last() {
       
        return ultimi_ascolti::select('img', 'url')->where('id_user', Session::get('user_id'))->get();

    }

    public static function get_fav() {
       
        return favorites::select('img', 'url')->where('id_user', Session::get('user_id'))->get();

    }

    public static function add_last($img, $url) {

        $LastRep = new ultimi_ascolti();

        $LastRep->id_user = Session::get('user_id');

        $LastRep->img = "https://i.scdn.co/image/".$img;

        $LastRep->url = "https://open.spotify.com/album/".$url;

        $LastRep->save();
    }


    public static function add_fav($img, $url) {

        $newFav = new favorites();

        $newFav->id_user = Session::get('user_id');

        $newFav->img = "https://i.scdn.co/image/".$img;

        $newFav->url = "https://open.spotify.com/album/".$url;

        $newFav->save();
    }

    public static function rem_fav($img, $url) {

        $img = "https://i.scdn.co/image/".$img;

        $url = "https://open.spotify.com/album/".$url;

        $deleteFav = favorites::select("*")->where('id_user', Session::get('user_id'))->where('img', $img)->where('url', $url)->delete();
    }

    public static function all_fav() {

        return favorites::all();

    }

    public static function get_serch_song($title) /* per API spotify*/
    {
        $token = Http::asForm()->withHeaders([
            'Authorization' => 'Basic '.base64_encode(env('SPOTIFY_CLIENT_ID').':'.env('SPOTIFY_CLIENT_SECRET')),
        ])->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
        ]);

        if ($token->failed()) abort(500);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$token['access_token']
        ])->get('https://api.spotify.com/v1/search', [
            'type' => 'track',
            'q' => $title
        ]);
        if($response->failed()) abort(500);

        return $response->body();
    }

    public static function get_serch_lyrics($name_artist, $name_song) /* per API testo*/
    {
        $url = "https://api.lyrics.ovh/v1/".$name_artist."/".$name_song;

        print_r(Http::get($url)->body());
    }

}
