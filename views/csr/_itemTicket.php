<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<div class="ticket-view">

    <h1><small><?= \Yii::t('app', 'Ticket'); ?>:</small> <?= Html::encode($this->title) ?></h1>


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
