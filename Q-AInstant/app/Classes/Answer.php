<?php
/**
 * Created by PhpStorm.
 * User: Quentin.ROSSIER
 * Date: 24.01.2019
 * Time: 14:22
 */

namespace App\Classes;


class Answer
{
    private $id;
    private $question_id;
    private $answer;
    private $client;

    /**
     * Answer constructor.
     * @param $id
     * @param $question_id
     * @param $answer
     * @param $client
     */
    public function __construct($id, $question_id, $answer, $client)
    {
        $this->id = $id;
        $this->question_id = $question_id;
        $this->answer = $answer;
        $this->client = $client;
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
    public function getQuestionId()
    {
        return $this->question_id;
    }

    /**
     * @param mixed $question_id
     */
    public function setQuestionId($question_id): void
    {
        $this->question_id = $question_id;
    }

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param mixed $answer
     */
    public function setAnswer($answer): void
    {
        $this->answer = $answer;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client): void
    {
        $this->client = $client;
    }


}