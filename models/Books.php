<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $book_id
 * @property string|null $title
 * @property string|null $description
 *
 * @property AuthorsBooks[] $authorsBooks
 */
class Books extends \yii\db\ActiveRecord
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
            'book_id' => 'Book ID',
            'title' => 'Title',
            'description' => 'Description',
            'authors' => 'Authors'
        ];
    }

    /**
     * Gets query for [[AuthorsBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthorsBooks()
    {
        return $this->hasMany(AuthorsBooks::class, ['book_id' => 'book_id']);
    }

    public function insertData($authorId)
    {
        $model = new AuthorsBooks();
        $model->author_id = $authorId;
        $model->book_id = $this->book_id;
        $model->save();
    }

    public function deleteData(){
        AuthorsBooks::deleteAll(['book_id'=>$this->book_id]);
    }


}
