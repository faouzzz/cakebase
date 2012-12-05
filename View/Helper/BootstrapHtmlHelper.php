<?php
App::uses('HtmlHelper', 'View/Helper');

class BootstrapHtmlHelper extends HtmlHelper {

/**
 * Creates a link which triggers are modal confirm to pop up
 *
 * If $url starts with "http://" this is treated as an external link. Else,
 * it is treated as a path to controller/action and parsed with the
 * HtmlHelper::url() method.
 *
 * If the $url is empty, $title is used instead.
 *
 * ### Options
 *
 * - `escape` Set to false to disable escaping of title and attributes.
 * - `confirm` Content for modal
 * - `confirm_title` The title to use for the modal, if empty $title will be used
 *
 * @param string $title The content to be wrapped by <a> tags.
 * @param mixed $url Cake-relative URL or array of URL parameters, or external URL (starts with http://)
 * @param array $options Array of HTML attributes.
 * @param string $confirmMessage JavaScript confirmation message.
 * @return string An `<a />` element.
 */
	public function confirm($title, $url = null, $options = array(), $confirmMessage = false, $confirmTitle = false) {
		if ($confirmTitle === false) {
			$confirmTitle = $title;
		}

		if (!is_array($options)) {
			$options = array();
		}

		$defaults = array(
			'data-toggle' => 'confirm',
			'data-modal-content' => $confirmMessage,
			'data-modal-title' => $confirmTitle,
		);

		if ($confirmMessage) {
			$options = array_merge($defaults, $options);
			$confirmMessage = false;
		}

		return parent::link($title, $url, $options);
	}

}