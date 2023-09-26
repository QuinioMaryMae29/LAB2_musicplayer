<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
        background-color: #f5f5f5;
        padding: 20px;
     }

     h1 {
        color: #333;
     }

     #player-container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
     }

     audio {
        width: 100%;
     }

     #playlist {
        list-style: none;
        padding: 0;
     }

     #playlist li {
        cursor: pointer;
        padding: 10px;
        background-color: #eee;
        margin: 5px 0;
        transition: background-color 0.2s ease-in-out;
     }

     #playlist li:hover {
        background-color: #ddd;
     }

     #playlist li.active {
        background-color: #007bff;
        color: #fff;
     }
    </style>
</head>
<body>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <br>
              <a href="/playlist">Your playlist</a>
        </div>
        <div class="modal-footer">
          <a href="#" data-bs-dismiss="modal">Close</a>
          <a href="#" data-bs-toggle="modal" data-bs-target="#createPlaylist">Create New</a>
        </div>
      </div>
    </div>
  </div>
  <form action="/search" method="get">
    <input type="text" name="search" placeholder="Search song">
    <button type="submit" class="btn btn-primary">Search</button>
  </form>
    <h1>Music Player</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  My Playlist
  </button>
  <h5>Upload Music</h5>
  <form action="/index" method="get">
     <label for="music_file">Choose a music file: </label>
     <input type="file" name="music_file"><br>
     <button type="submit">Upload</button>
  </form>
    <audio id="audio" controls autoplay></audio>
    <ul id="playlist">
        <li data-src="/your music src">Music name
        </li>
    </ul>
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Select from playlist</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
          <form action="/" method="post">
            <input type="hidden" id="musicID" name="musicID">
            <select  name="playlist" class="form-control" >
              <option value="playlist">playlist</option>
            </select>
            <input type="submit" name="add">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script>
    $(document).ready(function () {
  const modal = $("#myModal");
  const modalData = $("#modalData");
  const musicID = $("#musicID");
  function openModalWithData(dataId) {
    modalData.text("Data ID: " + dataId);
    musicID.val(dataId);
    modal.css("display", "block");
  }
  modal.click(function (event) {
    if (event.target === modal[0] || $(event.target).hasClass("close")) {
      modal.css("display", "none");
    }
  });
});
    </script>
    <script>
        const audio = document.getElementById('audio');
        const playlist = document.getElementById('playlist');
        const playlistItems = playlist.querySelectorAll('li');

        let currentTrack = 0;

        function playTrack(trackIndex) {
            if (trackIndex >= 0 && trackIndex < playlistItems.length) {
                const track = playlistItems[trackIndex];
                const trackSrc = track.getAttribute('data-src');
                audio.src = trackSrc;
                audio.play();
                currentTrack = trackIndex;
            }
        }
        function nextTrack() {
            currentTrack = (currentTrack + 1) % playlistItems.length;
            playTrack(currentTrack);
        }

        function previousTrack() {
            currentTrack = (currentTrack - 1 + playlistItems.length) % playlistItems.length;
            playTrack(currentTrack);
        }

        playlistItems.forEach((item, index) => {
            item.addEventListener('click', () => {
                playTrack(index);
            });
        });

        audio.addEventListener('ended', () => {
            nextTrack();
        });

        playTrack(currentTrack);
    </script>
</body>
</html>