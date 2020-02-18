<?php


namespace app\widgets;


use app\models\AuthorsBooks;
use yii\base\Widget;
use yii\data\ActiveDataProvider;

class BooksList extends Widget
{
    public $authorId;

    public function run()
    {

        $books = AuthorsBooks::find()->where(['author_id' => $this->authorId]);

        $dataProvider = new ActiveDataProvider([
            'query' => $books,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        return $this->render('bookList',compact('dataProvider'));
    }
}