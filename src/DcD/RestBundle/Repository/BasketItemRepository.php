<?php

namespace DcD\RestBundle\Repository;

/**
 * BasketItemRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BasketItemRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * get all basketItems that are belongs to a basket
     * implemented to avoid lazy loading always the basket entity
     *
     * @param $basketId
     * @return array
     */
    public function getItems($basketId)
    {
        return $this->getEntityManager()->createQuery('
            SELECT 
              bi.id, 
              bi.info 
            FROM 
              RestBundle:BasketItem bi 
            WHERE 
              bi.basket = :id
         ')
            ->setParameter('id', $basketId)
            ->getResult();
    }

    /**
     * get one basketItem
     * implemented to avoid lazy loading always the basket entity
     *
     * @param $basketItemId
     * @return array
     */
    public function getItem($basketItemId)
    {
        return $this->getEntityManager()->createQuery('
            SELECT 
              bi.id, 
              bi.info 
            FROM 
              RestBundle:BasketItem bi 
            WHERE 
              bi.id = :id
         ')
            ->setParameter('id', $basketItemId)
            ->getResult();
    }
}
