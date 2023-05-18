<?php

namespace Codilar\Faq\Model;

use Codilar\Faq\Api\Data\FaqInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Class Faq
 * This class represents a FAQ (Frequently Asked Questions) entity.
 * It extends the AbstractModel class and implements the FaqInterface.
 */
class Faq extends AbstractModel implements FaqInterface
{
    /**
     * Initialize resource model
     */
    protected function _construct()
    {
        $this->_init('Codilar\Faq\Model\ResourceModel\Faq');
    }

    /**
     * Get FAQ ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Set FAQ ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->setData(self::ID, $id);
        return $this;
    }

    /**
     * Get Product ID
     *
     * @return int|null
     */
    public function getProductId()
    {
        return $this->getData(self::PRODUCT_ID);
    }

    /**
     * Set Product ID
     *
     * @param int $product_id
     * @return $this
     */
    public function setProductId($product_id)
    {
        $this->setData(self::PRODUCT_ID, $product_id);
        return $this;
    }

    /**
     * Get Customer ID
     *
     * @return int|null
     */
    public function getCustomerId()
    {
        return $this->getData(self::CUSTOMER_ID);
    }

    /**
     * Set Customer ID
     *
     * @param int $customer_id
     * @return $this
     */
    public function setCustomerId($customer_id)
    {
        $this->setData(self::CUSTOMER_ID, $customer_id);
        return $this;
    }

    /**
     * Get Question
     *
     * @return string|null
     */
    public function getQuestion()
    {
        return $this->getData(self::QUESTION);
    }

    /**
     * Set Question
     *
     * @param string $question
     * @return $this
     */
    public function setQuestion($question)
    {
        $this->setData(self::QUESTION, $question);
        return $this;
    }

    /**
     * Get Answer
     *
     * @return string|null
     */
    public function getAnswer()
    {
        return $this->getData(self::ANSWER);
    }

    /**
     * Set Answer
     *
     * @param string $answer
     * @return $this
     */
    public function setAnswer($answer)
    {
        $this->setData(self::ANSWER, $answer);
        return $this;
    }

    /**
     * Get Status
     *
     * @return int|null
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set Status
     *
     * @param int $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->setData(self::STATUS, $status);
        return $this;
    }

    /**
     * Get Creation Timestamp
     *
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set Creation Timestamp
     *
     * @param string $created_at
     * @return $this
     */
    public function setCreatedAt($created_at)
    {
        $this->setData(self::CREATED_AT, $created_at);
        return $this;
    }

    /**
     * Get Updation Timestamp
     *
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * Set Updation Timestamp
     *
     * @param string $updated_at
     * @return $this
     */
    public function setUpdatedAt($updated_at)
    {
        $this->setData(self::UPDATED_AT, $updated_at);
        return $this;
    }
}
