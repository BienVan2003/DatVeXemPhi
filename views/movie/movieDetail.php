<div id="main">

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
          <!-- <a id="Submit" style="display: inline" href="">Đặt vé</a> -->
          <!-- <button type="button" id="Submit" class="btn btn-primary">Đặt vé</button> -->
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
