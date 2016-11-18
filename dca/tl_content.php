<?php

/**
 * 
 * @package hh_fontawesomecte
 * Copyright (C) 2017 Harald Huber
 * http://www.harald-huber.com
 *
*/


 /* Icon Headline */
$GLOBALS['TL_DCA']['tl_content']['palettes']['IconHeadlineText'] = '{type_legend},type,headline;{icon_legend},iconSelect,floating,centerIcon,iconSize,iconRotate;{link_legend},url,target;{text_legend},text;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';

$GLOBALS['TL_DCA']['tl_content']['fields']['iconSelect'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['iconSelect'],
	'exclude'                 => true,
	'inputType'               => 'iconSelect',
	'sql'                     => "varchar(56) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['centerIcon'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['centerIcon'],
	'exclude'                 => true,
	'filter'                  => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['iconSize'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['iconSize'],
	'default'                 => 100,
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array(200,150,100,80,60),
	'reference'               => &$GLOBALS['TL_LANG']['tl_content']['iconSizeOption'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "int(10) unsigned NOT NULL default '100'"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['iconRotate'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['iconRotate'],
	'exclude'                 => true,
	'filter'                  => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

 /* Separator / Stripline */
$GLOBALS['TL_DCA']['tl_content']['palettes']['ECTStripline'] = '{type_legend},type;{expert_legend:hide},guests,invisible,cssID,space';

$GLOBALS['TL_DCA']['tl_content']['fields']['floating']['load_callback'][] = array('tl_content_ect_ext', 'changeLangText');
$GLOBALS['TL_DCA']['tl_content']['fields']['text']['load_callback'][] = array('tl_content_ect_ext', 'removeTextMandatory');
$GLOBALS['TL_DCA']['tl_content']['fields']['url']['load_callback'][] = array('tl_content_ect_ext', 'removeTextMandatory');

/* Add FontIcon to Contentelement List*/
$GLOBALS['TL_DCA']['tl_content']['palettes']['list'] = str_replace('listitems;', 'listitems;{icon_legend},iconShow,iconSelect;', $GLOBALS['TL_DCA']['tl_content']['palettes']['list']);

$GLOBALS['TL_DCA']['tl_content']['fields']['iconShow'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['iconShow'],
	'exclude'                 => true,
	'filter'                  => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

class tl_content_ect_ext extends Backend
{
    public function changeLangText($varValue, DataContainer $dc)
    {
            if($dc->activeRecord->type == "IconHeadlineText")
            {
                    $GLOBALS['TL_DCA']['tl_content']['fields']['floating']['label'] = $GLOBALS['TL_LANG']['tl_content']['iconFloating'];
            }
            return $varValue;
    }
    public function removeTextMandatory($varValue, DataContainer $dc)
    {
            if($dc->activeRecord->type == "IconHeadlineText")
            {
                    $GLOBALS['TL_DCA']['tl_content']['fields']['url']['eval']['mandatory'] = false;
                    $GLOBALS['TL_DCA']['tl_content']['fields']['text']['eval']['mandatory'] = false;
            }
            return $varValue;
    }
}
?>