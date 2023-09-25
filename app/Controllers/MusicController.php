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

    public function upload()
    {
        $musicModel = new MusicModel();

        $data = [
            'title' => $this->request->getVar('title'),
            'artist' => $this->request->getVar('artist'),
            'file_path' => $uploadedFilePath,
        ];

        $musicModel->save($data);
    }

    public function search()
    {
        
    }
}
