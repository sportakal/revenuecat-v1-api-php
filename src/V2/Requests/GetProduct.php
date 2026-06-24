<?php

namespace Sportakal\RevenuecatV1ApiPhp\V2\Requests;

use Sportakal\RevenuecatV1ApiPhp\V2\Options;
use Sportakal\RevenuecatV1ApiPhp\V2\Request;
use Sportakal\RevenuecatV1ApiPhp\V2\Models\Product;

/**
 * GET /v2/projects/{project_id}/products/{product_id}
 * Internal product_id → store_identifier (SKU) için. Sonuç cache'lenmeli (Config domain rate-limit'i düşük).
 */
class GetProduct
{
    public function __construct(protected string $productId)
    {
    }

    /**
     * @throws \Exception
     */
    public function get(Options $options): Product
    {
        $request = new Request($options);
        $path = 'projects/' . $options->getProjectId() . '/products/' . rawurlencode($this->productId);

        return Product::fromArray($request->get($path));
    }
}
