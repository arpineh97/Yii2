<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 *
 * @property AuthorBook[] $authorBook
 */
class Author extends \yii\db\ActiveRecord
{

    public $bookIds;
    public $bookNames;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['bookIds','safe'],
            [['name', 'surname'], 'required'],
            [['name', 'surname'], 'safe'],
            [['name', 'surname'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Authors',
            'name' => 'Name',
            'surname' => 'Surname',
            'bookIds' => 'Books Ids',
            'bookNames' => 'Book Names'
        ];
    }

    /**
     * Gets query for [[AuthorsBooks]].
     *
     * @return ActiveQuery
     */
    public function getAuthorBook()
    {
        return $this->hasMany(AuthorBook::class, ['author_id' => 'id']);
    }

    public function getBooks()
    {
        return $this->hasMany(Book::class, ['id' => 'book_id'])->via('authorBook');
    }
}
