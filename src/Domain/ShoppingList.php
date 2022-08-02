<?php

namespace App\Domain;

use App\Infrastructure\ShoppingList\ShoppingListRepository;
use App\Infrastructure\Uuid;
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

    #[ORM\JoinColumn(nullable: false)]
    #[ORM\ManyToOne(targetEntity: "User", inversedBy: "shoppingLists")]
    private User $owner;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $createdAt;

    public function __construct(User $owner, ?string $name, ?bool $isClosed)
    {
        $this->id = Uuid::new();
        $this->createdAt = new \DateTimeImmutable();

        $this->isClosed = $isClosed;
        $this->name = $name;
        $this->owner = $owner;
    }
}
