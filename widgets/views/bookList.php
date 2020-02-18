<?php
use yii\grid\GridView;
/* @var $dataProvider*/

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'author_id',
            'value' => function($model){
                if($model->author_id){
                    return $model->author->name.' '.$model->author->surname;
                }
            }
        ],
        [
            'attribute' => 'book_id',
            'value' => function($model){
                if($model->book_id){
                    return $model->book->title;
                }
            }
        ],
    ],
    ]);

