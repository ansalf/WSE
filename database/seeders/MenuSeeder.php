<?php

namespace Database\Seeders;

use App\Constant\ReactRoute;
use App\Constant\Routes;
use App\Models\Feature;
use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    protected $types = [
        [
            'menuroute' => Routes::routeAdminDashboard,
            'menunm' => 'Dashboard',
            'menuicon' => 'fas fa-fire',
            'features' => [
                [
                    'feattitle' => 'View',
                    'featslug' => 'view',
                ]
            ]
        ],
        [
            'menunm' => 'Masters',
            'menuicon' => 'fa fa-folder',
            'features' => [
                [
                    'feattitle' => 'View',
                    'featslug' => 'view',
                ]
            ],
            'children' => [
                [
                    'menuroute' => Routes::routeMasterUsers,
                    'menunm' => 'Master Users',
                    'menuicon' => 'fa fa-users',
                    'features' => [
                        [
                            'feattitle' => 'View',
                            'featslug' => 'view',
                        ],
                        [
                            'feattitle' => 'Add',
                            'featslug' => 'add',
                        ],
                        [
                            'feattitle' => 'Edit',
                            'featslug' => 'edit',
                        ],
                        [
                            'feattitle' => 'Delete',
                            'featslug' => 'delete',
                        ],
                    ]
                ],
                [
                    'menuroute' => Routes::routeMasterNews,
                    'menunm' => 'Master News',
                    'menuicon' => 'fa fa-newspaper',
                    'features' => [
                        [
                            'feattitle' => 'View',
                            'featslug' => 'view',
                        ],
                        [
                            'feattitle' => 'Add',
                            'featslug' => 'add',
                        ],
                        [
                            'feattitle' => 'Edit',
                            'featslug' => 'edit',
                        ],
                        [
                            'feattitle' => 'Delete',
                            'featslug' => 'delete',
                        ],
                        [
                            'feattitle' => 'Toggle',
                            'featslug' => 'toggle',
                        ],
                    ]
                ]
            ]
        ],
        [
            'menunm' => 'Settings',
            'menuicon' => 'fas fa-bars',
            'features' => [
                [
                    'feattitle' => 'View',
                    'featslug' => 'view',
                ]
            ],
            'children' => [
                [
                    'menuroute' => Routes::routeSettingPermission,
                    'menunm' => 'Permission',
                    'menuicon' => 'fa fa-key',
                    'features' => [
                        [
                            'feattitle' => 'View',
                            'featslug' => 'view',
                        ],
                        [
                            'feattitle' => 'Add',
                            'featslug' => 'add',
                        ],
                    ]
                ],
                [
                    'menuroute' => Routes::routeSettingTypes,
                    'menunm' => 'Types',
                    'menuicon' => 'fa fa-list',
                    'features' => [
                        [
                            'feattitle' => 'View',
                            'featslug' => 'view',
                        ],
                        [
                            'feattitle' => 'Add',
                            'featslug' => 'add',
                        ],
                        [
                            'feattitle' => 'Edit',
                            'featslug' => 'edit',
                        ],
                        [
                            'feattitle' => 'Delete',
                            'featslug' => 'delete',
                        ],
                    ]
                ]
            ]
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(Menu $menu, Feature $feature): void
    {
        foreach ($this->types as $key => $value) {
            $parent = $menu->create(collect($value)->only($menu->getFillable())->toArray());
            if (isset($value['children']))
                $this->createChildren($menu, $feature, $parent->id, $value['children']);
            if (isset($value['features']))
                $this->createFeature($feature, $parent->id, $value['features']);
        }
    }

    public function createChildren(Menu $menu, Feature $feature, int $masterid, array $children)
    {
        foreach ($children as $key => $value) {
            $value['masterid'] = $masterid;
            $child = $menu->create(collect($value)->only($menu->getFillable())->toArray());
            if (isset($value['children']))
                $this->createChildren($menu, $feature, $child->id, $value['children']);
            if (isset($value['features']))
                $this->createFeature($feature, $child->id, $value['features']);
        }
    }

    public function createFeature(Feature $feature, int $masterid, array $children)
    {
        foreach ($children as $key => $value) {
            $value['featmenuid'] = $masterid;
            $child = $feature->create(collect($value)->only($feature->getFillable())->toArray());
            if (isset($value['features']))
                $this->createFeature($feature, $child->id, $value['features']);
        }
    }
}
