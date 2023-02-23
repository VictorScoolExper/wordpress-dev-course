<?php

function up_register_blocks(){
    register_block_type( 
        UP_PLUGIN_DIR . 'build/block.json' // we can have access to the file before it 
    );
}