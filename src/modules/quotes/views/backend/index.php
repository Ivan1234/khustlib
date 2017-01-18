<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\quotes\models\QuotesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quotes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Quotes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'content:ntext',
            //'modified',
            [
                'attribute' => 'visible',                
                'value'=>function($data){
                   return $data->visible;
                },
                'contentOptions'=>['style'=>'width: 100px; text-align: center;'],
                'content' => function($data){
                    if($data->visible==0) $check = false;
                    else $check = true;
                    return Html::checkbox(
                        'visible_check'.$data->id,
                        $check,
                        [
                            'class' => 'do-change-value',
                            'data-url'=>\yii\helpers\Url::to(['/quotes/backend/update','id'=>$data->id]),
                            'data-id'=>$data->id,
                            'data-attrname'=>'visible',
                        ]
                    );
                },
                'filter'=>["0"=>Yii::t('admin', 'Не видимі'), "1"=>Yii::t('admin', 'Видимі')],
            ],
            /*'created',*/

            [
                'class' => 'yii\grid\ActionColumn'
            ],
        ],
    ]); ?>
</div>
