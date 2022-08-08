<?php

namespace App\Domain;

use App\Infrastructure\ShoppingList\ShoppingListItemRepository;
use App\Infrastructure\Uuid;
use Doctrine\ORM\Mapping as ORM;
use Webmozart\Assert\Assert;

#[ORM\Entity(repositoryClass: ShoppingListItemRepository::class)]
#[ORM\Table(name: '`shopping_list_item`')]
class ShoppingListItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue('NONE')]
    #[ORM\Column(type: 'uuid')]
    private string|null $id = null;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column(type: 'float')]
    private string $quantity;

    #[ORM\Column(length: 50)]
    private string $unit;

    #[ORM\JoinColumn(nullable: false)]
    #[ORM\ManyToOne(targetEntity: "ShoppingList", inversedBy: "items")]
    private ShoppingList $list;

    #[ORM\Column(type: 'boolean')]
    private bool|null $isDone;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $updatedAt;

    public function __construct(ShoppingList $list, string $name, float $quantity, string $unit)
    {
        $this->id = Uuid::new();
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
        $this->isDone = false;

        Assert::stringNotEmpty($name, "Name cannot be empty");
        $this->name = $name;

        Assert::numeric($quantity, "Quantity needs to be numeric");
        $this->quantity = $quantity;

        $this->unit = $unit;
        $this->list = $list;
    }

    public function toggleIsDone(): void
    {
        $this->isDone = !$this->isDone;
        $this->updatedAt = new \DateTimeImmutable();
    }
}
