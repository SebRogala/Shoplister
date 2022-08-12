<?php

namespace App\Infrastructure\Shop;

use App\Domain\ShopSection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ShopSection>
 *
 * @method ShopSection|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShopSection|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShopSection[]    findAll()
 * @method ShopSection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShopSectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShopSection::class);
    }

    public function add(ShopSection $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ShopSection $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
