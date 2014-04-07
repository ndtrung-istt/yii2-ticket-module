<?php

use yii\helpers\Html;
use yii\grid\GridView;
use vendor\istt\ticket\models\Ticket;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var vendor\istt\ticket\models\TicketSearch $searchModel
 */

$this->title = Yii::t('ticket', 'CSR');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_searchTicket', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('ticket', 'Create CSR'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
//             'customer_fullname',
//             'customer_company',
            // 'customer_phone',
            'customer_email:email',
            ['attribute' => 'status', 'value' => function($data){ return Ticket::statusOptions($data->status); }, 'filter' => Ticket::statusOptions(), 'format' => 'html'],
            ['attribute' => 'priority', 'value' => function($data){ return Ticket::priorityOptions($data->priority); }, 'filter' => Ticket::priorityOptions(), 'format' => 'html'],
            // 'system',
            // 'detail:ntext',
            // 'suggestion:ntext',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            'requested_at',
            // 'replied_at',
            // 'fixed_begin',
            // 'fixed_end',
            // 'cause:ntext',
            // 'solution:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
