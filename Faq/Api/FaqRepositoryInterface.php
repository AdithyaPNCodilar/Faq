<?php
namespace Codilar\Faq\Api;

use Codilar\Faq\Api\Data\FaqInterface;


interface FaqRepositoryInterface
{
    public function save(FaqInterface $faq);

    public function getById($id);

    public function delete(FaqInterface $faq);
 
    public function getAllFaq();

    public function getNew();
    
}
