<?php

namespace App\Actions\Calculators\Guest;

use App\Tasks\Calculators\Guest\GetCalculatorsByIdsTask;
use App\Tasks\Calculators\Guest\SearchCalculatorsTask;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class SearchCalculatorsAction
{
    public function __construct(
        protected SearchCalculatorsTask   $searchCalculatorsTask,
        protected GetCalculatorsByIdsTask $getCalculatorsByIdsTask
    )
    {
    }

    public function run(?string $search = null): Collection
    {
        $searchResults = [];

        if (!empty($search)) {
            $searchResults = $this->searchCalculatorsTask->run($search);
        }

        return !empty($searchResults['hits'])
            ? $this->getCalculatorsByIdsTask->run(Arr::pluck($searchResults['hits'], 'id'))
            : collect([]);
    }
}
