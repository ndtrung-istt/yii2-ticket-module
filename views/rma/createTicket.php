<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\ticket\models\Ticket $model
 */

$this->title = Yii::t('ticket', 'Create {modelClass}', [
  'modelClass' => 'RMA',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('ticket', 'RMA'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formTicket', [
        'model' => $model,
    ]) ?>

</div>
