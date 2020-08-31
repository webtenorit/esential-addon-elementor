<!--<div id="general" class="eael-settings-tab active">
    <div class="row eael-admin-general-wrapper">
        <div class="eael-admin-general-inner">
            <div class="eael-admin-block-wrapper">
                    <?php /*
                        do_action('add_admin_license_markup');

                        if( !defined('EAEL_PRO_PLUGIN_BASENAME') ) :
                    ?>
                    <div class="eael-admin-block eael-admin-block-banner">
                        <a href="https://essential-addons.com/elementor/" target="_blank">
                            <img class="eael-preview-img" src="<?php echo EAEL_PLUGIN_URL . 'assets/admin/images/eael-featured.png'; ?>" alt="essential-addons-for-elementor-featured">
                        </a>
                    </div><!--preview image end--
                    <?php endif; ?>

                    <div class="eael-admin-block eael-admin-block-docs">
                        <header class="eael-admin-block-header">
                            <div class="eael-admin-block-header-icon">
                                <img src="<?php echo EAEL_PLUGIN_URL . 'assets/admin/images/icon-documentation.svg'; ?>" alt="essential-addons-for-elementor-documentation">
                            </div>
                            <h4 class="eael-admin-title"><?php _e('Documentation', 'pixerex-elements'); ?></h4>
                        </header>
                        <div class="eael-admin-block-content">
                            <p><?php _e('Get started by spending some time with the documentation to get familiar with Essential Addons. Build awesome websites for you or your clients with ease.', 'pixerex-elements'); ?></a></p>
                            <a href="https://essential-addons.com/elementor/docs/" class="ea-button" target="_blank"><?php _e('Documentation', 'pixerex-elements'); ?></a>
                        </div>
                    </div>
                    <div class="eael-admin-block eael-admin-block-contribution">
                        <header class="eael-admin-block-header">
                            <div class="eael-admin-block-header-icon">
                                <img src="<?php echo EAEL_PLUGIN_URL . 'assets/admin/images/icon-contribute.svg'; ?>" alt="">
                            </div>
                            <h4 class="eael-admin-title"><?php _e('Contribute to Essential Addons', 'pixerex-elements'); ?></h4>
                        </header>
                        <div class="eael-admin-block-content">
                            <p><?php _e('You can contribute to make Essential Addons better reporting bugs, creating issues, pull requests at', 'pixerex-elements'); ?> <a href="https://github.com/rupok/pixerex-elements/" target="_blank"><?php _e('Github.', 'pixerex-elements'); ?></a></p>
                            <a href="https://github.com/rupok/pixerex-elements/issues/new" class="ea-button" target="_blank"><?php _e('Report a bug', 'pixerex-elements'); ?></a>
                        </div>
                    </div>
                    <div class="eael-admin-block eael-admin-block-support">
                        <header class="eael-admin-block-header">
                            <div class="eael-admin-block-header-icon">
                                <img src="<?php echo EAEL_PLUGIN_URL . 'assets/admin/images/icon-need-help.svg'; ?>" alt="essential-addons-get-help">
                            </div>
                            <h4 class="eael-admin-title"><?php _e('Need Help?', 'pixerex-elements'); ?></h4>
                        </header>
                        <div class="eael-admin-block-content">

                        <?php if( !defined('EAEL_PRO_PLUGIN_BASENAME') ): ?>
                            <p><?php _e('Stuck with something? Get help from the community on', 'pixerex-elements'); ?> <a href="https://wordpress.org/support/plugin/pixerex-elements/" target="_blank"><?php _e('WordPress.org Forum', 'pixerex-elements'); ?></a> <?php _e('or', 'pixerex-elements'); ?> <a href="https://www.facebook.com/groups/essentialaddons/" target="_blank"><?php _e('Facebook Community.', 'pixerex-elements'); ?></a> <?php _e('In case of emergency, initiate a live chat at', 'pixerex-elements'); ?> <a href="https://essential-addons.com/elementor/" target="_blank"><?php _e('Essential Addons website.', 'pixerex-elements'); ?></a></p>
                            <a href="http://wpdeveloper.net/support/" class="ea-button" target="_blank"><?php _e('Get Support', 'pixerex-elements'); ?></a>
                        <?php
                            else:
                                do_action('eael_premium_support_link');
                            endif;
                        ?>

                        </div>
                    </div>

                    <?php if( !defined('EAEL_PRO_PLUGIN_BASENAME') )  : ?>
                    <div class="eael-admin-block eael-admin-block-review">
                        <header class="eael-admin-block-header">
                            <div class="eael-admin-block-header-icon">
                                <img src="<?php echo EAEL_PLUGIN_URL . 'assets/admin/images/icon-show-love.svg'; ?>" alt="rate-essential-addons">
                            </div>
                            <h4 class="eael-admin-title"><?php _e('Show your Love', 'pixerex-elements'); ?></h4>
                        </header>
                        <div class="eael-admin-block-content">
                            <p><?php _e('We love to have you in Essential Addons family. We are making it more awesome everyday. Take your 2 minutes to review the plugin and spread the love to encourage us to keep it going.', 'pixerex-elements'); ?></p>

                            <a href="https://wpdeveloper.net/review-essential-addons-elementor" class="review-flexia ea-button" target="_blank"><?php _e('Leave a Review', 'pixerex-elements'); ?></a>
                        </div>
                    </div>
                    <?php
                        else :
                            do_action('eael_additional_support_links');
                        endif;
                    ?>
            </div><!--admin block-wrapper end--
        </div>
        <div class="eael-admin-sidebar">
            <div class="eael-sidebar-block">
                <div class="eael-admin-sidebar-logo">
                    <img src="<?php echo EAEL_PLUGIN_URL . 'assets/admin/images/icon-ea-logo.svg'; ?>" alt="essential-addons-for-elementor">
                </div>
                <div class="eael-admin-sidebar-cta">
                    <?php
                        if( !defined('EAEL_PRO_PLUGIN_BASENAME') ) {
                            printf( __( '<a href="https://wpdeveloper.net/in/upgrade-essential-addons-elementor" target="_blank">%s</a>', 'pixerex-elements'), 'Upgrade to Pro' );
                        }else {
                            do_action('eael_manage_license_action_link');
                        }
                    ?>
                </div>
            </div>
        </div>admin sidebar end--
    </div><!--Row end
</div>
-->