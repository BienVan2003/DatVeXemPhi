<main>
    <article>
        <section class="upcoming">
            <div class="container">
                <div class="title-wrapper">
                    <p class="section-subtitle">Trong tháng 6 tới</p>
                    <h2 class="h2 section-title">PHIM ĐANG CHIẾU</h2>
                </div>
                <ul class="filter-list">
                    <li>
                        <button class="filter-btn">Hành động</button>
                    </li>

                    <li>
                        <button class="filter-btn">Kinh dị</button>
                    </li>

                    <li>
                        <button class="filter-btn">Phim tài liệu</button>
                    </li>

                    <li>
                        <button class="filter-btn">Khoa học viễn tưởng</button>
                    </li>
                </ul>
                <ul class="movies-list">
                    <?php foreach ($data["movies"] as $row) { ?>
                        <!-- Bumble bee starts here -->
                        <li>
                            <div class="movie-card">
                                <a href="?controller=user&action=MovieDetail&movie_id=<?= $row->movie_id ?>">
                                    <figure class="card-banner">
                                        <img src="assets/images/<?= $row->image ?>">
                                    </figure>
                                </a>

                                <div class="title-wrapper">
                                    <a href="">
                                        <h3 class="card-title"><?= $row->title ?></h3>
                                    </a>

                                    <time>
                                        <?php
                                        $release_date = $row->release_date;
                                        $formatted_date = date('Y', strtotime($release_date));
                                        echo $formatted_date;
                                        ?>
                                    </time>

                                </div>

                                <div class="card-meta">
                                    <div class="badge badge-outline">Up to IMAX</div>

                                    <div class="duration">
                                        <ion-icon name="time-outline"></ion-icon>

                                        <time datetime="PT122M"><?= $row->durations ?></time>
                                    </div>

                                    <div class="rating">
                                        <ion-icon name="star"></ion-icon>
                                        <data><?php $rating = $row->rating;
                                                if ($rating == "") {
                                                    echo "N/A";
                                                } else {
                                                    echo $rating;
                                                } ?></data>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </section>
    </article>
</main>