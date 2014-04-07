<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var istt\ticket\models\TicketSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="ticket-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'customer_fullname') ?>

    <?= $form->field($model, 'customer_company') ?>

    <?php // echo $form->field($model, 'customer_phone') ?>

    <?php // echo $form->field($model, 'customer_email') ?>

    <?php // echo $form->field($model, 'system') ?>

    <?php // echo $form->field($model, 'priority') ?>

    <?php // echo $form->field($model, 'detail') ?>

    <?php // echo $form->field($model, 'suggestion') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'requested_at') ?>

    <?php // echo $form->field($model, 'replied_at') ?>

    <?php // echo $form->field($model, 'fixed_begin') ?>

    <?php // echo $form->field($model, 'fixed_end') ?>

    <?php // echo $form->field($model, 'cause') ?>

    <?php // echo $form->field($model, 'solution') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'site') ?>

    <?php // echo $form->field($model, 'hardware_type') ?>

    <?php // echo $form->field($model, 'hardware_part') ?>

    <?php // echo $form->field($model, 'hardware_serial') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('ticket', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('ticket', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
