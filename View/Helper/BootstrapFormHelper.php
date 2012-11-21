<?php
App::uses('FormHelper', 'View/Helper');

class BootstrapFormHelper extends FormHelper {

	public $helpers = array('Js', 'Html');

/**
 * Used as thee defaults form creation options for a project, if aliased as the FormHelper.
 * @var array
 */
	private $defaults = array(
		'class' => 'form-horizontal',
		'inputDefaults' => array(
			'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
			'between' => '<div class="controls">', 'after' => '</div>',
			'div' => 'control-group',
			'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
		)
	);

/**
 * Overides the FormHelper::create(). Sets up default options to add bootstrap
 * classes by default
 *
 * @see FormHelper::create()
 */
	public function create($model = null, $options = array()) {
		$options = array_merge($this->defaults, $options);
		return parent::create($model, $options);
	}

/**
 * Overides the FormHelper::label(). Sets up default options to add bootstrap
 * classes by default
 *
 * @see FormHelper::label()
 */
	public function label($fieldName = null, $text = null, $options = array()) {
		$options = array_merge(array('class' => 'control-label'), $options);
		return parent::label($fieldName, $text, $options);
	}

}