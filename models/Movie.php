<?php
class Movie{
    public $movie_id;
    public $cate_id;
    public $title;
    public $durations;
    public $image;
    public $rating;
    public $des;
    public $release_date;
    public $url_trailer;

    public function __construct($movie_id,$cate_id,$title,$durations,$image,$rating,$des,$release_date,$url_trailer){
        $this->movie_id = $movie_id;
        $this->cate_id = $cate_id;
        $this->title = $title;
        $this->durations = $durations;
        $this->image = $image;
        $this->rating = $rating;
        $this->des = $des;
        $this->release_date = $release_date;
        $this->url_trailer = $url_trailer;
    }
    public static function insert($movie){
        $conn = DB::getConnection();

        $sql = "insert into movies (`cate_id`,`title`,`durations`,`image`,`rating`,`des`,`release_date`,`url_trailer`) values (:cate_id,:title,:durations,:image,:rating,:des,:release_date,:url_trailer)";
        $stm = $conn->prepare($sql);

        $stm->execute(array('cate_id'=>$movie->cate_id,'title'=>$movie->title,'durations'=>$movie->durations,'image'=>$movie->image,'rating'=>$movie->rating,'des'=>$movie->des,'release_date'=>$movie->release_date,'url_trailer'=>$movie->url_trailer));
        
        return $stm->rowCount() == 1;
    }
    public static function delete($movie_id){
        $conn = DB::getConnection();
        $sql = "delete from movies where movie_id = :movie_id";
        $stm = $conn->prepare($sql);
        $stm->execute(array('movie_id'=>$movie_id));

        return $stm->rowCount() == 1;
    }

    public static function deleteByCateId($cate_id) {
        $sql = "delete from movies where cate_id = :cate_id";
        $conn = DB::getConnection();
        $stm = $conn->prepare($sql);
        $stm->bindValue(':cate_id', $cate_id, PDO::PARAM_INT); 
        $stm->execute();

        return $stm->rowCount() == 1;
    }
    public static function update($movie) {
        $sql = "update movies set cate_id = :cate_id, title = :title, durations = :durations, image = :image, rating = :rating, des = :des, release_date = :release_date, url_trailer = :url_trailer, where movie_id= :movie_id";
        $conn = DB::getConnection();
        $stm = $conn->prepare($sql);
        $stm->execute(array('movie_id'=>$movie->movie_id,'cate_id'=> $movie->cate_id, 'title'=> $movie->title, 'durations'=> $movie->durations, 'image'=> $movie->image, 'rating'=> $movie->rating, 'des'=> $movie->des, 'release_date'=>$movie->release_date, 'url_trailer'=>$movie->url_trailer));

        return $stm->rowCount() == 1;
    }
    public static function getAll() {
        $sql = "select * from movies";
        $conn = DB::getConnection();

        $stm = $conn->query($sql);

        $data = array();
        foreach($stm->fetchAll() as $item) {
            $data[] = new Movie($item['movie_id'], $item['cate_id'], $item['title'], $item['durations'] , $item['image'], $item['rating'], $item['des'], $item['release_date'], $item['url_trailer']);
        }
        return $data;
    }

    public static function get($movie_id) {
        $conn = DB::getConnection();
        $sql = "select * from movies where movie_id = :movie_id";
        $stm = $conn->prepare($sql);
        
        $stm->execute(array('movie_id'=>$movie_id));
      
        if($item = $stm->fetch()) {
            return new Movie($item['movie_id'], $item['cate_id'], $item['title'], $item['durations'] , $item['image'], $item['rating'], $item['des'], $item['release_date'], $item['url_trailer']);
        }

        return null;
    }
}
?>