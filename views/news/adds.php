<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\TblPrtNews */

$this->title = 'Manage Adds';
$this->params['breadcrumbs'][] = ['label' => 'Add', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-prt-news-create">
    <div class="tbl-prt-news-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <div class="col-md-12">
        <?= $form->field($model, 'opening_add')->fileInput() ?>

            <?php if(!empty($model->opening_add)){ ?>  <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl().'/uploads/add/'.$model->opening_add; ?>"> <?php } ?>

        </div>

        <div class="col-md-12">
        <?= $form->field($model, 'header_add')->fileInput() ?>

            <?php if(!empty($model->header_add)){ ?>  <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl().'/uploads/add/'.$model->header_add; ?>"> <?php } ?>
        </div>

        <div class="col-md-12">
        <?= $form->field($model, 'top_add')->fileInput() ?>

           <?php if(!empty($model->top_add)){ ?> <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl().'/uploads/add/'.$model->top_add; ?>"> <?php } ?>
        </div>

        <div class="col-md-12">
        <?= $form->field($model, 'bottom_add')->fileInput() ?>

            <?php if(!empty($model->bottom_add)){ ?>   <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl().'/uploads/add/'.$model->bottom_add; ?>"> <?php } ?>
        </div>


        <div class="form-group " align="center">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl() ?>/news" class="btn btn-danger">Cancel</a>
        </div>



        <?php ActiveForm::end(); ?>

    </div>

</div>
