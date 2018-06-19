<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblPrtMembers */

$this->title = 'Create Member';
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-prt-members-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
