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

    /**
     * @param bool|null $isClosed
     * @param string|null $name
     */
    public function __construct(?bool $isClosed, ?string $name)
    {
        $this->id = Uuid::new();
        $this->isClosed = $isClosed;
        $this->name = $name;
    }
}
