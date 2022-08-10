<?php

namespace App\Domain;

use App\Domain\Trait\Timestamps;
use App\Infrastructure\ShoppingList\ShoppingListRepository;
use App\Infrastructure\Uuid;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShoppingListRepository::class)]
#[ORM\Table(name: '`shopping_list`')]
class ShoppingList
{
    #[ORM\Id]
    #[ORM\GeneratedValue('NONE')]
    #[ORM\Column(type: 'uuid')]
    private string|null $id = null;

    #[ORM\Column(type: 'boolean')]
    private bool|null $isClosed;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: 'integer')]
    private int $counterOfItems;

    #[ORM\JoinColumn(nullable: false)]
    #[ORM\ManyToOne(targetEntity: "User", inversedBy: "shoppingLists")]
    private User $owner;

    #[ORM\JoinColumn(nullable: true)]
    #[ORM\ManyToOne(targetEntity: "Shop")]
    private ?Shop $shop;

    #[ORM\OneToMany(
        mappedBy: "list",
        targetEntity: "ShoppingListItem",
        cascade: ["persist", "remove", "merge"]
    )]
    public $items;

    use Timestamps;

    public function __construct(User $owner, ?string $name, ?Shop $shop, ?bool $isClosed)
    {
        $this->id = Uuid::new();
        $this->items = new ArrayCollection();
        $this->counterOfItems = 0;

        $this->isClosed = $isClosed;
        $this->name = $name;
        $this->owner = $owner;
        $this->shop = $shop;
        $this->timestamps();
    }

    public function updateCounter(): void
    {
        $this->counterOfItems = $this->items->count();
        $this->setUpdatedAt();
    }
}
