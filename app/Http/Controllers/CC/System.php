<?php

namespace App\Http\Controllers\CC;

use Illuminate\Http\Request;
use App\Models\RaP\Permission;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class System extends Controller
{
    public function index()
    {
        return view('cc.system.index');
    }

    public function permission_dt()
    {
        $data = Permission::select(['rap_permissions.*', 'sys_menus.title as menu'])
        ->leftJoin('sys_menus', 'rap_permissions.menu_id', '=', 'sys_menus.id')
        ->orderBy('sys_menus.order_number', 'asc')
        ->orderBy('rap_permissions.type', 'desc')
        ->orderBy('rap_permissions.number', 'asc');

        return DataTables::eloquent($data)
            ->addColumn('role', function ($data) {
                $role_list = '<span class="d-flex flex-wrap">';

                foreach ($data->roles->pluck('name') as $role) {
                    $role_list .= '<span class="m-1 badge rounded-pill text-bg-primary">'.$role.'</span>';
                }

                $role_list .= '</span>';

                return $role_list;
            })
            ->addColumn('action', function ($data) {
                $action_button = '';

                if(auth()->user()->can('Sistem - Mengubah Izin')) {
                    $action_button .= '<button class="btn btn-icon btn_permission_edit" data-bs-toggle="modal" data-bs-target="#modal_permission_resource" value="'.$data->uuid.'"><i class="icon-base bx bx-edit icon-sm"></i></button>';
                }

                return $action_button;
            })
            ->escapeColumns([])
            ->make(true);
    }
}
