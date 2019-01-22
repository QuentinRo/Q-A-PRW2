<?php
/**
 * Created by PhpStorm.
 * User: Quentin.ROSSIER
 * Date: 22.01.2019
 * Time: 08:59
 */

namespace App\Classes;


class Question
{
    private $id;
    private $entitled;
    private $survey_id;

    /**
     * Question constructor.
     * @param $id
     * @param $entitled
     * @param $survey_id
     */
    public function __construct($id, $entitled, $survey_id)
    {
        $this->id = $id;
        $this->entitled = $entitled;
        $this->survey_id = $survey_id;
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
    public function getEntitled()
    {
        return $this->entitled;
    }

    /**
     * @param mixed $entitled
     */
    public function setEntitled($entitled): void
    {
        $this->entitled = $entitled;
    }

    /**
     * @return mixed
     */
    public function getSurveyId()
    {
        return $this->survey_id;
    }

    /**
     * @param mixed $survey_id
     */
    public function setSurveyId($survey_id): void
    {
        $this->survey_id = $survey_id;
    }

}