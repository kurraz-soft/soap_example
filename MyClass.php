<?php

/**
 * Created by PhpStorm.
 * User: Kurraz
 */
class MyClass
{
    /**
     * @type string
     */
    public $name = 'defaultName';
    /**
     * @type int
     */
    public $id = 123;

    public function __construct()
    {
        if(file_exists(__DIR__ . '/data.txt'))
        {
            $data = json_decode(file_get_contents(__DIR__ . '/data.txt'),true);
            $this->name = $data['name'];
            $this->id = $data['id'];
        }
    }

    /**
     * @WebMethod
     * @desc Returns name
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @WebMethod
     * @desc Returns id
     *
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @WebMethod
     * @param string $name
     * @return boolean $result
     */
    public function setName($name)
    {
        $this->name = $name;
        $this->saveData();

        return true;
    }

    /**
     * @WebMethod
     * @param int $id
     * @return boolean $result
     */
    public function setId($id)
    {
        $this->id = $id;
        $this->saveData();

        return true;
    }

    public function saveData()
    {
        file_put_contents(__DIR__ . '/data.txt', json_encode(['name' => $this->name, 'id' => $this->id]));
    }
}