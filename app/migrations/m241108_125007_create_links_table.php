<?php

use yii\db\Migration;

/**
 * Handles the creation of table `links`.
 */
class m241108_125007_create_links_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('links', [
            'id' => $this->primaryKey(),
            'name' => $this->string(5)->notNull()->unique(),
            'url' => $this->string()->notNull(),
        ]);

        $this->createIndex('link_name_i1', 'links', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('links');
    }
}
