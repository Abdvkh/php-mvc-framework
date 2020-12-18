<?php

class m0002_add_password_column{
    public function up()
    {
        $db = \abubakr\phpmvc\Application::$app->db;
        $SQL = "ALTER TABLE mvc_framework.users ADD COLUMN password VARCHAR(512) NOT NULL;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \abubakr\phpmvc\Application::$app->db;
        $SQL = "ALTER TABLE mvc_framework.users DROP COLUMN password;";
        $db->pdo->exec($SQL);
    }
}