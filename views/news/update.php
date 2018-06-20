<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPrtNews */

$this->title = 'Update Tbl Prt News: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Prt News', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->news_id, 'url' => ['view', 'id' => $model->news_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-prt-news-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
