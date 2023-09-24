<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlists</title>
</head>
<body>
    <h1>Playlists</h1>

    <ul>
        <?php foreach($playlists as $playlist): ?>
            <li>
                <a href="/music/viewPlaylist/<?= $playlist->id; ?>">
                    <?= $playlist->name; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <form action="/createPlaylist" method="post">
        <input type="text" name="name" placeholder="Enter playlist name" required>
        <button type="submit">Create Playlist</button>
    </form>
</body>
</html>