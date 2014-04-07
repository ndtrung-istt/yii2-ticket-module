<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var istt\ticket\models\TicketSearch $searchModel
 */

$this->title = Yii::t('ticket', 'Tickets');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_searchTicket', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('ticket', 'Create {modelClass}', [
  'modelClass' => 'Ticket',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'type',
//             'customer_fullname',
//             'customer_company',
            // 'customer_phone',
            'customer_email:email',
            // 'system',
            'priority',
            // 'detail:ntext',
            // 'suggestion:ntext',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'requested_at',
            // 'replied_at',
            // 'fixed_begin',
            // 'fixed_end',
            // 'cause:ntext',
            // 'solution:ntext',
            // 'status',
            // 'site',
            // 'hardware_type',
            // 'hardware_part',
            // 'hardware_serial',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
