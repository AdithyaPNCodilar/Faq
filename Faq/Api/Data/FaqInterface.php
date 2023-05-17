<?php

namespace Codilar\Faq\Api\Data;

/**
 * Interface FaqInterface
 * @package Codilar\Faq\Api\Data
 */

interface FaqInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter/setter methods in snake case.
     */
    public const ID = 'id';
    public const PRODUCT_ID = 'product_id';
    public const CUSTOMER_ID = 'customer_id';
    public const QUESTION = 'question';
    public const ANSWER = 'answer';
    public const STATUS = 'status';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';

    /**
     * Get FAQ ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set FAQ ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get Product ID
     *
     * @return int|null
     */
    public function getProductId();

    /**
     * Set Product ID
     *
     * @param int $product_id
     * @return $this
     */
    public function setProductId($product_id);

    /**
     * Get Customer ID
     *
     * @return int|null
     */
    public function getCustomerId();

    /**
     * Set Customer ID
     *
     * @param int $customer_id
     * @return $this
     */
    public function setCustomerId($customer_id);

    /**
     * Get Question
     *
     * @return string|null
     */
    public function getQuestion();

    /**
     * Set Question
     *
     * @param string $question
     * @return $this
     */
    public function setQuestion($question);

    /**
     * Get Answer
     *
     * @return string|null
     */
    public function getAnswer();

    /**
     * Set Answer
     *
     * @param string $answer
     * @return $this
     */
    public function setAnswer($answer);

    /**
     * Get Status
     *
     * @return int|null
     */
    public function getStatus();

    /**
     * Set Status
     *
     * @param int $status
     * @return $this
     */
    public function setStatus($status);

    /**
     * Get Creation Timestamp
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set Creation Timestamp
     *
     * @param string $created_at
     * @return $this
     */
    public function setCreatedAt($created_at);

    /**
     * Get Update Timestamp
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set Update Timestamp
     *
     * @param string $updated_at
     * @return $this
     */
    public function setUpdatedAt($updated_at);
}
