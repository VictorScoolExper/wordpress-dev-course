<?php

function up_save_cuisine_meta($termID){
    // references our form in cuisine posts
    if(!isset($_POST['up_more_info_url'])){
        return;
    }

    update_term_meta( // this function adds meta data of it does not exist
        $termID, 
        'more_info_url', // name for the metadata
        sanitize_url($_POST['up_more_info_url']) //value should be sanitized beofre entering data
    );
}