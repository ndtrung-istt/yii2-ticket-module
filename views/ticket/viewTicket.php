<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var vendor\istt\ticket\models\Ticket $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('ticket', 'Tickets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-view">

    <h1><small><?= \Yii::t('app', 'Ticket'); ?>:</small> <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('ticket', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('ticket', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('ticket', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'type',
            'customer_fullname',
            'customer_company',
            'customer_phone',
            'customer_email:email',
            'system',
            'priority',
            'detail:ntext',
            'suggestion:ntext',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            'requested_at',
            'replied_at',
            'fixed_begin',
            'fixed_end',
            'cause:ntext',
            'solution:ntext',
            'status',
            'site',
            'hardware_type',
            'hardware_part',
            'hardware_serial',
        ],
    ]) ?>

</div>
