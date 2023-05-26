<div id="main">
    <div id="nav-seat">
        <ul>
            <li><a href="#">CHỌN SUẤT CHIẾU</a></li>
            <li><a href="#">CHỌN GHẾ</a></li>
            <li><a href="#">RESERVE | BUY</a></li>
        </ul>
    </div>
    <div id="select-showtime-details">
        <?php
        $connection = new mysqli(HOST, USER, PASS, DB);

        // Kiểm tra kết nối thành công hay không
        if ($connection->connect_error) {
            die("Kết nối cơ sở dữ liệu thất bại: " . $connection->connect_error);
        }

        $connection->set_charset("utf8");

        $id = $_REQUEST['movie_id'];
        $count = 1;
        $sql_time = 'SELECT DISTINCT date(start_time) 
            FROM schedules sd 
            JOIN branches_halls bh on bh.hall_branch_id = sd.hall_branch_id 
            JOIN branches b on bh.branch_id = b.branch_id 
            WHERE sd.movie_id =' . $id . ' AND end_time > NOW() LIMIT 3';
        $result_time = $connection->query($sql_time);
        while ($time = $result_time->fetch_assoc()) {
            $s_time = $time['date(start_time)'];
        ?>
            <div id="showtime-details">

                <?php
                $sql_branch = "SELECT distinct branch_name,bh.branch_id 
                    FROM schedules sd 
                    JOIN branches_halls bh on bh.hall_branch_id = sd.hall_branch_id 
                    JOIN branches b on bh.branch_id = b.branch_id
                    WHERE sd.movie_id =$id AND end_time > NOW() AND date(start_time) ='$s_time'";
                $result_branch = $connection->query($sql_branch);
                while ($branch = $result_branch->fetch_assoc()) { ?>
                    <div class="widget">
                        <div class="all logo">
                            <div id="logo">
                                <img src="assets/images/bird-logo.png" alt="">
                            </div>
                        </div>
                        <?php
                        $branch_name = $branch['branch_name'];
                        $sql_hall = "SELECT distinct hall_name 
                            from halls h 
                            join branches_halls bh on h.hall_id = bh.hall_id 
                            join schedules sd on sd.hall_branch_id = bh.hall_branch_id 
                            join branches b on bh.branch_id = b.branch_id
                            WHERE sd.movie_id = $id and end_time > now() and b.branch_name = '$branch_name' AND date(start_time) ='$s_time'";
                        $result_hall = $connection->query($sql_hall);
                        ?>
                        <div class="schedule-list">
                            <div style="height: 50px;" class="location"><?= $branch_name . " ( " . $s_time . ")" ?></div>
                            <div class="theatre-list">
                                <?php
                                while ($hall = $result_hall->fetch_assoc()) {
                                    $hall_name = $hall['hall_name']; ?>
                                    <div class="theatre"><?= $hall_name ?></div>
                                    <ul>
                                        <?php
                                        $sql_st = "SELECT start_time ,sd.schedule_id 
                                            FROM schedules sd 
                                            JOIN branches_halls bh ON sd.hall_branch_id = bh.hall_branch_id 
                                            JOIN branches b ON b.branch_id=bh.branch_id
                                            JOIN halls h ON h.hall_id=bh.hall_id  
                                            WHERE movie_id=$id AND start_time>NOW() AND branch_name='$branch_name' AND hall_name='$hall_name' AND date(start_time) ='$s_time'";
                                        $result_start_time = $connection->query($sql_st);
                                        if ($result_start_time->num_rows > 0) {
                                            while ($st = $result_start_time->fetch_assoc()) { ?>
                                                <li><a id="<?= $count ?>" <?php $sdBooked = $st['schedule_id']; ?> value="<?=  $sdBooked ?>" href="?controller=user&action=Payment&schedule_id=<?= $sdBooked ?>">
                                                <?php $time = $st['start_time'];
                                                                                                                                                                                                                                $count += 1;
                                                                                                                                                                                                                                echo date('h:i a', strtotime($time)); ?></a></li>
                                        <?php
                                            }
                                        }   ?>
                                    </ul>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php

                }
                ?>
            </div><?php } ?>
    </div>
</div>