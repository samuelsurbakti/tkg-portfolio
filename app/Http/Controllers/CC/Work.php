<?php

namespace App\Http\Controllers\CC;

use Illuminate\Http\Request;
use App\Models\Work\Category;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class Work extends Controller
{
    public function index()
    {
        return view('cc.work.index');
    }

    public function category_dt()
    {
        $data = Category::orderByTranslation('name');

        return DataTables::eloquent($data)
            ->addColumn('action', function ($data) {
                $action_button = '';

                if(auth()->user()->canAny(['Pekerjaan - Mengubah Kategori', 'Pekerjaan - Menghapus Kategori'])) {
                    $action_button .= '
                                        <div class="d-flex justify-content-end">
                                            <a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end m-0" style="">
                                    ';

                    if(auth()->user()->can('Pekerjaan - Mengubah Kategori')) {
                        $action_button .= '
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2 btn_category_edit" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#category_modal_resource" value="'.$data->id.'">
                                                    <i class="bx bx-edit"></i>Edit
                                                </a>
                                            </li>
                                        ';
                    }

                    if(auth()->user()->can('Pekerjaan - Menghapus Kategori')) {
                        $action_button .= '
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2 btn_category_delete" href="javascript:void(0)" value="'.$data->id.'">
                                                    <i class="bx bx-trash"></i>Hapus
                                                </a>
                                            </li>
                                        ';
                    }

                    $action_button .= '
                                            </ul>
                                        </div>
                                    ';
                }

                return $action_button;
            })
            ->escapeColumns([])
            ->make(true);
    }
}
