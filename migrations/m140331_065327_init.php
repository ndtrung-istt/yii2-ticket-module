<?php

use yii\db\Schema;

class m140331_065327_init extends \yii\db\Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName === 'mysql') {
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    	}
		$this->createTable('{{%ticket}}',[
				'id' => Schema::TYPE_BIGPK,
				'title' => Schema::TYPE_STRING,
				'type' => Schema::TYPE_SMALLINT,
				'customer_fullname' => Schema::TYPE_STRING,
				'customer_company' => Schema::TYPE_STRING,
				'customer_phone' => Schema::TYPE_STRING,
				'customer_email' => Schema::TYPE_STRING,

				'system' => Schema::TYPE_STRING,
				'priority' => Schema::TYPE_SMALLINT,
				'detail' => Schema::TYPE_TEXT,
				'suggestion' => Schema::TYPE_TEXT,

				'created_at' => Schema::TYPE_INTEGER,
				'created_by' => Schema::TYPE_INTEGER,
				'updated_at' => Schema::TYPE_INTEGER,
				'updated_by' => Schema::TYPE_INTEGER,

				'requested_at' => Schema::TYPE_DATETIME,
				'replied_at' => Schema::TYPE_DATETIME,
				'fixed_begin' => Schema::TYPE_DATETIME,
				'fixed_end' => Schema::TYPE_DATETIME,

				'cause'	=>	Schema::TYPE_TEXT,
				'solution'	=>	Schema::TYPE_TEXT,
				'status'	=>	Schema::TYPE_BOOLEAN,

				'site'	=>	Schema::TYPE_STRING,
				'hardware_type'	=>	Schema::TYPE_STRING,
				'hardware_part' => 	Schema::TYPE_STRING,
				'hardware_serial' => 	Schema::TYPE_STRING
			], $tableOptions);
    }

    public function down()
    {
    	$this->dropTable('{{%ticket}}');
    }
}
