<?php

function up_admin_menus(){
    add_menu_page(
        __('Udemy Plus', 'udemy-plus'),
        __('Udemy Plus', 'udemy-plus'),
        // check the capability rather than role
        'edit_theme_options',
        'up-plugin-options',
        'up_plugins_options_page',
        plugins_url('letter-u.svg', UP_PLUGIN_FILE)
    );
}