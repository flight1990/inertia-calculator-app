<?php

namespace App\Actions\Calculators;

use App\Tasks\Calculators\GetCalculatorsByIdsTask;
use App\Tasks\Calculators\SearchCalculatorsTask;
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
