<?php

namespace App\Domain;

use App\Infrastructure\Shop\ShopRepository;
use App\Infrastructure\Uuid;
use Doctrine\ORM\Mapping as ORM;
use Webmozart\Assert\Assert;

#[ORM\Entity(repositoryClass: ShopRepository::class)]
#[ORM\Table(name: '`shop`')]
class Shop
{
    #[ORM\Id]
    #[ORM\GeneratedValue('NONE')]
    #[ORM\Column(type: 'uuid')]
    private string|null $id = null;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column(length: 255)]
    private string $address;

    #[ORM\JoinColumn(nullable: false)]
    #[ORM\ManyToOne(targetEntity: "User")]
    private User $creator;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $updatedAt;

    public function __construct(User $creator, string $name, string $address)
    {
        $this->id = Uuid::new();
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
        $this->creator = $creator;

        Assert::stringNotEmpty($name, "Name cannot be empty");
        $this->name = $name;

        Assert::stringNotEmpty($address, "Address cannot be empty");
        $this->address = $address;
    }
}
