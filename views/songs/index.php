<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Songs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-prt-songs-index">



    <div class="row">
    <div class="col-md-12" style="padding-top:3px;">
    <p>
        <?= Html::a('Add Songs', ['create'], ['class' => 'btn btn-success pull-right']) ?>
    </p>
   </div>
</div> 

<div class="checklists-index">
    <div class="row">
        <div class="col-sm-12 margintop10">
        <?php $buttons = ' {delete}';?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'shadow-boxes'],
        'columns' => [
            
            ['class' => 'yii\grid\SerialColumn','headerOptions' => ['class' => 'theadcolor']],

            //'song_id',
            [
                'attribute' => 'party_id',
                'headerOptions' => ['class' => 'theadcolor'],
                'format' => 'raw',
                'header' => 'Party',
                
                'value' => function ($model) {
                
                return $model->party->option_name;
                }
                
            ],
            
            
            [
                'attribute' => 'file_path',
                'headerOptions' => ['class' => 'theadcolor'],
                'format' => 'raw',
                'header' => 'Song',
                
                'value' => function ($model) {
                    
                
                return '<audio controls>
  <source src="'.Yii::$app->getUrlManager()->getBaseUrl().'/uploads/songs/'.$model->file_path.'" type="audio/ogg">
  <source src="'.Yii::$app->getUrlManager()->getBaseUrl().'/uploads/songs/'.$model->file_path.'" type="audio/mpeg">
  Your browser does not support the audio tag.
</audio> ' ;
                }
                
            ],
            
            [
                'attribute' => 'created_date',
                'headerOptions' => ['class' => 'theadcolor'],
                
            ],

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                
                'headerOptions' => ['class' => 'theadcolor'],
                'template' => $buttons,
                'buttons' => [
                    /*'update' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['songs/update', 'id' => $model->song_id], [
                        'title' => Yii::t('yii', 'Edit'),
                    ]);
                    },*/
                    'delete'=>function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['songs/delete', 'id' => $model->song_id], [
                        'title' => Yii::t('yii', 'Delete'), 'aria-label'=>"Delete", 'data-pjax'=>"0", 'data-confirm'=>"Are you sure you want to delete this item?",
                        'data-method'=>"post"
                    ]);
                    },
                    
                    ],
            ],
        ],
    ]); ?>
</div>
</div>
</div>
