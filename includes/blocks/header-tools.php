<?php

function up_header_tools_render_cb($atts){
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
            <a class="signin-link open-modal" href="#">
                <div class="signin-icon">
                    <i class="bi bi-person-circle"></i>
                </div>
                <div class="signin-text">
                    <small>Hello, Sign in</small>
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