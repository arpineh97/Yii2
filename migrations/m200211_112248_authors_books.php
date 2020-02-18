<?php

use yii\db\Migration;

/**
 * Class m200211_112248_authors_books
 */
class m200211_112248_authors_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createBooks();
        $this->createAuthors();
        $this->createAuthorsBooks();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        echo "m200211_112248_authors_books cannot be reverted.\n";
        $this->dropTable('books');
        $this->dropTable('authors');
        $this->dropTable('authors_books');
//        return false;
    }

    private function createBooks()
    {
        $this->createTable('books', [
            'book_id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->string()
        ]);
        $this->alterColumn('books', 'book_id', $this->integer() . ' NOT NULL AUTO_INCREMENT');
    }

    private function createAuthors()
    {
        $this->createTable('authors', [
            'author_id' => $this->primaryKey(),
            'name' => $this->string(),
            'surname' => $this->string()
        ]);
        $this->alterColumn('authors', 'author_id', $this->integer() . ' NOT NULL AUTO_INCREMENT');
    }

    private function createAuthorsBooks()
    {
        $this->createTable('authors_books', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer(),
            'book_id' => $this->integer()
        ]);
        //if there will be 2 primary keys (author_id and book_id) without id - migrate will done successfully
        $this->addForeignKey('FK_author', 'authors_books', 'author_id', 'authors', 'author_id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_book', 'authors_books', 'book_id', 'books', 'book_id', 'CASCADE', 'CASCADE');
        $this->alterColumn('authors_books', 'id', $this->integer() . 'NOT NULL AUTO_INCREMENT');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200211_112248_authors_books cannot be reverted.\n";

        return false;
    }
    */
}
