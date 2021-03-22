<?php


use yii\db\Expression;
use yii\db\Migration;

/**
 * Class m210320_173146_add_default_users
 */
class m210320_173146_add_default_users extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\db\Exception
     */
    public function safeUp()
    {
        $this->insert('user', [
            'username' => 'firstUser',
            'status' => '10',
            'auth_key' => '',
            'password_hash' =>'',
            'email'=>'',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user', ['id' => 1]);
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210320_173146_add_default_users cannot be reverted.\n";

        return false;
    }
    */
}
