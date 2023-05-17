<?php

namespace Codilar\Faq\Api;

use Codilar\Faq\Api\Data\FaqInterface;

/**
 * Interface FaqRepositoryInterface
 * @package Codilar\Faq\Api
 */
interface FaqRepositoryInterface
{
    /**
     * Save FAQ
     *
     * @param FaqInterface $faq
     * @return FaqInterface
     */
    public function save(FaqInterface $faq);

    /**
     * Get FAQ by ID
     *
     * @param int $id
     * @return FaqInterface
     */
    public function getById($id);

    /**
     * Delete FAQ
     *
     * @param FaqInterface $faq
     * @return bool
     */
    public function delete(FaqInterface $faq);

    /**
     * Get all FAQs
     *
     * @return FaqInterface[]
     */
    public function getAllFaq();

    /**
     * Get new instance of FAQ
     *
     * @return FaqInterface
     */
    public function getNew();
}
