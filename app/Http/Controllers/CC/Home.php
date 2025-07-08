<?php

namespace App\Http\Controllers\CC;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profession;
use App\Models\SocialMedia;
use App\Models\Statistic;
use Yajra\DataTables\Facades\DataTables;

class Home extends Controller
{
    public function index()
    {
        return view('cc.home.index');
    }

    public function skill_dt()
    {
        $data = Skill::orderByTranslation('name');

        return DataTables::eloquent($data)
            ->addColumn('action', function ($data) {
                $action_button = '';

                if(auth()->user()->canAny(['Beranda - Mengubah Keahlian', 'Beranda - Menghapus Keahlian'])) {
                    $action_button .= '
                                        <div class="d-flex justify-content-end">
                                            <a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end m-0" style="">
                                    ';

                    if(auth()->user()->can('Beranda - Mengubah Keahlian')) {
                        $action_button .= '
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2 btn_skill_edit" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#skill_modal_resource" value="'.$data->id.'">
                                                    <i class="bx bx-edit"></i>Edit
                                                </a>
                                            </li>
                                        ';
                    }

                    if(auth()->user()->can('Beranda - Menghapus Keahlian')) {
                        $action_button .= '
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2 btn_skill_delete" href="javascript:void(0)" value="'.$data->id.'">
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

    public function social_media_dt()
    {
        $data = SocialMedia::orderBy('name');

        return DataTables::eloquent($data)
            ->addColumn('action', function ($data) {
                $action_button = '';

                if(auth()->user()->canAny(['Beranda - Mengubah Media Sosial', 'Beranda - Menghapus Media Sosial'])) {
                    $action_button .= '
                                        <div class="d-flex justify-content-end">
                                            <a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end m-0" style="">
                                    ';

                    if(auth()->user()->can('Beranda - Mengubah Media Sosial')) {
                        $action_button .= '
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2 btn_social_media_edit" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#social_media_modal_resource" value="'.$data->id.'">
                                                    <i class="bx bx-edit"></i>Edit
                                                </a>
                                            </li>
                                        ';
                    }

                    if(auth()->user()->can('Beranda - Menghapus Media Sosial')) {
                        $action_button .= '
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2 btn_social_media_delete" href="javascript:void(0)" value="'.$data->id.'">
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

    public function statistic_dt()
    {
        $data = Statistic::orderByTranslation('label');

        return DataTables::eloquent($data)
            ->addColumn('action', function ($data) {
                $action_button = '';

                if(auth()->user()->canAny(['Beranda - Mengubah Statistik', 'Beranda - Menghapus Statistik'])) {
                    $action_button .= '
                                        <div class="d-flex justify-content-end">
                                            <a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end m-0" style="">
                                    ';

                    if(auth()->user()->can('Beranda - Mengubah Statistik')) {
                        $action_button .= '
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2 btn_statistic_edit" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#statistic_modal_resource" value="'.$data->id.'">
                                                    <i class="bx bx-edit"></i>Edit
                                                </a>
                                            </li>
                                        ';
                    }

                    if(auth()->user()->can('Beranda - Menghapus Statistik')) {
                        $action_button .= '
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2 btn_statistic_delete" href="javascript:void(0)" value="'.$data->id.'">
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

    public function profession_dt()
    {
        $data = Profession::orderByTranslation('name');

        return DataTables::eloquent($data)
            ->addColumn('action', function ($data) {
                $action_button = '';

                if(auth()->user()->canAny(['Beranda - Mengubah Profesi', 'Beranda - Menghapus Profesi'])) {
                    $action_button .= '
                                        <div class="d-flex justify-content-end">
                                            <a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end m-0" style="">
                                    ';

                    if(auth()->user()->can('Beranda - Mengubah Profesi')) {
                        $action_button .= '
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2 btn_profession_edit" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#profession_modal_resource" value="'.$data->id.'">
                                                    <i class="bx bx-edit"></i>Edit
                                                </a>
                                            </li>
                                        ';
                    }

                    if(auth()->user()->can('Beranda - Menghapus Profesi')) {
                        $action_button .= '
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2 btn_profession_delete" href="javascript:void(0)" value="'.$data->id.'">
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
