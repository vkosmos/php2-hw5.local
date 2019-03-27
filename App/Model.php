<?php

namespace App;

/**
 * Class Model
 * @package App
 */
abstract class Model
{
    protected const TABLE = '';
    public $id;

    /**
     * Возвращает массив всех записей из БД в виде объектов соответствующего класса
     * @return array
     */
    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, [], static::class);
    }

    /**
     * Возвращает объект соответствующего класса с заданным id
     * @param int $id
     * @return object|bool
     */
    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id = :id';
        $params = [':id' => $id];
        $data = $db->query($sql, $params, static::class);

        return (!empty($data) && is_array($data)) ? $data[0] : false;
    }

    /**
     *  Сохраняет объект в БД
     */
    public function insert()
    {
        $db = new Db();

        $props = get_object_vars($this);

        $fields = [];
        $binds = [];
        $data = [];

        foreach ($props as $key => $value) {
            if ('id' == $key){
                continue;
            }
            $fields[] = $key;
            $binds[] = ':' . $key;
            $names[] = $value;
            $data[':' . $key] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE .
            ' (' . implode(',', $fields) . ')
            VALUES 
            ( ' . implode(',', $binds) . ')';

        $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
    }

    /**
     *  Обновляет объект в БД
     */
    public function update()
    {
        $db = new Db();

        $props = get_object_vars($this);
        $binds = [];
        $data = [];

        foreach ($props as $key => $value){
            $data[':' . $key] = $value;
            if ('id' == $key){
                continue;
            }
            $binds[] = $key . '=:' . $key;
        }

        $sql = 'UPDATE ' .
            static::TABLE . '
            SET ' .
            implode(',', $binds) .
            ' WHERE 
            id = :id';

        $db->execute($sql, $data);
    }

    /**
     *  Удаляет объект из БД
     */
    public function delete()
    {
        $db = new Db();

        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = :id';
        $data = [':id' => $this->id];

        $db->execute($sql, $data);
    }

    /**
     *  Если данный объет не был ранее сохранен в БД, сохраняет его.
     *  Иначе, обновляет его данные в БД.
     */
    public function save()
    {
        if (isset($this->id)){
            $this->update();
        }
        else{
            $this->insert();
        }
    }

}
