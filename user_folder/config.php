<?php
session_start();

$conn= new mysqli("localhost", "root", "", "blog_management");

function filter($data, $words){
    GLOBAL $conn;
   						                     									
    $filter_words="";


    $view=strip_tags($data, ['p']);


        $view_content=explode(" ",$view);


        if (str_word_count($data) >= $words) {

            $filter=array();
        
            for($x = 0; $x < $words; $x++) {
            array_push($filter,$view_content[$x]);
            }
            $filter_words=implode(" ",$filter)."...";


        }elseif(str_word_count($data) <= $words) {
            $filter_words=$data;
        }

        $filter_words = str_replace("../blog_manager/images/", "../demos/bt4/blog_manager/images/", $filter_words );
        $filter_words = str_replace("style=", "", $filter_words );
        $filter_words = str_replace("<br>", "", $filter_words );
        $filter_words = str_replace("&nbsp;", "", $filter_words );


    return $filter_words;
};

?>