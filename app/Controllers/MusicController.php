<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Model\MusicModel;
use App\Model\PlaylistModel;

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
        $musicModel = new MusicModel();

        $title = $this->request->getVar('title');
        $artist = $this->request->getVar('artist');
        $musicFile = $this->request->getFile('music_file');

        if($musicFile->isValid() && !$musicFile->hasMoved()){
            $uploadDir = WRITEPATH . 'uploads/';
            $fileName = $musicFile->getRandomName();
            $musicFile->move($uploadDir, $fileName);

            $data = [
                'title' => $title,
                'artist' => $artist,
                'file_path' => 'uploads/' . $fileName,
            ];

            $musicModel->insert($data);

            return redirect()->to('/index');
        }
    }

    public function addToPlaylist()
    {
        
    }

    public function removeFromPlaylist()
    {

    }
}
