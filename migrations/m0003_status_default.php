<?php

class m0003_status_default{
    public function up()
    {
        $db = \abubakr\phpmvc\Application::$app->db;
        $SQL = "ALTER TABLE mvc_framework.users ALTER COLUMN status SET DEFAULT 0;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \abubakr\phpmvc\Application::$app->db;
        $SQL = "ALTER TABLE mvc_framework.users ALTER COLUMN status DROP DEFAULT;";
        $db->pdo->exec($SQL);
    }
}