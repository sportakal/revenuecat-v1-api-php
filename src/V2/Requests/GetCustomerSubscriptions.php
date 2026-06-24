<?php

namespace Sportakal\RevenuecatV1ApiPhp\V2\Requests;

use Sportakal\RevenuecatV1ApiPhp\V2\Options;
use Sportakal\RevenuecatV1ApiPhp\V2\Request;
use Sportakal\RevenuecatV1ApiPhp\V2\Models\Subscription;

/**
 * GET /v2/projects/{project_id}/customers/{customer_id}/subscriptions
 * Tüm sayfaları (starting_after cursor ile) gezer, Subscription[] döner.
 */
class GetCustomerSubscriptions
{
    public function __construct(protected string $customerId)
    {
    }

    /**
     * @return Subscription[]
     * @throws \Exception
     */
    public function get(Options $options): array
    {
        $request = new Request($options);
        $path = 'projects/' . $options->getProjectId()
            . '/customers/' . rawurlencode($this->customerId) . '/subscriptions';

        $subscriptions = [];
        $query = ['limit' => 50];

        do {
            // tolerate_not_found: RC'nin tanımadığı customer 404 verir → boş liste (v1 get-or-create yerine).
            $data = $request->get($path, $query, true);
            $items = $data['items'] ?? [];

            foreach ($items as $item) {
                $subscriptions[] = Subscription::fromArray($item, $options->getTimezone());
            }

            $has_next = !empty($data['next_page']) && !empty($items);
            if ($has_next) {
                $query['starting_after'] = end($items)['id'] ?? null;
            }
        } while ($has_next && $query['starting_after'] !== null);

        return $subscriptions;
    }
}
