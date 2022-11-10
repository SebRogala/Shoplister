<?php

namespace App\Infrastructure\Product;

use App\Domain\ProductTemplate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProductTemplate>
 *
 * @method ProductTemplate|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductTemplate|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductTemplate[]    findAll()
 * @method ProductTemplate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductTemplateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductTemplate::class);
    }

    public function add(ProductTemplate $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ProductTemplate $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
