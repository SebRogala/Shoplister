<?php

namespace App\Domain;

use App\Infrastructure\Shop\ShopSectionRepository;
use App\Infrastructure\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShopSectionRepository::class)]
#[ORM\Table(name: '`shop_section`')]
class ShopSection
{
    #[ORM\Id]
    #[ORM\GeneratedValue('NONE')]
    #[ORM\Column(type: 'uuid')]
    private string|null $id = null;

    #[ORM\Column(length: 255)]
    private string $name;

    public function __construct(string $name)
    {
        $this->id = Uuid::new();
        $this->name = $name;
    }
}
