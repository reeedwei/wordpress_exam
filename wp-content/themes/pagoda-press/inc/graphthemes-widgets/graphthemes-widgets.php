<?php


if( ! defined( 'PAGODA_PRESS_WIDGET_PATH' ) ) {
    define( 'PAGODA_PRESS_WIDGET_PATH', dirname( __FILE__ ) );
}


/**
* Author Profile Widget.
*/
require_once PAGODA_PRESS_WIDGET_PATH . '/includes/class-graphthemes-widget-functions.php';

require_once PAGODA_PRESS_WIDGET_PATH . '/includes/widgets/widget-author-profile.php';

require_once PAGODA_PRESS_WIDGET_PATH . '/includes/widgets/widget-recent-posts.php';

require_once PAGODA_PRESS_WIDGET_PATH . '/includes/widgets/widget-popular-posts.php';