<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'hhcom',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Widgets
	'hhcom\fontawesomecte\IconSelect'              => 'system/modules/hh_fontawesomecte/widgets/IconSelect.php',

	// Elements
	'hhcom\fontawesomecte\ContentIconHeadlineText' => 'system/modules/hh_fontawesomecte/elements/ContentIconHeadlineText.php',

	// Classes
	'hhcom\fontawesomecte\XtndElements'            => 'system/modules/hh_fontawesomecte/classes/XtndElements.php',
	'hhcom\fontawesomecte\ModuleECTHeader'         => 'system/modules/hh_fontawesomecte/classes/ModuleECTHeader.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_ectheader'       => 'system/modules/hh_fontawesomecte/templates/modules',
	'ce_iconheadlinetext' => 'system/modules/hh_fontawesomecte/templates/elements',
));
