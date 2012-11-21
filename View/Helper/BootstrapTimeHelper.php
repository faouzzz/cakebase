<?php

App::uses('TimeHelper', 'View/Helper');
App::uses('HtmlHelper', 'View/Helper');

class BootstrapTimeHelper extends TimeHelper {

	public $helpers = array('Html');

/**
 * $dateString and $userOffset are the same as the overloaded function.
 *
 * Setting $addTitle to false will  stop the title span from being added
 */
	public function niceShort($dateString = null, $userOffset = null, $addTitle = true) {
		$this->Html = new HtmlHelper($this->_View);
		if ($addTitle) {
			return $this->Html->tag('abbr', parent::niceShort($dateString, $userOffset), array('rel' => 'tooltip', 'title' => parent::nice($dateString, $userOffset)));
		} else {
			return parent::niceShort($dateString, $userOffset);
		}
	}

}