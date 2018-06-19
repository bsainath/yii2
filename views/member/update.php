<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPrtMembers */

$this->title = 'Update Members';
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->member_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-prt-members-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
