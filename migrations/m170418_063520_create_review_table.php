<?php

use yii\db\Migration;

/**
 * Handles the creation of table `review`.
 */
class m170418_063520_create_review_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('review', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'name' => $this->string(),
            'email' => $this->string(),
            'message' => $this->string(),
            'date' => $this->timestamp(),
            'active' => $this->integer(1)->defaultValue(0)
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            'idx-review-product_id',
            'review',
            'product_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-product-product_id',
            'review',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('review');
    }
}
