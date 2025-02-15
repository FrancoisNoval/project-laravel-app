<x-layout>
    @push('styles')
        <style>
            .text-nav {
                color: #012970
            }

            .form-text {
                text-transform: lowercase;
                font-style: italic;
                font-weight: lighter;
            }
            .button-container {
                /* position: absolute; */
                bottom: 10px;
                left: 10px;
            }
            fieldset.scheduler-border {
                border: 1px groove #ddd !important;
                padding: 0 1.4em 1.4em 1.4em !important;
                margin: 0 0 1.5em 0 !important;
                -webkit-box-shadow:  0px 0px 0px 0px #000;
                        box-shadow:  0px 0px 0px 0px #000;
            }
            legend.legend-border {
                font-size: 1.2em !important;
                font-weight: bold !important;
                text-align: left !important;
                width:auto;
                padding:0 10px;
                border-bottom:none;
            }

        </style>
        <link href="{{ asset('assets/vendor/select2/css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/select2/css/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet">
    @endpush
    @section('title', 'Aset')
    <section class="section">
        <x-modal id="asset-modal" size="modal-fullscreen">
            <x-slot name="title">Form @yield('title')</x-slot>
            <x-slot name="body">
                <form id="asset-form" class="form needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="p-2">
                                {{-- <div class="card-body"> --}}
                                {{-- <div class="mb-2">
                                        <label for="asset_used_by" class="col-form-label">Pilih Pengguna</label>
                                        <select class="form-control select2users" data-action="{{route('admin.user.ajax')}}" name="asset_used_by" id="asset_used_by">
                                        </select>
                                        <div class="form-text">Input NRK untuk mengambil data dari Siadik</div>
                                        <input type="hidden" name="asset_category_id" id="asset_category_id">
                                        <input type="hidden" name="item_category_id" id="item_category_id">

                                    </div> --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                            <label for="asset_document_number" class="col-form-label mandatory">Pilih
                                                atau masukan nomor dokumen baru</label>
                                            <select class="form-control select2groups"
                                                data-action="{{ route('admin.asset-group.ajax') }}"
                                                name="asset_document_number" id="asset_document_number" required>
                                                <option></option>
                                            </select>
                                            <div id="asset_document_number_feedback" class="invalid-feedback">
                                                Wajib diisi.
                                            </div>
                                            <input type="hidden" name="asset_category_id" id="asset_category_id">
                                            <input type="hidden" name="item_category_id" id="item_category_id">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="mb-2">
                                                <label for="asalpengadaan_category_id"
                                                    class="col-form-label mandatory">Pilih Asal Pengadaan</label>
                                                <select class="form-control select2asalpengadaans"
                                                    data-action="{{ route('admin.asalpengadaan.ajax') }}"
                                                    name="asalpengadaan_category_id" id="asalpengadaan_category_id"
                                                    required>
                                                </select>
                                                <div id="asalpengadaan_category_id_feedback" class="invalid-feedback">
                                                    Wajib diisi.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="asset_procurement_year"
                                                    class="col-form-label mandatory">Pengadaan Tahun</label>
                                                <input type="number" class="form-control mandatory"
                                                    name="asset_procurement_year" id="asset_procurement_year" required>
                                                <div id="asset_procurement_year_feedback" class="invalid-feedback">
                                                    Wajib diisi.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                        <div class="mb-2">
                                            <label for="asaloleh_category_id" class="col-form-label mandatory">Pilih
                                                Asal Oleh</label>
                                            <select class="form-control select2asalolehs"
                                                data-action="{{ route('admin.asaloleh.ajax') }}"
                                                name="asaloleh_category_id" id="asaloleh_category_id" required>
                                            </select>
                                            <div id="asaloleh_category_id_feedback" class="invalid-feedback">
                                                Wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label for="asset_asaloleh_date" class="col-form-label mandatory">Tanggal
                                                Asal Oleh</label>
                                            <input type="text" class="form-control mandatory"
                                                name="asset_asaloleh_date" id="asset_asaloleh_date" required>
                                            <div id="asset_asaloleh_date_feedback" class="invalid-feedback">
                                                Wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <div class="mb-2">
                                            <label for="asset_location_id"
                                                class="col-form-label mandatory">Lokasi</label>
                                            <select class="form-control select2locations"
                                                data-action="{{ route('admin.location.ajax') }}"
                                                name="asset_location_id" id="asset_location_id" required>
                                            </select>
                                            <div id="asset_location_id_feedback" class="invalid-feedback">
                                                Wajib diisi.
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-4" id="upload-container" data-form="asset-form"
                                        data-upload-url="{{ route('admin.upload-file') }}">
                                        <div class="mb-2">
                                            <label for="dokumen_penyedia" class="col-form-label">Dokumen
                                                Penyedia</label>
                                            <input type="file" class="form-control" name="file[]"
                                                data-name="dokumen_penyedia" id="dokumen_penyedia">
                                            <div id="dokumen_penyedia_feedback" class="invalid-feedback">
                                                Wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label for="dokumen_barang" class="col-form-label">Dokumen Barang</label>
                                            <input type="file" class="form-control" name="file[]"
                                                data-name="dokumen_barang" id="dokumen_barang">
                                            <div id="dokumen_barang_feedback" class="invalid-feedback">
                                                Wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label for="dokumen_spj" class="col-form-label">Dokumen SPJ</label>
                                            <input type="file" class="form-control" name="file[]"
                                                data-name="dokumen_spj" id="dokumen_spj">
                                            <div id="dokumen_spj_feedback" class="invalid-feedback">
                                                Wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- </div> --}}
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="p-2">
                                {{-- <div class="card-body"> --}}
                                <div class="row">
                                    {{-- <div class="col-md-6">
                                            <div class="mb-2">
                                                <label for="item_category_id" class="col-form-label mandatory">Pilih Kategori</label>
                                                <select class="form-control select2itemCategories" data-action="{{route('admin.item-category.ajax')}}" name="item_category_id" id="item_category_id" required>
                                                </select>
                                                <div id="item_category_id_feedback" class="invalid-feedback">
                                                    Wajib diisi.
                                                </div>
                                            </div>
                                        </div> --}}
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                            <label for="item_id" class="col-form-label mandatory">Pilih Jenis
                                                Barang</label>
                                            <select class="form-control select2items"
                                                data-action="{{ route('admin.item.ajax') }}" name="item_id"
                                                id="item_id" required>
                                            </select>
                                            <div id="item_id_feedback" class="invalid-feedback">
                                                Wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="item_brand_id" class="col-form-label mandatory">Pilih
                                                Merk</label>
                                            <select class="form-control select2brands"
                                                data-action="{{ route('admin.brand.ajax') }}" name="item_brand_id"
                                                id="item_brand_id" required>
                                            </select>
                                            <div id="item_brand_id_feedback" class="invalid-feedback">
                                                Wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="item_type_id" class="col-form-label mandatory">Pilih
                                                Tipe</label>
                                            <select class="form-control select2types"
                                                data-action="{{ route('admin.type.ajax') }}" name="item_type_id"
                                                id="item_type_id" required>
                                            </select>
                                            <div id="item_type_id_feedback" class="invalid-feedback">
                                                Wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="bahan_category_id" class="col-form-label">Bahan</label>
                                            <select class="form-control select2bahans"
                                                data-action="{{ route('admin.bahan.ajax') }}"
                                                name="bahan_category_id" id="bahan_category_id">
                                            </select>
                                            <div id="bahan_category_id_feedback" class="invalid-feedback">
                                                Wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="satuan_category_id"
                                                class="col-form-label mandatory">Satuan</label>
                                            <select class="form-control select2satuans"
                                                data-action="{{ route('admin.satuan.ajax') }}"
                                                name="satuan_category_id" id="satuan_category_id" required>
                                            </select>
                                            <div id="satuan_category_id_feedback" class="invalid-feedback">
                                                Wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2" id="asset_bpad_code_group">
                                            <label for="asset_bpad_code" class="col-form-label">Kode BPAD</label>
                                            <input type="text" class="form-control" id="asset_bpad_code"
                                                name="asset_bpad_code">
                                            <div id="asset_bpad_code_feedback" class="invalid-feedback">
                                                Wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2" id="asset_serial_number_group">
                                            <label for="asset_serial_number" class="col-form-label">Nomor Seri</label>
                                            <input type="text" class="form-control" id="asset_serial_number"
                                                name="asset_serial_number">
                                            <div id="asset_serial_number_feedback" class="invalid-feedback">
                                                Wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2" id="asset_frame_number_group">
                                            <label for="asset_frame_number" class="col-form-label">Nomor
                                                Rangka</label>
                                            <input type="text" class="form-control" id="asset_frame_number"
                                                name="asset_frame_number">
                                            <div id="asset_frame_number_feedback" class="invalid-feedback">
                                                Wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2" id="asset_machine_number_group">
                                            <label for="asset_machine_number" class="col-form-label">Nomor
                                                Mesin</label>
                                            <input type="text" class="form-control" id="asset_machine_number"
                                                name="asset_machine_number">
                                            <div id="asset_machine_number_feedback" class="invalid-feedback">
                                                Wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2" id="asset_police_number_group">
                                            <label for="asset_police_number" class="col-form-label">Nomor Plat</label>
                                            <input type="text" class="form-control" id="asset_police_number"
                                                name="asset_police_number">
                                            <div id="asset_police_number_feedback" class="invalid-feedback">
                                                Wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <label for="asset_price" class="col-form-label mandatory">Harga</label>
                                                    <input type="text" id="asset_price" class="form-control money"
                                                        name="asset_price" required>
                                                    <div id="asset_price_feedback" class="invalid-feedback">
                                                        Wajib diisi.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <label for="asset_shrinkage" class="col-form-label mandatory">Penyusutan
                                                        %</label>
                                                    <input type="number" id="asset_shrinkage" class="form-control"
                                                        name="asset_shrinkage" required>
                                                    <div id="asset_shrinkage_feedback" class="invalid-feedback">
                                                        Wajib diisi.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="asset_specification"
                                            class="col-form-label">Spesifikasi</label>
                                        <textarea class="form-control" id="asset_specification" name="asset_specification" rows="4"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="asset_location_id"
                                                    class="col-form-label mandatory">Lokasi</label>
                                                <select class="form-control select2locations"
                                                    data-action="{{ route('admin.location.ajax') }}"
                                                    name="asset_location_id" id="asset_location_id" required>
                                                </select>
                                                <div id="asset_location_id_feedback" class="invalid-feedback">
                                                    Wajib diisi.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- </div> --}}
                        </div>
                        <br>
                        <div class="row unique-col">
                            <div class="col-md-12">
                                <div class="p-2">
                                    <fieldset class="scheduler-border">
                                        <legend class="legend-border"></legend>
                                        <div class="row">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="asset_bpad_code" class="col-form-label">Kode BPAD</label>
                                                    <input type="text" class="form-control asset_bpad_code" name="asset_bpad_code_input" id="asset_bpad_code_input">
                                                </div>
                                                <div class="col">
                                                    <label for="asset_serial_number" class="col-form-label">Nomor Seri</label>
                                                    <input type="text" class="form-control asset_serial_number"
                                                        name="asset_serial_number_input" id="asset_serial_number_input">
                                                </div>
                                                <div class="col">
                                                    <label class="col-form-label" style="color: #fff">.</label>
                                                    <input type="button" class="form-control btn btn-md btn-success btn-add-item" value="+ Tambah">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="asset_frame_number" class="col-form-label">Nomor Rangka</label>
                                                    <input type="text" class="form-control asset_frame_number" name="asset_frame_number_input" id="asset_frame_number_input">
                                                </div>
                                                <div class="col">
                                                    <label for="asset_machine_number" class="col-form-label">Nomor
                                                        Mesin</label>
                                                    <input type="text" class="form-control asset_machine_number"
                                                        name="asset_machine_number_input" id="asset_machine_number_input">
                                                </div>
                                                <div class="col">
                                                    <label for="asset_police_number" class="col-form-label">Nomor Plat</label>
                                                    <input type="text" class="form-control asset_police_number"
                                                        name="asset_police_number_input" id="asset_police_number_input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2">
                                            <div class="table table-responsive" style="margin-left: 0.20em">
                                                <table id="code-table" class="table display nowrap table-hover" style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Kode BPAD</th>
                                                            <th>Nomor Seri</th>
                                                            <th>Nomor Mesin</th>
                                                            <th>Nomor Rangka</th>
                                                            <th>Nomor Plat</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="unique-container" class="text-center">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="button-container">
                                                <button class="btn btn-danger btn-clear-item">
                                                    <i class="bi bi-trash"></i>
                                                    <span>Kosongkan Data</span>
                                                </button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-outline-secondary me-2"
                            data-bs-dismiss="modal">Tutup</button>
                        <button class="btn btn-primary" id="save" type="submit">
                            <span class="loading spinner-border spinner-border-sm d-none" role="status"
                                aria-hidden="true"></span>
                            <span class="btn-name">Simpan</span>
                        </button>
                    </div>
                </form>
            </x-slot>
        </x-modal>
        <x-modal id="asset-detail-modal" size="modal-fullscreen">
            <x-slot name="title">Asset Detail Modal</x-slot>
            <x-slot name="body">
                <x-asset.detail-asset></x-asset.detail-asset>
            </x-slot>
        </x-modal>
        <div class="row">
            <div class="col-md-12 h-100">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <div class="card-title d-flex justify-content-between">
                            <div id="form-title"></div>
                            @if (auth()->user()->hasPermissionTo('aset-create'))
                                <div>
                                    <a data-bs-toggle="modal" data-bs-target="#asset-modal" href="javascript:void(0)"
                                        class="btn btn-sm btn-add btn-primary mb-2">Tambah Data</a>
                                </div>
                            @endif
                        </div>
                        <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
                            @foreach (Session::get('categories') as $key => $category)
                                {{-- @dd($category->asset_category->name); --}}
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link tab-asset text-nav {{ $key == 0 ? 'active' : '' }}"
                                        id="{{ $category->item_category_code }}"
                                        data-category-name="{{ $category->item_category_name }}"
                                        data-category-id="{{ $category->item_category_id }}"
                                        data-asset-category-id="{{ $category->asset_category->asset_category_id }}"
                                        data-asset-category-name="{{ $category->asset_category->asset_category_name }}"
                                        data-bs-toggle="tab"
                                        data-bs-target="#{{ $category->item_category_code }}-pane"
                                        data-id="{{ $category->item_category_id }}" type="button" role="tab"
                                        aria-controls="{{ $category->item_category_code }}-pane"
                                        aria-selected="{{ $key == 0 ? true : false }}">{{ $category->item_category_name }}</button>
                                </li>
                            @endforeach
                        </ul>
                        <div class="table table-responsive">
                            <table id="asset-table" class="table display nowrap table-hover asset-table"
                                style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nomor Dokumen</th>
                                        <th>Kode BPAD</th>
                                        <th>No Registrasi</th>
                                        <th>Jenis Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Pengguna</th>
                                        <th>Spesifikasi</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        {{-- <th>QR Code</th> --}}
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script src="{{ asset('assets/vendor/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/js/select2-asset.js') }}"></script>
        <script src="{{ asset('assets/js/ajax.js') }}"></script>
        <script src="{{ asset('assets/js/asset-event.js') }}"></script>
        <script src="{{ asset('assets/js/simple.money.format.js') }}"></script>
        <script src="{{ asset('assets/js/file.js') }}"></script>
        <script type="text/javascript">
            /**
             * for request(POST,PATCH,DELETE) function see ajax.js
             * for event function see asset-event.js
             * for upload see file.js
             */
            let modal = 'asset-modal';
            let urlPost = "{{ route('admin.asset.store') }}";
            let urlPostTemp = "{{ route('admin.asset-temporary.store') }}";
            let formMain = 'asset-form';
            let categoryId = '9b674b35-aad3-4a21-a0ba-e8c2fa9ad0da';
            let categoryName = null;
            let assetCategoryId = null;
            let assetCategoryName = null;
            let formTitle = null;
            var dataTableList;
            var dataTableTempList;
            let options = {
                modal: modal,
                id: null,
                url: urlPost,
                formMain: formMain,
                data: null,
                dataTable: null,
                file: true,
                disabledButton: () => {
                    $('#save').addClass('disabled');
                    $('.loading').removeClass('d-none');
                },
                enabledButton: () => {
                    $('#save').removeClass('disabled');
                    $('.loading').addClass('d-none');
                }
            }

            $(document).ready(function() {
                $('#asset_asaloleh_date').datepicker({
                    uiLibrary: 'bootstrap5',
                    format: 'dd-mm-yyyy'
                });

                $('.money').simpleMoneyFormat();

                dataTableList = $('#asset-table').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    order: [
                        [0, 'desc']
                    ],
                    ajax: {
                        url: '{{ url()->current() }}',
                        data: {
                            categoryId: () => categoryId
                        },
                    },
                    columns: [{
                            data: 'asset_id',
                            name: 'asset_id',
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'item.item_code',
                            name: 'item.item_code',
                        },
                        {
                            data: 'asset_group.asset_document_number',
                            name: 'asset_group.asset_document_number',
                        },
                        {
                            data: 'asset_bpad_code',
                            name: 'asset_bpad_code',
                        },
                        {
                            data: 'asset_code',
                            name: 'asset_code',
                            render: function(data, type, row, meta) {
                                return `<span style="cursor: pointer;" data-id="${data}" class="badge btn-show text-bg-primary">
                                    ${data}
                                    <span id="loading-${data}" class="loading-detail spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                </span>`;
                            }
                        },
                        {
                            data: 'item.item_name',
                            name: 'item.item_name',
                        },
                        {
                            data: 'asset_name',
                            name: 'asset_name',
                        },
                        {
                            data: 'user.user_fullname',
                            name: 'user.user_fullname',
                        },
                        {
                            data: 'asset_specification',
                            name: 'asset_specification',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'satuan.satuan_category_name',
                            name: 'satuan.satuan_category_name',
                        },
                        {
                            data: 'asset_price',
                            name: 'asset_price',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row, meta) {
                                return new Intl.NumberFormat().format(data)
                            }

                        },
                        // {
                        //     data: 'asset_id',
                        //     name: 'asset_id',
                        //     orderable: false,
                        //     searchable: false
                        // },
                        {
                            name: 'action',
                            data: 'asset_id',
                            orderable: false,
                            searchable: false,
                            render: function(data) {
                                let button = `
                                @if (auth()->user()->hasPermissionTo('aset-edit') || auth()->user()->hasPermissionTo('aset-delete'))
                                    <div class="d-flex justify-content-start">
                                        <div class="btn-group" role="group">
                                            @if (auth()->user()->hasPermissionTo('aset-edit'))
                                                <button type="button" data-id="${data}" class="btn btn-sm btn-edit btn-primary"><i class="bi bi-pencil-fill"></i></button>
                                            @endif
                                            @if (auth()->user()->hasPermissionTo('aset-list'))
                                                <button type="button" data-id="${data}" class="btn btn-sm btn-show btn-success"><i class="bi bi-eye-fill"></i></button>
                                            @endif
                                            @if (auth()->user()->hasPermissionTo('aset-delete'))
                                                <button type="button" data-id="${data}" class="btn btn-sm btn-delete btn-danger"><i class="bi bi-trash-fill"></i></button>
                                            @endif
                                        </div>
                                    </div>
                                @endif`;
                                return button;
                            }
                        },

                    ]
                });


                const tabHandle = () => {
                    let attributeData = $(`[data-id='${categoryId}']`).data();
                    categoryName = attributeData.categoryName;
                    assetCategoryId = attributeData.assetCategoryId;
                    assetCategoryName = attributeData.assetCategoryName
                    formTitle = `Form ${assetCategoryName} ${categoryName}`;
                    console.log(assetCategoryId);
                    console.log(categoryId);
                }
                const disabledForm = (categoryId) => {
                    $('.asset_bpad_code_input').prop('disabled', false);
                    // $('.asset_bpad_code').prop('required', true);

                    // form code reset
                    $('#asset_bpad_code_input').val(null);
                    $('#asset_serial_number_input').val(null);
                    $('#asset_machine_number_input').val(null);
                    $('#asset_frame_number_input').val(null);
                    $('#asset_police_number_input').val(null);

                    // kendaraan
                    if (categoryId === '9b674b35-abd7-482b-af0a-0e30e8791d26') {
                        $('#asset_serial_number_input').prop('disabled', true);
                        $('#asset_machine_number_input').prop('disabled', false);
                        $('#asset_frame_number_input').prop('disabled', false);
                        $('#asset_police_number_input').prop('disabled', false);
                    } else {
                        $('#asset_serial_number_input').prop('disabled', false);
                        $('#asset_machine_number_input').prop('disabled', true);
                        $('#asset_frame_number_input').prop('disabled', true);
                        $('#asset_police_number_input').prop('disabled', true);
                    }
                    tabHandle();
                }
                dataTableList.ajax.reload();
                disabledForm(categoryId);

                $(document).on('click', '.tab-asset', function() {
                    categoryId = $(this).attr('data-id');
                    tabHandle();
                    disabledForm(categoryId);
                    dataTableList.ajax.reload();
                });


                const editAsset = (data) => {
                    // $('#asset_procurement_year').val(data)
                    // setTimeout(() => {
                    //     $(".select2items").trigger('change');
                    // }, 100);
                }

                const saveData = (formData) => {
                    options.data = formData;
                    options.dataTable = dataTableList;
                    POST_DATA(options);
                }

                const updateData = (formData) => {
                    options.data = formData;
                    options.dataTable = dataTableList;
                    PATCH_DATA(options);
                }

                const deleteData = (id) => {
                    options.id = id;
                    options.dataTable = dataTableList;
                    DELETE_DATA(options);
                }
                Array.prototype.filter.call($(`#${options.formMain}`), function(form) {
                    form.addEventListener('submit', async function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                            form.classList.add('was-validated');
                        } else {
                            event.preventDefault();
                            event.stopPropagation();
                            options.disabledButton();
                            form.classList.remove('was-validated');
                            // from file.js
                            await populateFile(options.formMain);
                            if (fileInputs.length > 0) {
                                showLoadingFile();
                                await uploadFile(fileInputs, fileInputs.length);
                                let formData = $(`#${options.formMain}`).serialize();
                                if (options.id == null) saveData(formData);
                                if (options.id) updateData(formData);
                            } else {
                                let formData = $(`#${options.formMain}`).serialize();
                                if (options.id == null) saveData(formData);
                                if (options.id) updateData(formData);
                            }
                        }
                    });
                });

                $('input[type="file"]').on('change', function() {
                    let file = this.files[0];
                    let fileId = $(this).attr('id');
                    let maxSize = 2 * 1024 * 1024; // 2 MB dalam bytes
                    let allowedTypes = ['application/pdf', 'image/png', 'image/jpeg'];
                    let fileErr = $(`#${fileId}_feedback`);
                    if (file) {
                        const fileType = file.type;
                        const fileSize = file.size;
                        $(`#${formMain}`).addClass('was-validated');
                        // Validasi tipe file
                        if (!allowedTypes.includes(fileType)) {
                            $(`#${fileId}`).prop('required', true);
                            fileErr.text('Tipe file tidak valid. Harus berupa PDF, PNG, JPEG, atau JPG.');
                            $(this).val(''); // Kosongkan input file
                            return;
                        }

                        // Validasi ukuran file
                        if (fileSize > maxSize) {
                            $(`#${fileId}`).prop('required', true);
                            fileErr.text('Ukuran file terlalu besar. Maksimal 2 MB.');
                            $(this).val(''); // Kosongkan input file
                            return;
                        }

                        // Jika validasi lolos
                        $(`#${fileId}`).prop('required', false);
                        fileErr.text('');
                        $(`#${formMain}`).removeClass('was-validated');
                    }
                });

                $(`#${modal}`).on('shown.bs.modal', function(e) {
                    if (!options.id) $('#form-aset-title').html(`Form Aset`);
                })


                $(document).on('click', '.btn-add', function() {
                    newUpload();
                    formTitle = `Form ${assetCategoryName} ${categoryName}`;
                    if (dataTableTempList !== undefined) {
                        // reinit datatable after re open
                        $('#code-table').DataTable().destroy();
                        $('#code-table').html(`<table id="code-table" class="table display nowrap table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode BPAD</th>
                                            <th>Nomor Seri</th>
                                            <th>Nomor Mesin</th>
                                            <th>Nomor Rangka</th>
                                            <th>Nomor Plat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="unique-container" class="text-center">
                                    </tbody>
                                </table>`);
                        dataTableTempList = null;
                    }
                    setTimeout(() => {
                        dataTableTempList = $('#code-table').dataTable({
                            processing: true,
                            serverSide: true,
                            responsive: true,
                            order: [
                                [0, 'desc']
                            ],
                            ajax: {
                                url: urlPostTemp,
                            },
                            columns: [{
                                    data: 'asset_temporary_id',
                                    name: 'asset_temporary_id',
                                    render: function(data, type, row, meta) {
                                        return meta.row + meta.settings._iDisplayStart +
                                            1;
                                    }
                                },
                                {
                                    data: 'asset_temporary_bpad_code',
                                    name: 'asset_temporary_bpad_code',
                                },
                                {
                                    data: 'asset_temporary_serial_number',
                                    name: 'asset_temporary_serial_number',
                                },
                                {
                                    data: 'asset_temporary_machine_number',
                                    name: 'asset_temporary_machine_number',
                                },
                                {
                                    data: 'asset_temporary_frame_number',
                                    name: 'asset_temporary_frame_number',
                                },
                                {
                                    data: 'asset_temporary_police_number',
                                    name: 'asset_temporary_police_number',
                                },
                                {
                                    name: 'action',
                                    data: 'asset_temporary_id',
                                    orderable: false,
                                    searchable: false,
                                    render: function(data, type, row, meta) {
                                        let button = `
                                        @if (auth()->user()->hasPermissionTo('aset-edit') || auth()->user()->hasPermissionTo('aset-delete'))
                                            <div class="d-flex justify-content-start">
                                                <div class="btn-group" role="group">
                                                    @if (auth()->user()->hasPermissionTo('aset-delete'))
                                                        <button type="button" data-id="${data}" data-bpad="${row.asset_temporary_bpad_code}" data class="btn btn-sm btn-delete-temp btn-danger"><i class="bi bi-trash-fill"></i></button>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif`;
                                        return button;
                                    }
                                },

                            ]
                        });
                    }, 100);
                    $('#asset_category_id').val(assetCategoryId);
                    $('#item_category_id').val(categoryId);
                    $('#asset_bpad_code_group').hide()
                    $('#asset_serial_number_group').hide()
                    $('#asset_machine_number_group').hide()
                    $('#asset_frame_number_group').hide()
                    $('#asset_police_number_group').hide()
                    $(`.unique-col`).show();
                })

                $(document).on('click', '.btn-edit', function() {
                    // newUpload();
                    $(`input[type=file]`).prop('disabled', true);
                    let rowData = dataTableList.row($(this).parents('tr')).data();
                    formTitle = `Form ${assetCategoryName} ${categoryName}` + '<p>' + rowData.asset_name +
                        '</p>';
                    $('#form-aset-title').html(formTitle);
                    $('#asset_category_id').val(assetCategoryId);
                    $('#item_category_id').val(categoryId);
                    $('#asset_bpad_code_group').show()
                    if (categoryId === '9b674b35-abd7-482b-af0a-0e30e8791d26') {
                        $('#asset_serial_number_group').hide()
                        $('#asset_machine_number_group').show()
                        $('#asset_frame_number_group').show()
                        $('#asset_police_number_group').show()
                    } else {
                        $('#asset_serial_number_group').show()
                        $('#asset_machine_number_group').hide()
                        $('#asset_frame_number_group').hide()
                        $('#asset_police_number_group').hide()
                    }
                    let newOptions = {
                        url: options.url,
                        id: rowData.asset_id,
                        modal: options.modal,
                        assetCode: rowData.asset_code,
                    }
                    EDIT_ASSET_ON_MODAL(newOptions);
                    $(`#${options.modal}`).find('#save').show();
                    $(`#${options.modal}`).find('.btn-name').text('Ubah');
                    $(`.unique-col`).hide();
                    options.id = rowData.asset_id;
                })

                $(document).on('click', '.btn-show', function() {
                    let rowData = dataTableList.row($(this).parents('tr')).data();
                    let newOptions = {
                        url: options.url,
                        id: rowData.asset_id,
                        modal: 'asset-detail-modal',
                        assetCode: rowData.asset_code,
                    }
                    DETAIL_ASSET_ON_MODAL(newOptions);
                })

                $(document).on('click', '.btn-delete', function() {
                    let rowData = dataTableList.row($(this).parents('tr')).data()
                    options.dataTitle = rowData.asset_name;
                    deleteData(rowData.asset_id);
                })
                $(document).on('click', '.btn-add-item', function(e) {
                    let newOptions = {
                        data: {
                            asset_temporary_bpad_code: $('#asset_bpad_code_input').val(),
                            asset_temporary_serial_number: $('#asset_serial_number_input').val(),
                            asset_temporary_frame_number: $('#asset_frame_number_input').val(),
                            asset_temporary_machine_number: $('#asset_machine_number_input').val(),
                            asset_temporary_police_number: $('#asset_police_number_input').val(),
                        },
                        url: urlPostTemp,
                        dataTableId: '#code-table',
                    }
                    POST_DATA(newOptions);
                    disabledForm(categoryId);
                });
                $(document).on('click', '.btn-delete-temp', function(e) {
                    console.log(e);
                    let newOptions = {
                        id: $(e.currentTarget).data('id'),
                        url: urlPostTemp,
                        dataTableId: '#code-table',
                        dataTitle: $(e.currentTarget).data('bpad'),
                    }
                    DELETE_DATA(newOptions);
                });
                $(document).on('click', '.btn-clear-item', function() {
                    let newOptions = {
                        url: "{{ route('admin.asset-temporary-delete.destroyAll') }}",
                        dataTableId: '#code-table',
                        dataTitle: '',
                    }
                    DELETE_DATA(newOptions);
                });
            });
        </script>
    @endpush
</x-layout>
