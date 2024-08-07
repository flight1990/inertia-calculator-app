<?php

namespace App\Actions\Seo\Guest;

use App\Tasks\Seo\Guest\FindSeoByUrlTask;
use Illuminate\Database\Eloquent\Model;

class GetSeoAction
{
    public function __construct(
        protected FindSeoByUrlTask $findSeoByUrlTask
    )
    {
    }

    public function run(string $url): Model|null
    {
        $parsedUrl = parse_url($url);
        parse_str($parsedUrl['query'] ?? '', $queryParams);
        unset($queryParams['data']);

        $newUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'];

        if (isset($parsedUrl['port'])) {
            $newUrl .= ':' . $parsedUrl['port'];
        }

        $newUrl .= $parsedUrl['path'] ?? '';

        return $this->findSeoByUrlTask->run($newUrl);
    }
}
