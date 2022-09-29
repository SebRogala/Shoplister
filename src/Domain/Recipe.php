<?php

namespace App\Domain;

use App\Domain\Trait\Timestamps;
use App\Infrastructure\Recipe\RecipeRepository;
use App\Infrastructure\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecipeRepository::class)]
#[ORM\Table(name: '`recipe`')]
class Recipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue('NONE')]
    #[ORM\Column(type: 'uuid')]
    private string|null $id = null;

    #[ORM\JoinColumn(nullable: false)]
    #[ORM\ManyToOne(targetEntity: "User")]
    private User $creator;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column(type: 'smallint')]
    private string $portions;

    #[ORM\Column(type: 'smallint')]
    private string $calories;

    #[ORM\Column(type: 'text')]
    private string $description;

    //ingredients

    use Timestamps;

    public function __construct(User $creator)
    {
        $this->id = Uuid::new();


        $this->timestamps();
    }
}
