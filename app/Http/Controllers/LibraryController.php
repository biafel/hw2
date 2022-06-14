<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Songs;
use App\Models\User;
use App\Models\ultimi_ascolti;
use App\Models\canzone;
use App\Models\favorites;


class LibraryController extends Controller{

    public function library() {
        if(session('user_id') != null) {

            $last = Songs::get_last();
            $fav = Songs::get_fav();
            return view('libreria', ['last' => $last, 'fav' => $fav]);
        }
        else {
            return view('welcome');
        }
    }

}