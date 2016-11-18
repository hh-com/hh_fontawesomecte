<?php

/**
 * 
 * @package hh_fontawesomecte
 * Copyright (C) 2017 Harald Huber
 * http://www.harald-huber.com
 *
*/

namespace hhcom\fontawesomecte;

class ContentIconHeadlineText extends \ContentElement
{
	protected $strTemplate = 'ce_iconheadlinetext';

	protected function compile()
	{
		# Icon Default & Frontend CSS 
		$GLOBALS['TL_CSS'][] = 'system/modules/hh_fontawesomecte/assets/css/fontIcon.css||static';
    
		$iconClass = 'fas_'.$this->id;
			
		$isLink = false;

		# Center Icon and Headline
		if ($this->centerIcon == 1)
			$centerIcon = 'centerIcon';
		
		if ($this->floating != "")
			$addClass = " float_".$this->floating;
		
		if ($this->floating == "below")
			$isAbove = false;
		else
			$isAbove = true;
		
		if ($this->iconRotate)
			$addClass .= " fa-spin ";
			
		if ($this->url != "")
		{
			$isLink = true;
			if (substr($this->url, 0, 7) == 'mailto:')
			{
				$this->Template->url = \String::encodeEmail($this->url);
			}
			else
			{
				$this->Template->url = ampersand($this->url);
			}
			if ($this->target == 1)
			{
				$this->Template->target = ' onclick="return !window.open(this.href)" ';
			}
		}		
		#Default is defined in CSS
		$iconCss = 
		'
		<style>
		.'.$iconClass.':before {
			content: "\\'.$this->iconSelect.'";
			color: #000;
			font-size: '.$this->iconSize.'%;
			line-height: 1em;
		}
		</style>
		';
		
		if(TL_MODE == 'BE')
			$GLOBALS['TL_MOOTOOLS'][] = $iconCss;
		else
			$GLOBALS['TL_HEAD'][] = $iconCss;
		
		$this->Template->isLink = $isLink;
		$this->Template->isAbove = $isAbove;
		$this->Template->centerIcon = $centerIcon;
		$this->Template->iconClass = $iconClass.$addClass;
	}
}
?>