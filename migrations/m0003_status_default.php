<?php

class m0003_status_default{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "ALTER TABLE mvc_framework.users ALTER COLUMN status SET DEFAULT 0;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "ALTER TABLE mvc_framework.users ALTER COLUMN status DROP DEFAULT;";
        $db->pdo->exec($SQL);
    }
}