<?php

namespace App\Presentation\Shop\Action;

use App\Application\Query\Shop\ShopSectionsQuery;
use App\Application\Query\Shop\ShopSectionsView;
use App\Application\Query\Shop\ShopsQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetShopSectionsConfigAction extends AbstractController
{
    #[Route("/shop/{shopId}/sections", name: "shop_sections_config.get", methods: ["GET"])]
    public function index(string $shopId, ShopSectionsQuery $shopSectionsQuery, ShopsQuery $shopsQuery): Response
    {
        $allSections = $shopSectionsQuery->findAll();
        $orderedSections = $shopsQuery->getShopsSectionsOrder($shopId);

        if (!empty($orderedSections)) {
            foreach ($orderedSections as $keyOne => $sectionId) {
                /**
                 * @var int $keyTwo
                 * @var ShopSectionsView $section
                 */
                foreach ($allSections as $keyTwo => $section) {
                    if ($section->getId() === $sectionId) {
                        $orderedSections[$keyOne] = $section->toArray();
                        unset($allSections[$keyTwo]);
                        break;
                    }
                }
            }
        }

        return new JsonResponse([
            'orderedSections' => $orderedSections,
            'otherSections' => array_values(array_map(function (ShopSectionsView $item) {
                return $item->toArray();
            }, $allSections)),
        ]);
    }
}
