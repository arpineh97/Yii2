<?php
use yii\grid\GridView;

/* @var $dataProvider */

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'author_id',
            'format' => 'raw',
            'value' => function ($model) {
                if ($model->author_id) {
                    return "<a href='/authors/list/$model->author_id' >$model->name  $model->surname</a>";
                }
            }

        ]
    ],
]);
?>