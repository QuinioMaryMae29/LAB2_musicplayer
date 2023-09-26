<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MusicModel;
use App\Models\PlaylistModel;

class MusicController extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function playlist()
    {
        echo 'my playlist';
    }

    public function createPlaylist()
    {

    }

    public function search()
    {
        return view('index');
    }

    public function upload()
    {

    }

    public function addToPlaylist()
    {
        
    }

    public function removeFromPlaylist()
    {

    }
}
