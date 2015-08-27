# JalaliDateRangePicker
Date Range Picker for Bootstrap Yii Extension

This date range picker component for Bootstrap creates a dropdown menu from which a user can
select a range of dates. I created it while building the UI for [Improvely](http://www.improvely.com), 
which needed a way to select date ranges for reports.

## Example
```php
<?php
$this->widget('ext.JalaliDateRangePicker.JalaliDateRangePicker',array(  
	'name'=>'Date',  
	'options' => array(  
		// 'singleDatePicker' => true,  
		'format' => 'jYYYY/jMM/jDD',
		'viewformat' => 'jYYYY/jMM/jDD',
		'minDate' => Rezvan::PersianDate(time(), 'Y/m/d', false, false),
		'placement' => 'right',
		'opens' => 'left',
		// 'showDropdowns'=> true,
		// 'timePicker' => true,
		// 'timePicker24Hour' => true,
		'locale'=>array(
			'format'=> 'jYYYY/jMM/jDD',
			'separator'=> ' - ',
			'applyLabel'=> Yii::t('zii', 'Apply'),
			'cancelLabel' => Yii::t('zii', 'Cancel'),
			'fromLabel' => Yii::t('zii', 'From'),
			'toLabel' => Yii::t('zii', 'To'),
			'customRangeLabel' => 'Custom',
			'daysOfWeek'=>array(
				'یک',
				'دو',
				'سه',
				'چهار',
				'پنج',
				'جمعه',
				'شنبه',
			),
			'monthNames'=>array(
				'فروردین',
				'اردیبهشت',
				'خرداد',
				'تیر',
				'مرداد',
				'شهریور',
				'مهر',	
				'آبان',
				'آذر',
				'دی',
				'بهمن',
				'اسفند',
			),
			'firstDay' => 6
		),
	),
	'htmlOptions'=>array(
		'class'=>'form-control'
	)
));
```

## [Documentation and Live Usage Examples](http://www.daterangepicker.com)

## [See It In a Live Application](https://awio.iljmp.com/5/drpdemogh)

## License

This code is made available under the same license as Bootstrap. Moment.js is included in this repository
for convenience. It is available under the [MIT license](http://www.opensource.org/licenses/mit-license.php).
