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

    #[ORM\Column(type: 'uuid', nullable: false)]
    #[ORM\ManyToOne(targetEntity: "User", inversedBy: "shoppingLists")]
    private string $owner;

    public function __construct(string $owner, ?string $name, ?bool $isClosed)
    {
        $this->id = Uuid::new();
        $this->isClosed = $isClosed;
        $this->name = $name;
        $this->owner = $owner;
    }
}
