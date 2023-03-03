<?php
// this makes the image available
function up_custom_image_sizes($sizes){
    // merge the two arrays
    return array_merge($sizes, [
        'teamMember' => __('Team Member', 'udemy-plus')
    ]);
}