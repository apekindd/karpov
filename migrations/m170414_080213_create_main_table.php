<?php

use yii\db\Migration;

/**
 * Handles the creation of table `main`.
 */
class m170414_080213_create_main_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('main', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'keywords' => $this->string(),
            'seo_desc' => $this->string(),
            'link' => $this->text(),
            'show' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('main');
    }
}
