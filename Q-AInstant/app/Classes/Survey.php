<?php
/**
 * Created by PhpStorm.
 * User: Quentin.ROSSIER
 * Date: 18.01.2019
 * Time: 14:16
 */

namespace App\Classes;


class Survey
{

    private $id;
    private $name;
    private $description;
    private $open;


    /**
     * Survey constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $open
     */
    public function __construct($id, $name, $description, $open)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->open = $open;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getOpen()
    {
        return $this->open;
    }

    /**
     * @param mixed $open
     */
    public function setOpen($open): void
    {
        $this->open = $open;
    }



}