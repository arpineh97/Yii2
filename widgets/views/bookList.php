<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $dataProvider */

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'format' => 'html',
            'attribute' => 'bookIds',
            'value' => function ($model) {
                $line = '';
                foreach ($model->books as $book) {
                    $line .= Html::tag('h3', Html::encode($book->title));
                    $line .= Html::tag('p', Html::encode($book->description)) . "<br>";
                }
                return $line;
            },
        ],
    ],
]);


