<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPrtSongs */

$this->title = 'Update Tbl Prt Songs: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Prt Songs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->song_id, 'url' => ['view', 'id' => $model->song_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-prt-songs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
