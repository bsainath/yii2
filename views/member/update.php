<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPrtMembers */

$this->title = 'Update Tbl Prt Members: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Prt Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->member_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-prt-members-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
