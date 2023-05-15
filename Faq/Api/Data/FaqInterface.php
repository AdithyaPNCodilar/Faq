<?php
namespace Codilar\Faq\Api\Data;

interface FaqInterface
{
    const ID = 'id';
    const PRODUCT_ID = 'product_id';
    const CUSTOMER_ID = 'customer_id';
    const QUESTION = 'question';
    const ANSWER = 'answer';
    const STATUS = 'status';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public function getId();

    public function setId($id);

    public function getProductId();

    public function setProductId($product_id);

    public function getCustomerId();

    public function setCustomerId($customer_id);

    public function getQuestion();

    public function setQuestion($question);

    public function getAnswer();

    public function setAnswer($answer);

    public function getStatus();

    public function setStatus($status);

    public function getCreatedAt();

    public function setCreatedAt($created_at);

    public function getUpdatedAt();

    public function setUpdatedAt($updated_at);
}
