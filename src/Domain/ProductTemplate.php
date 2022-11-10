<?php

namespace App\Domain;

use App\Domain\Trait\Timestamps;
use App\Infrastructure\Product\ProductTemplateRepository;
use App\Infrastructure\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductTemplateRepository::class)]
#[ORM\Table(name: '`product_template`')]
#[ORM\Index(columns: ['searchable'], flags: ['fulltext'])]
class ProductTemplate
{
    #[ORM\Id]
    #[ORM\GeneratedValue('NONE')]
    #[ORM\Column(type: 'uuid')]
    private string|null $id = null;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column(length: 255)]
    private string $searchable;

    #[ORM\Column(length: 50)]
    private string $unit;

    #[ORM\Column(type: 'float')]
    private string $quantity;

    #[ORM\JoinColumn(nullable: false)]
    #[ORM\ManyToOne(targetEntity: "ShopSection")]
    private ShopSection $section;

    use Timestamps;

    public function __construct(string $name, string $unit, string $quantity, ShopSection $section)
    {
        $this->id = Uuid::new();

        $this->name = $name;
        $this->quantity = $quantity;
        $this->unit = $unit;
        $this->section = $section;
        $this->searchable = $this->transformToSearchable($name);

        $this->timestamps();
    }

    public function transformToSearchable(string $name): string
    {
        //source: https://gist.github.com/evaisse/169594/1018cbfca3881f40e59560568d9b9d3dc12061d1
        return preg_replace(
            '~&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i',
            '$1',
            htmlentities($name, ENT_QUOTES, 'UTF-8')
        );
    }
}
