<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $dataProvider */

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'name',
            'contentOptions' => ['style' => 'font-weight: bold; font-size:24px'],
        ],
        [
            'attribute' => 'surname',
            'contentOptions' => ['style' => 'font-weight: bold; font-size:24px'],
        ],
        [
            'label' => 'Books',
            'format' => 'html',
            'attribute'=>'bookNames',
            'value' => function($model)
            {   $line = '';
                foreach ($model->books as $book) {
                    $line .= Html::tag('h3', Html::encode($book->title));
                    $line .= Html::tag('p', Html::encode($book->description)) . "<br>";
//                    $line.= $book->title.'<br>';
                }
                return $line;
            },
        ],
    ],
]);

