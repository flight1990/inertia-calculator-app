<?php

namespace App\Actions\Menu;

use App\Tasks\Menu\GetMenuToTreeTask;

class GetMenuToTreeForParentSelectorAction
{
    public function __construct(
        protected GetMenuToTreeTask $getMenuToTreeTask
    )
    {
    }

    public function run(int $id = null): array
    {
        $tree = $this->getMenuToTreeTask->run($id, 1);
        return self::traverseToArray($tree);
    }

    private static function traverse($items, $prefix = '-'): array
    {
        $result = [];

        foreach ($items as $item) {
            $result[] = ['id' => $item->id, 'title' => $prefix . ' ' . $item->title];
            $result = array_merge($result, self::traverse($item->children, $prefix . '-'));
        }

        return $result;
    }

    private static function traverseToArray($nodes): array
    {
        return self::traverse($nodes);
    }
}
