<div id="main">
  <div id="nav">
    <ul>
      <li><a href="#">Movie</a></li>
      <li><a href="#">Cinemas</a></li>
      <li><a href="#">Promotion</a></li>
      <li><a href="#">News & Activities</a></li>
      <li><a href="#">Contact us</a></li>
    </ul>
  </div>
  <div id="description">
    <div class="content">
      <div style="box-sizing: content-box;" id="movie-image">
        <img src="assets/images/<?= $movie->image ?>" />
      </div>
      <div id="middle">
        <div id="movie-title"> <?= $movie->title ?> </div>
        <div id="movie-datetime"> <?= $movie->release_date ?> <br /> <?= $movie->durations ?></div>
        <div id="movie-genre">Action, Sci-fi, Superhero, Comedy</div>
        <div id="movie-description"> <?= $movie->des ?></div>
        <div id="btnShowtime">
          <a style="display: inline" href="?controller=user&action=SelectShowtime&movie_id=<?= $movie_id ?>">Đặt vé</a>
        </div>
      </div>
      <div id="movie-screen-types">
        <img src="assets/images/4DX_2019_logo.svg.png" alt="" />
        <img src="assets/images/pngegg.png" alt="" />
      </div>
    </div>

  </div>
  <div class="trialer"><?= $movie->url_trailer ?></div>
</div>