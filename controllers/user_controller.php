<?php 
    class UserController{
        public function index(){
            require_once 'models/Movie.php';

            $movies = Movie::getAll();
            $data = array('movies' => $movies);
            ob_start();
            require_once 'views/layout/main.php';
            $content = ob_get_clean();            
            require_once 'views/layout/template.php';
        }
        public function MovieDetail(){
            require_once 'models/Movie.php';
            $movie_id = $_GET['movie_id'];
            $movie = Movie::get($movie_id);
            ob_start();
            require_once 'views/layout/movieDetail.php';
            $content = ob_get_clean();
            require_once 'views/layout/template.php';
        }
        public function SelectShowtime(){
            require_once 'models/Schedule.php';
            $movie_id = $_GET['movie_id'];
            // $schedules = Schedule::getAllByMovieId($movie_id);


            ob_start();
            require_once 'views/layout/selectShowtime.php';
            $content = ob_get_clean();
            require_once 'views/layout/template.php';
        }
        public function Payment(){
            require_once 'models/Schedule.php';
            // $movie_id = $_GET['movie_id'];
            // $schedules = Schedule::getAllByMovieId($movie_id);


            ob_start();
            require_once 'views/layout/payment.php';
            $content = ob_get_clean();
            require_once 'views/layout/template.php';
        }
    }
?>