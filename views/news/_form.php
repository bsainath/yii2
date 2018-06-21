<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblPrtNews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-prt-news-form">

 <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'news_title')->textarea(['maxlength' => true,'rows'=>2,'col'=>2]) ?>

    <?= $form->field($model, 'news_description')->textarea(['maxlength' => true,'rows'=>6,'col'=>6]) ?>

    
    <div class="form-group " align="center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl() ?>/news" class="btn btn-danger">Cancel</a>
    </div>
    
    

    <?php ActiveForm::end(); ?>

</div>
