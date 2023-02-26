<?php

function up_header_tools_render_cb($atts){
    $user = wp_get_current_user();
    $name = $user->exists() ? $user->user_login : 'Sign in';
    $openClass = $user->exists() ? '' : 'open-modal';

    ob_start();
    ?>
        <!-- Added bootstrap icons, works without head tag -->
        <head>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        </head>
        <div class="wp-block-udemy-plus-header-tools">
        <?php
            if($atts['showAuth']){
        ?>
            <a class="signin-link <?php echo $openClass; ?>" href="#">
                <div class="signin-icon">
                    <i class="bi bi-person-circle"></i>
                </div>
                <div class="signin-text">
                    <small>Hello, <?php echo $name; ?></small>
                        My Account
                </div>
            </a> 
            <?php
                }
            ?>
        </div>
    <?php

    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}