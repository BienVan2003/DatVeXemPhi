<?php
class Schedule{
    public $schedule_id;
    public $movie_id;
    public $start_time;
    public $end_time;
    public $ticket_price;
    public $hall_branch_id;

    public function __construct($schedule_id,$movie_id,$start_time,$end_time,$ticket_price,$hall_branch_id){
        $this->schedule_id = $schedule_id;
        $this->movie_id = $movie_id;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->ticket_price = $ticket_price;
        $this->hall_branch_id = $hall_branch_id;
    }
    public static function insert($schedule){
        $conn = DB::getConnection();

        $sql = "insert into schedules (`movie_id`,`start_time`,`end_time`,`ticket_price`,`hall_branch_id`) values (:movie_id,:start_time,:end_time,:ticket_price,:hall_branch_id)";
        $stm = $conn->prepare($sql);

        $stm->execute(array('movie_id'=>$schedule->movie_id,'start_time'=>$schedule->start_time,'end_time'=>$schedule->end_time,'ticket_price'=>$schedule->ticket_price,'hall_branch_id'=>$schedule->hall_branch_id));
        
        return $stm->rowCount() == 1;
    }
    public static function delete($schedule_id){
        $conn = DB::getConnection();
        $sql = "delete from schedules where schedule_id = :schedule_id";
        $stm = $conn->prepare($sql);
        $stm->execute(array('schedule_id'=>$schedule_id));

        return $stm->rowCount() == 1;
    }

    public static function deleteByMovieId($movie_id) {
        $sql = "delete from schedules where movie_id = :movie_id";
        $conn = DB::getConnection();
        $stm = $conn->prepare($sql);
        $stm->bindValue(':movie_id', $movie_id, PDO::PARAM_INT); 
        $stm->execute();

        return $stm->rowCount() == 1;
    }
    public static function update($schedule) {
        $sql = "update schedules set movie_id = :movie_id, start_time = :start_time, end_time = :end_time, ticket_price = :ticket_price, hall_branch_id = :hall_branch_id where schedule_id= :schedule_id";
        $conn = DB::getConnection();
        $stm = $conn->prepare($sql);
        $stm->execute(array('schedule_id'=>$schedule->schedule_id,'movie_id'=>$schedule->movie_id,'start_time'=>$schedule->start_time,'end_time'=>$schedule->end_time,'ticket_price'=>$schedule->ticket_price,'hall_branch_id'=>$schedule->hall_branch_id));

        return $stm->rowCount() == 1;
    }
    public static function getAll() {
        $sql = "select * from schedules";
        $conn = DB::getConnection();

        $stm = $conn->query($sql);

        $data = array();
        foreach($stm->fetchAll() as $item) {
            $data[] = new Schedule($item['schedule_id'], $item['movie_id'], $item['start_time'], $item['end_time'] , $item['ticket_price'], $item['hall_branch_id']);
        }
        return $data;
    }

    public static function get($schedule_id) {
        $conn = DB::getConnection();
        $sql = "select * from schedules where schedule_id = :schedule_id";
        $stm = $conn->prepare($sql);
        
        $stm->execute(array('schedule_id'=>$schedule_id));
      
        if($item = $stm->fetch()) {
            return new Schedule($item['schedule_id'], $item['movie_id'], $item['start_time'], $item['end_time'] , $item['ticket_price'], $item['hall_branch_id']);
        }

        return null;
    }

    public static function getAllByMovieId($movie_id) {
        $conn = DB::getConnection();
        $sql = "select * from schedules where movie_id = :movie_id";

        $stm = $conn->prepare($sql);
        $stm->bindValue(':movie_id', $movie_id, PDO::PARAM_INT); 
        $stm->execute();

        $data = array();
        foreach($stm->fetchAll() as $item) {
            $data[] = new Schedule($item['schedule_id'], $item['movie_id'], $item['start_time'], $item['end_time'] , $item['ticket_price'], $item['hall_branch_id']);
        }
        return $data;
    }
}
?>