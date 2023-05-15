<?php

namespace Codilar\Faq\Model;

use Codilar\Faq\Api\Data\FaqInterface;

use Magento\Framework\Model\AbstractModel;


class Faq extends AbstractModel implements FaqInterface
{
    protected function _construct()
    {
        $this->_init('Codilar\Faq\Model\ResourceModel\Faq');
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function setId($id)
    {
        $this->setData(self::ID, $id);
        return $this;   
    }

    public function getProductId()
    {
        return $this->getData(self::PRODUCT_ID);
    }

    public function setProductId($product_id)
    {
        $this->setData(self::PRODUCT_ID, $product_id);
        return $this;
    }

    public function getCustomerId()
    {
        return $this->getData(self::CUSTOMER_ID);
    }

    public function setCustomerId($customer_id)
    {
        $this->setData(self::CUSTOMER_ID, $customer_id);
        return $this;
    }

    public function getQuestion()
    {
        return $this->getData(self::QUESTION);
    }

    public function setQuestion($question)
    {
        $this->setData(self::QUESTION, $question);
        return $this;
    }

    public function getAnswer()
    {
        return $this->getData(self::ANSWER);
    }

    public function setAnswer($answer)
    {
        $this->setData(self::ANSWER, $answer);
        return $this;
    }

    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    public function setStatus($status)
    {
        $this->setData(self::STATUS, $status);
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt($created_at)
    {
        $this->setData(self::CREATED_AT, $created_at);
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    public function setUpdatedAt($updated_at)
    {
        $this->setData(self::UPDATED_AT, $updated_at);
        return $this;
    }
}
