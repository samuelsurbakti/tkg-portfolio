<div class="col-xl-4 col-lg-5 masonry-card">
    <div class="card">
        <div class="card-header">
            <div class="card-title header-elements">
                <h5 class="m-0 me-2">Daftar Statistik</h5>
                <div class="card-title-elements ms-auto">
                    @can('Beranda - Menambah Statistik')
                        <button type="button" id="btn_statistic_add" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#statistic_modal_resource" >
                            Tambah Data
                        </button>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table id="statistic_table" class="table border-top table-responsive">
                <thead>
                    <tr>
                        <th>Label</th>
                        <th>Jumlah</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
