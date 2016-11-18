<?php

/**
 * 
 * @package hh_fontawesomecte
 * Copyright (C) 2017 Harald Huber
 * http://www.harald-huber.com
 *
*/

namespace hhcom\fontawesomecte;

class IconSelect extends \Widget
{

	protected $blnSubmitInput = true;
	protected $strTemplate = 'be_widget';
	
	public function generate()
	{
		# default Value
		if ($this->varValue == "")
			$this->varValue = "000";

		# Font AWESOME Start
		$daten = json_decode(file_get_contents(TL_ROOT."/system/modules/hh_fontawesomecte/assets/fontawesome/icons.json"), true);
		foreach($daten['icons'] AS $key => $value)
		{
			$wert = $value['unicode'];
			$list .= sprintf(
				'
					<div class="iSel %s">
					<span class="counter">'.$key.' <i>('.$wert.')</i></span>
					<input type="radio" name="%s" id="opt_%s" class="tl_radio" value="%s" %s onfocus="Backend.getScrollOffset()">
					<label class="fIcon %s" for="opt_%s"></label></div>
					',
					static::optionChecked($wert, $this->varValue),
					$this->strName,
					$this->strId.'_'.$key,
					specialchars($wert),
					static::optionChecked($wert, $this->varValue),
					$wert,
					$this->strId.'_'.$key
					);
					
					#Generate CSS
					$css .= '
					.'.$wert.':before {
						content: "\\'.specialchars($wert).'";
						color: #000;
						font-size: 18px;
						font-size: 100%;
					}
				';	
		}
		# Font AWESOME END
                
                # Backend: Icon Font Default Layout & Frontend CSS 
		$GLOBALS['TL_CSS'][] = 'system/modules/hh_fontawesomecte/assets/css/fontIcon_Backend.css';
                $GLOBALS['TL_CSS'][] = 'system/modules/hh_fontawesomecte/assets/fontawesome/css/font-awesome.min.css';
                $GLOBALS['TL_CSS'][] = 'system/modules/hh_fontawesomecte/assets/fontawesome/css/font-awesome-social.min.css';
		$GLOBALS['TL_MOOTOOLS'][] = '<style>
			'.$css.'
		</style>';
		
		$infoAboutCurrentIcon = '
			<div class="currentIcon">'.$GLOBALS['TL_LANG']['tl_content']['currentIcon'].' <span class="fIcon '.$this->varValue.'"></span> '.$this->varValue.'</div>
		';
		
		return 	'<div class="backendIconSelect">'
					.$infoAboutCurrentIcon
					.$list.
				'<div class="clear"></div>
				</div>';
	}	
}
?>