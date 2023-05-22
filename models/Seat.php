<?php 
    class Seat{
        public $seat_id;
        public $type_seat;
        public $seat_number;
        public $rows_number;
        public function __construct($seat_id,$type_seat,$seat_number,$rows_number){
            $this->seat_id = $seat_id;
            $this->type_seat = $type_seat;
            $this->seat_number = $seat_number;
            $this->rows_number = $rows_number;
        }
        
    }
?>