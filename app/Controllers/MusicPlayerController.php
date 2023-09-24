<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MusicModel;
use App\Models\PlaylistModel;

class MusicPlayerController extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function upload()
    {
        $validationRules = [
            'music_file' => 'uploaded[music_file]|mime_in[music_file,audio/mpeg,audio/ogg,audio/wav]|max_size[music_file,10240]',
        ];

        if(!$this->validate($validationRules)){
            return view('index', ['validation' => $this->validator]);
        }

        $musicFile = $this->request->getFile('music_file');

        if($musicFile->isValid() && !$musicFile->hasMoved()){
            $newFileName = time(). '_'. $musicFile->getName();
            $musicFile->move(ROOTPATH . 'public/uploads', $newFileName);

            $musicModel = new MusicModel();
            $data = [
                'filepath' => 'uploads/' . $newFileName,
            ];

            $musicModel->insert($data);
            return redirect()->to('index');

            return view('index', ['validation' => $this->validator, 'uploadError' => $musicFile->getErrorString()]);
        }
    }

    public function createPlaylist()
    {
        $playlistModel = new PlaylistModel();

        if ($this->request->getMethod() === 'post' && $this->validate(['name' => 'required'])) {
            $playlistName = $this->request->getPost('name');
            $playlistModel->insert(['name' => $playlistName]);
    }
    }

    public function addToPlaylist()
    {

    }

    public function removeFromPlaylist()
    {

    }

    public function search()
    {
        $query = $this->request->getVar('query');

        $musicModel = new MusicModel();
        $results = $musicModel->search($query);

        return view('index', $results);
    }
}
