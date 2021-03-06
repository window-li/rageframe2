<?php

use yii\db\Migration;

class m180921_014941_sys_addons_binding extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%sys_addons_binding}}', [
            'id' => 'int(11) NOT NULL AUTO_INCREMENT COMMENT \'主键\'',
            'addons_name' => 'varchar(30) NOT NULL DEFAULT \'\' COMMENT \'插件名称\'',
            'entry' => 'varchar(10) NOT NULL DEFAULT \'\' COMMENT \'入口类别[menu,cover]\'',
            'title' => 'varchar(50) NOT NULL DEFAULT \'\' COMMENT \'名称\'',
            'route' => 'varchar(30) NOT NULL DEFAULT \'\' COMMENT \'路由\'',
            'icon' => 'varchar(50) NULL DEFAULT \'\' COMMENT \'图标\'',
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='系统_插件菜单表'");
        
        /* 索引设置 */
        $this->createIndex('addons_name','{{%sys_addons_binding}}','addons_name',0);
        
        
        /* 表数据 */
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%sys_addons_binding}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

