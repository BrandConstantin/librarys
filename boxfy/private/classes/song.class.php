<?php

class Song extends DatabaseObject {

    static protected $table_name = 'muzic';
    static protected $db_columns = ['id', 'name_song', 'artist_song', 'url_song', 'likes', 'year'];
    public $id;
    public $name_song;
    public $artist_song;
    public $url_song;
    public $likes;
    public $year;

//        const CATEGORIES = ['Hip-Hop', 'Rock', 'Clasic', 'Romance', 'Pop', 'BMX'];
//    const GENDERS = ['> 18', '< 18'];
//    const CONDITION_OPTIONS = [
//        1 => 'Not sow good',
//        2 => 'Decent',
//        3 => 'Realy like'
//    ];

    public function __construct($args = []) {
        $this->name_song = $args['name_song'] ?? '';
        $this->artist_song = $args['artist_song'] ?? '';
        $this->year = $args['year'] ?? '';
        $this->url_song = $args['url_song'] ?? '';
        $this->likes = $args['likes'] ?? '';
    }

    public function name() {
        return "{$this->artist_song} - {$this->name_song}";
    }

    protected function validate() {
        $this->errors = [];

        if (is_blank($this->artist_song)) {
            $this->errors[] = "Artist song cannot be blank.";
        }
        if (is_blank($this->name_song)) {
            $this->errors[] = "Name song cannot be blank.";
        }
        if (is_blank($this->url_song)) {
            $this->errors[] = "Url song cannot be blank.";
        }
        return $this->errors;
    }

}
