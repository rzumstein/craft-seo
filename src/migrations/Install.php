<?php
namespace pinfirestudios\craftseo\migrations;

use craft\db\Migration;

class Install extends Migration
{
    /**
     * Creates table for storing meta tag information
     *
     * {@inheritDoc}
     *
     * @return void
     */
    public function safeUp()
    {
        $this->createTable('craftseo_meta_tag_attribute', [
            'id' => $this->primaryKey(),
            'attribute' => $this->string(),
        ]);

        $this->createTable('craftseo_meta_tag', [
            'id' => $this->primaryKey(),
            'attributeId' => $this->integer(),
            'content' => $this->string(),
        ]);

        $this->addForeignKey(
            'craftseo_meta_tag_attribute_fk',
            'craftseo_meta_tag',
            'attributeId',
            'craftseo_meta_tag_attribute',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->batchInsert('craftseo_meta_tag_attribute', ['attribute'], [
            ['name'], ['charset'], ['http-equiv'], ['viewport'], ['itemprop'],
        ], false);
    }

    /**
     * Remove table for storing meta tag information
     *
     * {@inheritDoc}
     *
     * @return void
     */
    public function safeDown()
    {
        $this->dropTable('craftseo_meta_tag');
        $this->dropTable('craftseo_meta_tag_attribute');
    }
}
