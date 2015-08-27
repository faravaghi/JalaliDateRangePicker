<?php
/**
 * JalaliDateRangePicker class file.
 * @author: Mohammad Ebrahim Amini <faravaghi@gmail.com>
 * @copyright Copyright &copy; faravaghi 2015 - www.dkr.co.ir
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */

/**
 * A simple implementation for date range picker for Twitter Bootstrap
 * @see http://www.dangrossman.info/2012/08/20/a-date-range-picker-for-twitter-bootstrap/
 */
class JalaliDateRangePicker extends CInputWidget
{
	/**
	 * @var TbActiveForm when created via TbActiveForm, this attribute is set to the form that renders the widget
	 * @see TbActionForm->inputRow
	 */
	public $form;

	/**
	 * @var string $selector
	 */
	public $selector;

	/**
	 * @var string JS Callback for Daterange picker
	 */
	public $callback;
	/**
	 * @var array Options to be passed to daterange picker
	 */
	public $options = array();
	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = array();

	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		$this->registerClientScript();
	}

	/**
	 * Runs the widget.
	 */
	public function run()
	{
		if($this->selector)
		{
			Yii::app()->bootstrap->registerDateRangePlugin($this->selector, $this->options, $this->callback);
		}
		else
		{
			list($name, $id) = $this->resolveNameID();
	
			if ($this->hasModel())
			{
				if ($this->form)
					echo $this->form->textField($this->model, $this->attribute, $this->htmlOptions);
				else
					echo CHtml::activeTextField($this->model, $this->attribute, $this->htmlOptions);
	
			} 
			else
				echo CHtml::textField($name, $this->value, $this->htmlOptions);
	
			Yii::app()->getClientScript()->registerScript(
				uniqid(__CLASS__ . '#', true),
				'$("#' . $id . '").daterangepicker(' . CJavaScript::encode($this->options) . ($this->callback
					? ', ' . CJavaScript::encode($this->callback) : '') . ');'
			);
		}
		
	}

	/**
	 * Registers required css js files
	 */
	public function registerClientScript()
	{
		$baseScriptUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.JalaliDateRangePicker').'/assets');

		$cs=Yii::app()->getClientScript();
		$cs->registerCssFile($baseScriptUrl.'/css/daterangepicker.css');
		$cs->registerScriptFile($baseScriptUrl.'/js/moment.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile($baseScriptUrl.'/js/moment-jalaali.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile($baseScriptUrl.'/js/daterangepicker.js', CClientScript::POS_HEAD);
	}
}