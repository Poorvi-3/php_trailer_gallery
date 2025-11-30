<?php
if(!isset($_GET['genre'])){
    header("Location:homepage.php");
    exit;
}
include "movies.php";
$genre = isset($_GET['genre']) ? $_GET['genre'] : null;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Movie Website - PHP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav>
        <h1 class="logo">DIVINE MOVIES</h1>
    </nav>

    <div class="container">

        <h1 class="main-title">🎬 Movie Library</h1>

        <h2>Select Genre</h2>

        <div class="genre-buttons">
            <a href="index.php?genre=Action" class="btn">Action</a>
            <a href="index.php?genre=Comedy" class="btn">Comedy</a>
            <a href="index.php?genre=Romance" class="btn">Romance</a>
            <a href="index.php?genre=Horror" class="btn">Horror</a>
            <a href="index.php?genre=Superhero" class="btn">Superhero</a>
        </div>

        <hr>

        <?php if ($genre): ?>
            <h2><?= $genre ?> Movies</h2>

            <div class="movie-grid">

                <?php foreach ($movies as $movie): ?>
                    <?php if ($movie["genre"] == $genre): ?>
                        <div class="movie-card">

                            <img src="<?= $movie['img'] ?>"
                                 onerror="this.src='https://via.placeholder.com/300x400?text=No+Image';">

                            <h3><?= $movie["title"] ?></h3>

                            <p class="caption"><?= $movie["caption"] ?></p>

                            <a href="<?= $movie["link"] ?>" target="_blank" class="trailer-btn">
                                ▶ Watch Trailer
                            </a>

                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>

        <?php else: ?>
            <h3 class="select-message">Please select a genre to view movies.</h3>
        <?php endif; ?>

    </div>
</body>
</html>