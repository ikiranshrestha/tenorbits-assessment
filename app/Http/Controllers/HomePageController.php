<?php

namespace App\Http\Controllers;

use App\Http\Controllers\APIs\YtPlaylistController;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $playlistItems = YtPlaylistController::fetchPlaylists();
        return view('welcome', ['playlistItems' => $playlistItems]);
    }


    public function home()
    {
        $playlistItems = YtPlaylistController::fetchPlaylists();
        return view('welcome', ['playlistItems' => $playlistItems]);
    }
}
