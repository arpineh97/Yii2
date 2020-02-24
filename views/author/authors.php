<?php
use yii\grid\GridView;

/* @var $dataProvider */

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'id',
            'format' => 'raw',
            'value' => function ($model) {
                if ($model->id) {
                    return "<a href='/author/lists/$model->id'>$model->name  $model->surname</a>";
                }
            }
        ]
    ],
]);

