<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\ticket\models\Ticket $model
 */

$this->title = Yii::t('ticket', 'Update {modelClass}: ', [
  'modelClass' => 'CSR',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('ticket', 'CSR'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('ticket', 'Update');
?>
<div class="ticket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formTicket', [
        'model' => $model,
    ]) ?>

</div>
