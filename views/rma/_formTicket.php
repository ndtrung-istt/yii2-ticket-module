<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use istt\ticket\models\Ticket;
use kartik\widgets\TimePicker;
use kartik\widgets\DatePicker;

/**
 * @var yii\web\View $this
 * @var istt\ticket\models\Ticket $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="ticket-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-md-3">

    	<?= $form->field($model, 'customer_fullname', [
	    			'options' => ['maxlength' => 255],
	    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-user"></i>']]
		]) ?>

	    <?= $form->field($model, 'customer_company', [
	    			'options' => ['maxlength' => 255],
	    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-home"></i>']]
		]) ?>

	    <?= $form->field($model, 'customer_phone', [
	    			'options' => ['maxlength' => 255],
	    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-phone"></i>']]
		]) ?>

	    <?= $form->field($model, 'customer_email',[
	    			'options' => ['maxlength' => 255],
	    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-envelope"></i>']]
		]) ?>
   	</div>
    <div class="col-md-9">
	    <?= $form->field($model, 'title', [
	    			'options' => ['maxlength' => 255],
	    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-star"></i>']]
		]) ?>
	<div class="row">
	    <div class="col-sm-8">
	    	<?= $form->field($model, 'system', [
	    			'options' => ['maxlength' => 255],
	    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-cog"></i>']]
		]) ?>

	    <?= $form->field($model, 'site',  [
	    			'options' => ['maxlength' => 255],
	    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-map-marker"></i>']]
		]) ?>

	    <?= $form->field($model, 'hardware_type',  [
	    			'options' => ['maxlength' => 255],
	    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-hdd"></i>']]
		]) ?>

	    <?= $form->field($model, 'hardware_part',  [
	    			'options' => ['maxlength' => 255],
	    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-qrcode"></i>']]
		]) ?>

	    <?= $form->field($model, 'hardware_serial',  [
	    			'options' => ['maxlength' => 255],
	    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-barcode"></i>']]
		]) ?>
	    </div>
	    <div class="col-sm-4">
	    	<?= $form->field($model, 'status',  [
	    			'options' => ['maxlength' => 255],
	    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-heart"></i>']]
		])->dropDownList(Ticket::statusOptions())?>
		    <?= $form->field($model, 'priority')->radioList(Ticket::priorityOptions()) ?>
	    </div>
    </div>


	    <?= $form->field($model, 'detail')->widget(kartik\markdown\MarkdownEditor::classname(),
	    	['height' => 300]
	    );?>
	    <?= $form->field($model, 'suggestion')->widget(kartik\markdown\MarkdownEditor::classname(),
	    	['height' => 300]
	    );?>

	<div class="row">
	    <div class="col-xs-6 col-md-4">
	    	<?= $form->field($model, 'requested_at[date]')->widget(DatePicker::className(), [
	        'pluginOptions' => [
	            'format' => 'yyyy-mm-dd',
	            'todayHighlight' => true,
	        ]
	    ]); ?>
	    </div>
	    <div class="col-xs-6 col-md-2">
		    <?= $form->field($model, 'requested_at[time]')->label(\Yii::t('app', 'Time'))->widget(TimePicker::className(), [
		        'pluginOptions' => [ 'showMeridian' => false, 'showSeconds' => true,]
		    ]); ?>
	    </div>
	    <div class="col-xs-6 col-md-4">
	    <?= $form->field($model, 'replied_at[date]')->widget(DatePicker::className(), [
	        'pluginOptions' => [
	            'format' => 'yyyy-mm-dd',
	            'todayHighlight' => true,
	        ]
	    ]); ?>
	    </div>
	    <div class="col-xs-6 col-md-2">
	     <?= $form->field($model, 'replied_at[time]')->label(\Yii::t('app', 'Time'))->widget(TimePicker::className(), [
	        'pluginOptions' => [ 'showMeridian' => false, 'showSeconds' => true,]
	    ]); ?>
	    </div>
    </div>

    <div class="row">
	    <div class="col-xs-6 col-md-4">
	    	 <?= $form->field($model, 'fixed_begin[date]')->widget(DatePicker::className(), [
	        'pluginOptions' => [
	            'format' => 'yyyy-mm-dd',
	            'todayHighlight' => true,
	        ]
	    ]); ?>
	    </div>
	    <div class="col-xs-6 col-md-2">
	    <?= $form->field($model, 'fixed_begin[time]')->label(\Yii::t('app', 'Time'))->widget(TimePicker::className(), [
	        'pluginOptions' => [ 'showMeridian' => false, 'showSeconds' => true,]
	    ]); ?>
	    </div>
	    <div class="col-xs-6 col-md-4">
	    <?= $form->field($model, 'fixed_end[date]')->widget(DatePicker::className(), [
	        'pluginOptions' => [
	            'format' => 'yyyy-mm-dd',
	            'todayHighlight' => true,
	        ]
	    ]); ?>
	    </div>
	    <div class="col-xs-6 col-md-2">
	    <?= $form->field($model, 'fixed_end[time]')->label(\Yii::t('app', 'Time'))->widget(TimePicker::className(), [
	        'pluginOptions' => [ 'showMeridian' => false, 'showSeconds' => true,]
	    ]); ?>
	    </div>
    </div>

    </div>
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('ticket', 'Create') : Yii::t('ticket', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
