<?php


namespace app\core\db;


use app\core\Application;
use app\core\Model;

abstract class DbModel extends Model
{
    abstract public static function tableName(): string;

    abstract public function attributes(): array;

    abstract public static function primaryKey(): string;

    public function save(){
        $tableName = $this->tableName();
        $attributes  = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $dbname = Application::$app->db->dbname;
        $statement = self::prepare("INSERT INTO {$dbname}$tableName ("
                                        .implode(',', $attributes)
                                        .") VALUES("
                                        .implode(',', $params)
                                        .")");
        foreach ($attributes as $attribute){
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }

    public static function findOne($where) // [email => test@test.com, firstname => test]
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode('AND', array_map(fn($attr) => "$attr = :$attr", $attributes));
        $dbname = Application::$app->db->dbname;
        $statement = self::prepare("SELECT * FROM {$dbname}$tableName WHERE $sql");
        foreach ($where as $key => $item){
            $statement->bindValue(":$key", $item);
        }

        $statement->execute();
        return $statement->fetchObject(static::class);
    }

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}