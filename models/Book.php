<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 *
 * @property AuthorBook[] $authorBook
 */
class Book extends \yii\db\ActiveRecord
{
    public $authors;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['title', 'description'], 'safe'],
            [['title', 'description'], 'string', 'max' => 255],
            [['authors'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'authors' => 'Authors'
        ];
    }

    /**
     * Gets query for [[AuthorsBooks]].
     *
     * @return ActiveQuery
     */
    public function getAuthorBook()
    {
        return $this->hasMany(AuthorBook::class, ['book_id' => 'id']);
    }

    public function insertData($authorId)
    {
        $model = new AuthorBook();
        $model->author_id = $authorId;
        $model->book_id = $this->id;
        $model->save();
    }

    public function deleteData(){
        AuthorBook::deleteAll(['book_id'=>$this->id]);
    }

    public function getAuthors()
    {
        return $this->hasMany(Author::class, ['id' => 'author_id'])->via('authorBook');
    }

}
