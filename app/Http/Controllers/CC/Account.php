<?php

namespace App\Http\Controllers\CC;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class Account extends Controller
{
    public function index()
    {
        return view('cc.account.index');
    }

    public function dt()
    {
        $data = User::with(['roles'])->select('users.*');

        return DataTables::eloquent($data)
            ->addColumn('action', function ($data) {
                $action_button = '';

                if(auth()->user()->canAny(['Akun - Melihat Data', 'Akun - Mengubah Data', 'Akun - Mengubah Status Akun'])) {
                    $action_button .= '
                                        <div class="d-inline-block">
                                            <a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end m-0" style="">
                                    ';

                    if(auth()->user()->can('Akun - Melihat Data')) {
                        $action_button .= '
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2 btn_open" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#mc_detail" value="'.$data->id.'">
                                                    <i class="bx bx-fullscreen"></i>Lihat
                                                </a>
                                            </li>
                                        ';
                    }

                    if(auth()->user()->can('Akun - Mengubah Data')) {
                        $action_button .= '
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2 btn_edit" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modal_resource" value="'.$data->id.'">
                                                    <i class="bx bx-edit"></i>Edit
                                                </a>
                                            </li>
                                        ';
                    }

                    if(auth()->user()->can('Akun - Mengubah Status Akun')) {
                        $action_button .= '
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2 btn_edit_account_status" href="javascript:void(0)" value="'.$data->id.'">
                                                    <i class="bx '.($data->account_status == 1 ? 'bx-x' : 'bx-check').'"></i> '.($data->account_status == 1 ? 'Nonaktifkan' : 'Aktifkan').'
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
            ->addColumn('user', function ($data) {
                $avatar = '<img src="'.asset('src/img/user/'.$data->avatar).'" alt="User Image" class="rounded-circle" width="40" />';

                return '
                        <div class="d-flex justify-content-start align-items-center user-name">
                            <div class="avatar-wrapper">
                                <div class="avatar me-2">
                                    '.$avatar.'
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <span class="emp_name text-truncate text-heading">'.$data->name.'</span>
                                <small class="emp_post text-truncate">Sejak '.Carbon::parse($data->created_at)->isoFormat('D MMMM Y').'</small>
                            </div>
                        </div>
                       ';
            })
            ->addColumn('role', function (User $user) {
                return $user->getRoleNames()->first();
            })
            ->addColumn('status', function (User $user) {
                return $user->account_status == 1 ? 'Aktif' : 'Tidak Aktif';
            })
            ->filterColumn('status', function ($query, $keyword) {
                $keyword = Str::lower($keyword); // Ubah keyword menjadi huruf kecil untuk pencarian case-insensitive

                // Kondisi untuk mencari 'Aktif'
                if (Str::contains('aktif', $keyword)) {
                    $query->orWhere('account_status', 1);
                }
                // Kondisi untuk mencari 'Tidak Aktif'
                if (Str::contains('tidak aktif', $keyword) || Str::contains('nonaktif', $keyword)) {
                    $query->orWhere('account_status', 0);
                }

                // Kondisi untuk mencari berdasarkan bagian dari kata "Aktif" atau "Tidak Aktif"
                // Ini adalah bagian kunci untuk menangani kasus seperti mengetik "t"
                if (Str::startsWith('a', $keyword) || Str::startsWith('ak', $keyword) || Str::startsWith('akt', $keyword) || Str::startsWith('akti', $keyword)) {
                    $query->orWhere('account_status', 1);
                } elseif (Str::startsWith('t', $keyword) || Str::startsWith('ti', $keyword) || Str::startsWith('tid', $keyword) || Str::startsWith('tida', $keyword) || Str::startsWith('tidak', $keyword)) {
                    $query->orWhere('account_status', 0);
                } elseif (Str::startsWith('n', $keyword) || Str::startsWith('no', $keyword) || Str::startsWith('non', $keyword) || Str::startsWith('nona', $keyword) || Str::startsWith('nonak', $keyword)) {
                    $query->orWhere('account_status', 0);
                }

                // Kondisi untuk mencari angka 1 atau 0 secara langsung
                if ($keyword === '1') {
                    $query->orWhere('account_status', 1);
                } elseif ($keyword === '0') {
                    $query->orWhere('account_status', 0);
                }
            })
            ->escapeColumns([])
            ->make(true);
    }
}
