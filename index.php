<?php

class Movie {

    public $title;
    public $genre;
    public $year;
    public $vote;
    public $review;

    public function __construct($title, $year){
        $this->title = $title;
        $this->year = $year;
    }

    public function setReview($review, $vote){
        $this->review = $review;

        if($vote > 5) {
            $vote = 5;
        } elseif($vote < 0) {
            $vote = 0;
        }
        $this->vote = $vote . '/5';
    }

    public function setGenre(){
        $genres = [];

        for($i=0; $i <func_num_args(); $i++) {
            array_push($genres, func_get_arg($i));
        }
        $this->genre = $genres;
    }

    public function getMovie() {
        echo '<h1>' . $this->title .' '. $this->vote .'</h1>';
        echo '<h3>' . $this->year . '</h3>';
        echo '<div>';
        foreach($this->genre as $genre){
            echo $genre . ' ';
        }
        echo '</div>';
        echo '<p>' . $this->review . '</p>';
    }

}

$oldBoy = new Movie('Old Boy', '2003');
$oldBoy->setReview('I would give this movie 6 stars if I could', 6);
$oldBoy->setGenre('noir', 'action', 'thriller');

$theGodfather = new Movie('The Godfather', '1972');
$theGodfather->setReview('One of the best films of all time, an absolute masterpiece', 5);
$theGodfather->setGenre('crime', 'mafia');


$oldBoy->getMovie();
$theGodfather->getMovie();

?>