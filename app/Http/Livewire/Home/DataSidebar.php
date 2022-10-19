<?php
namespace App\Http\Livewire\Home;
class DataSidebar
{
    public $data = [
        'dashboard' =>[
            'name' => 'Dashboard',
            'path' => '/',
            'sub_menus' => null,
            'active' => false,
        ],
        'master' =>[
            'name' => 'Master',
            'path' => '/master',
            'active' => false,
            'sub_menus' => [
                'data_1' => [
                    'name' => 'data_1',
                    'path' => '/',
                    'active' => false,
                ],
                'data_2' => [
                    'name' => 'data_2',
                    'path' => '/',
                    'active' => false,
                ],
            ],
        ],
    ];
    public function data($active, $sub_active = null){
        if($sub_active == null){
            $this->data[$active]['active'] = true;
        } else {
            $this->data[$active]['active'] = true;
            $this->data[$active]['sub_menus'][$sub_active]['active'] = true;
        }
        return $this->data;
    }
}

