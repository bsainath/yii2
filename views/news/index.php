<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TblPrtNewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-prt-news-index">

 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
     <div class="row">
    <div class="col-md-12" style="padding-top:3px;">
    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success pull-right']) ?>
    </p>
   </div>
</div> 


<div class="checklists-index">
    <div class="row">
        <div class="col-sm-12 margintop10">
<?php $buttons = '{update} {delete}';?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'shadow-boxes'],
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','headerOptions' => ['class' => 'theadcolor']],

           // 'news_id',

            [
                'attribute' => 'news_title',
                'headerOptions' => ['class' => 'theadcolor'],
                
            ],

            [
                'attribute' => 'news_description',
                'headerOptions' => ['class' => 'theadcolor'],
                
            ],
          //  'news_type',
          //  'created_date',

            
            [
                'class' => 'yii\grid\ActionColumn',
                
                'header' => 'Actions',
                
                'headerOptions' => ['class' => 'theadcolor'],
                'template' => $buttons,
                'buttons' => [
                    'update' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['news/update', 'id' => $model->news_id], [
                        'title' => Yii::t('yii', 'Edit'),
                    ]);
                    },
                    'delete'=>function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['news/delete', 'id' => $model->news_id], [
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
</div>
