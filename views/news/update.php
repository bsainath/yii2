<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPrtNews */

$this->title = 'Update News';
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->news_id, 'url' => ['view', 'id' => $model->news_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-prt-news-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
