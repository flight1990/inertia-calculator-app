<?php

namespace App\Actions\Menu;

use App\Tasks\Menu\GetMenuToTreeTask;

class BuildMenusFromDataBaseAction
{
    public function __construct(
        protected GetMenuToTreeTask $getMenuToTreeTask
    )
    {
    }

    public function run($menu)
    {
        $node = $this->getMenuToTreeTask->run();

        $menuBuilder = function ($menus, $parent = null) use (&$menuBuilder, &$menu) {

            foreach ($menus as $item) {

                $nickName = 'menu_' . $item->id;
                $url = empty($item->url) ? ['disableActivationByURL' => 'true'] : $item->url;

                if (empty($parent)) {
                    $menu->add($item->title, $url)
                        ->attr(['icon' => $item->icon])
                        ->nickname($nickName);
                } else {
                    $menu->item($parent)->add($item->title, $url)
                        ->attr(['icon' => $item->icon])
                        ->nickname($nickName);
                }

                $menuBuilder($item->children, $nickName);
            }
        };

        $menuBuilder($node);

        return $menu;
    }
}
