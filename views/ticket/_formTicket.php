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

    <fieldset>
    	<caption>Customer Information</caption>
    	<?= $form->field($model, 'customer_fullname')->textInput(['maxlength' => 255]) ?>

	    <?= $form->field($model, 'customer_company')->textInput(['maxlength' => 255]) ?>

	    <?= $form->field($model, 'customer_phone')->textInput(['maxlength' => 255]) ?>

	    <?= $form->field($model, 'customer_email')->textInput(['maxlength' => 255]) ?>
    </fieldset>

    <?= $form->field($model, 'title', [
    			'options' => ['maxlength' => 255],
    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-star"></i>']]
	]) ?>

    <?= $form->field($model, 'type')->dropDownList(Ticket::typeOptions()) ?>

    <?= $form->field($model, 'system')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'priority')->radioList(Ticket::priorityOptions()) ?>

    <?= $form->field($model, 'status')->dropDownList(Ticket::statusOptions())?>

    <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'suggestion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cause')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'solution')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'requested_at[date]')->widget(DatePicker::className(), [
        'options' => ['placeholder' => 'Select issue date ...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
        ]
    ]); ?>
    <?= $form->field($model, 'requested_at[time]')->widget(TimePicker::className(), [
        'pluginOptions' => [ 'showMeridian' => false, ]
    ]); ?>

    <?= $form->field($model, 'replied_at[date]')->widget(DatePicker::className(), [
        'options' => ['placeholder' => 'Select issue date ...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
        ]
    ]); ?>
    <?= $form->field($model, 'replied_at[time]')->widget(TimePicker::className(), [
        'pluginOptions' => [ 'showMeridian' => false, ]
    ]); ?>


    <?= $form->field($model, 'fixed_begin[date]')->widget(DatePicker::className(), [
        'options' => ['placeholder' => 'Select issue date ...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
        ]
    ]); ?>
    <?= $form->field($model, 'fixed_begin[time]')->widget(TimePicker::className(), [
        'pluginOptions' => [ 'showMeridian' => false, ]
    ]); ?>

    <?= $form->field($model, 'fixed_end[date]')->widget(DatePicker::className(), [
        'options' => ['placeholder' => 'Select issue date ...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
        ]
    ]); ?>
    <?= $form->field($model, 'fixed_end[time]')->widget(TimePicker::className(), [
        'pluginOptions' => [ 'showMeridian' => false, ]
    ]); ?>

    <?= $form->field($model, 'site')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'hardware_type')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'hardware_part')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'hardware_serial')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('ticket', 'Create') : Yii::t('ticket', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
