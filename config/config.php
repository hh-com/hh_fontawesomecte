<?php

/**
 * 
 * @package hh_fontawesome_cte
 * Copyright (C) 2017 Harald Huber
 * http://www.harald-huber.com
 *
*/

# Include font-awesome.css in Frontend and Backend ->
$GLOBALS['TL_CSS'][] = 'system/modules/hh_fontawesomecte/assets/fontawesome/css/font-awesome.min.css||static';
$GLOBALS['TL_CSS'][] = 'system/modules/hh_fontawesomecte/assets/fontawesome/css/font-awesome-social.min.css||static';
                
# Widget
$GLOBALS['BE_FFL']['iconSelect'] = 'hhcom\fontawesomecte\IconSelect';

# Content Elements 	
$GLOBALS['TL_CTE']['contentElements']['IconHeadlineText'] = 'hhcom\fontawesomecte\ContentIconHeadlineText';

# Add FontAwesome to ContentElement List
$GLOBALS['TL_HOOKS']['getContentElement'][] = array('hhcom\fontawesomecte\XtndElements', 'addClass2List');

?>