<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblPrtNews */

$this->title = 'Create Tbl Prt News';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Prt News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-prt-news-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
