<?php

namespace Database\Seeders;

use App\Constant\DBTypes;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    protected $types = [
        [
            'code' => DBTypes::UserRole,
            'name' => 'User Role',
            'children' => [
                [
                    'name' => 'Super Admin',
                    'desc' => 'important',
                    'code' => DBTypes::RoleSuperAdmin
                ],
                [
                    'name' => 'Ketua Umum',
                    'code' => DBTypes::RoleKetum
                ],
                [
                    'name' => 'Sekretaris Umum',
                    'code' => DBTypes::RoleSekum
                ],
                [
                    'name' => 'Bendahara Umum',
                    'code' => DBTypes::RoleBendum
                ],
                [
                    'name' => 'Kepala Divisi IT',
                    'code' => DBTypes::RoleKadivIt
                ],
                [
                    'name' => 'Kepala Divisi Robotic',
                    'code' => DBTypes::RoleKadivRb
                ],
                [
                    'name' => 'Kepala Divisi Projas',
                    'code' => DBTypes::RoleKadivPr
                ],
                [
                    'name' => 'Kepala Divisi PC',
                    'code' => DBTypes::RoleKadivPc
                ],
                [
                    'name' => 'Pengurus Harian',
                    'code' => DBTypes::RolePH
                ],
                [
                    'name' => 'Anggota',
                    'code' => DBTypes::RoleAnggota
                ]
            ]
        ],
        [
            'code' => DBTypes::UserGender,
            'name' => 'User Gender',
            'children' => [
                [
                    'name' => 'Laki - Laki',
                    'desc' => 'important',
                    'code' => DBTypes::UserGenderM
                ],
                [
                    'name' => 'Perempuan',
                    'desc' => 'important',
                    'code' => DBTypes::UserGenderF
                ]
            ]
        ],
        [
            'code' => DBTypes::FileTypes,
            'name' => 'File Type',
            'children' => [
                [
                    'name' => 'Type Picture',
                    'desc' => 'important',
                    'code' => DBTypes::FileTypePic
                ],
                [
                    'name' => 'Profile Picture',
                    'desc' => 'important',
                    'code' => DBTypes::FileProfilePic
                ],
                [
                    'name' => 'Demisioner Picture',
                    'desc' => 'important',
                    'code' => DBTypes::FileDemisPic
                ],
                [
                    'name' => 'News Thumbnail',
                    'desc' => 'important',
                    'code' => DBTypes::FileNewsThumb
                ]
            ]
        ],
        [
            'code' => DBTypes::NewsCategory,
            'name' => 'Kategory Berita',
            'children' => [
                [
                    'name' => 'Information Technology',
                    'code' => DBTypes::NewsCategoryIT
                ],
                [
                    'name' => 'Robotik',
                    'code' => DBTypes::NewsCategoryRo
                ],
                [
                    'name' => 'Power Control',
                    'code' => DBTypes::NewsCategoryPC
                ],
                [
                    'name' => 'Produk & Jasa',
                    'code' => DBTypes::NewsCategoryPr
                ],
            ]
        ],
        [
            'code' => DBTypes::NewsStatus,
            'name' => 'Status Berita',
            'children' => [
                [
                    'name' => 'Draft',
                    'desc' => 'important',
                    'code' => DBTypes::NewsDraft
                ],
                [
                    'name' => 'Diunggah',
                    'desc' => 'important',
                    'code' => DBTypes::NewsPublished
                ],
                [
                    'name' => 'Disimpan',
                    'desc' => 'important',
                    'code' => DBTypes::NewsArchived
                ],
            ]
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(Type $type): void
    {
        foreach ($this->types as $key => $value) {
            $parent = $type->create(collect($value)->only($type->getFillable())->toArray());
            if (isset($value['children']))
                $this->createChildren($type, $parent->id, $value['children']);
        }
    }

    public function createChildren(Type $type, int $masterid, array $children)
    {
        foreach ($children as $key => $value) {
            $value['master_id'] = $masterid;
            $child = $type->create(collect($value)->only($type->getFillable())->toArray());
            if (isset($value['children']))
                $this->createChildren($type, $child->id, $value['children']);
        }
    }
}
