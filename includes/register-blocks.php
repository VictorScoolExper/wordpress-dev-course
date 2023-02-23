<?php

function up_register_blocks(){
    $blocks = [
        [ 'name' => 'fancy-header' ]
    ];

    foreach($blocks as $block){
        register_block_type( 
            UP_PLUGIN_DIR . 'build/blocks/' . $block['name'] // we can have access to the file before it 
        );
    } 
}