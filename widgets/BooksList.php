<?php


namespace app\widgets;


use app\models\Author;
use yii\base\Widget;
use yii\data\ActiveDataProvider;

class BooksList extends Widget
{
    public $value;

    public function run()
    {
        if (is_object($this->value)) {
            $authors = Author::find()->where(['id' => $this->value->id]);
            $dataProvider = new ActiveDataProvider([
                'query' => $authors,
                'pagination' => [
                    'pageSize' => 5,
                ],
            ]);
            return $this->render('bookLists', compact('dataProvider'));
        }

        $authors = Author::find()->where(['id' => $this->value]);
        $dataProvider = new ActiveDataProvider([
            'query' => $authors,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        return $this->render('bookList', compact('dataProvider'));
    }
}