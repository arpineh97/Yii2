<?php

use yii\db\Migration;

/**
 * Class m200220_083132_authors_books
 */
class m200220_083132_authors_books extends Migration
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
        $this->dropTable('books');
        $this->dropTable('authors');
        $this->dropTable('authors_books');
    }

    private function createBooks()
    {
        $this->createTable('books', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->string()
        ]);
        $this->alterColumn('books', 'id', $this->integer() . ' NOT NULL AUTO_INCREMENT');
    }

    private function createAuthors()
    {
        $this->createTable('authors', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'surname' => $this->string()
        ]);
        $this->alterColumn('authors', 'id', $this->integer() . ' NOT NULL AUTO_INCREMENT');
    }

    private function createAuthorsBooks()
    {
        $this->createTable('authors_books', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer(),
            'book_id' => $this->integer()
        ]);
        //if there will be 2 primary keys (author_id and book_id) without id - migrate will done successfully
        $this->addForeignKey('FK_author', 'authors_books', 'author_id', 'authors', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_book', 'authors_books', 'book_id', 'books', 'id', 'CASCADE', 'CASCADE');
        $this->alterColumn('authors_books', 'id', $this->integer() . 'NOT NULL AUTO_INCREMENT');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200220_083132_authors_books cannot be reverted.\n";

        return false;
    }
    */
}
