<x-base-layout :scrollspy="true">

    <x-slot:pageTitle>
        {{$title}} 
    </x-slot>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link rel="stylesheet" href="{{asset('plugins/table/datatable/datatables.css')}}">
        @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
        @vite(['resources/scss/light/plugins/table/datatable/custom_dt_custom.scss'])
        @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
        @vite(['resources/scss/dark/plugins/table/datatable/custom_dt_custom.scss'])
        @vite(['resources/scss/light/assets/components/timeline.scss'])
        
        <!--  END CUSTOM STYLE FILE  -->
        
        <style>
            .toggle-code-snippet { margin-bottom: 0px; }
            body.dark .toggle-code-snippet { margin-bottom: 0px; }
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            /* Firefox */
            input[type=number] {
                -moz-appearance: textfield;
            }
        </style>
    </x-slot>
    <!-- END GLOBAL MANDATORY STYLES -->

    <x-slot:scrollspyConfig>
        data-bs-spy="scroll" data-bs-target="#navSection" data-bs-offset="100"
    </x-slot>

    <!-- BREADCRUMB -->
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Document</li>
                <li class="breadcrumb-item active" aria-current="page">Penawaran Harga</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->        
    <div class="row layout-top-spacing">
        
        <div id="basic" class="col-lg-6 col-sm-6 col-6 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Form Detail Penawaran Harga</h4>
                        </div>
                    </div>
                </div>
                
                <div class="widget-content widget-content-area" style="padding: 1.5%;">
                    <form class="row g-3 needs-validation" action="{{ route('penawaran-harga.store') }}"  method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        {{-- <div class="col-md-4">
                            <label for="validationDefault04" class="form-label">PT Pelayaran</label>
                            <select class="form-select" id="validationDefault04" required>
                                <option selected disabled value="">Choose...</option>
                                <option>PT TEMPURAN MAS</option>
                                <option>PT LINTAS KUMALA ABADI</option>
                                <option>PT LILIYANA RAMA JAYA</option>
                                <option>PT ALAM BARITO RAYA</option>
                            </select>
                        </div> --}}
                        <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Estate</label>
                            <input name="estate_ph" type="text" class="form-control" id="validationCustom03" placeholder="Masukkan estate" required>
                            <div class="invalid-feedback">
                                Form estate tidak boleh kosong
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">OA Kapal Kayu </label>
                            <input name="oa_kk" type="text" class="form-control" id="validationCustom01" placeholder="Masukkan harga" required>
                            <div class="invalid-feedback">
                                Form harga tidak boleh kosong
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">OA Container </label>
                            <input name="oa_cont" type="text" class="form-control" id="validationCustom01" placeholder="Masukkan harga" required>
                            <div class="invalid-feedback">
                                Form harga tidak boleh kosong
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
        <div id="basic" class="col-lg-6 col-sm-6 col-6 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Tabel Detail Penawaran Harga</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <table id="style-1" class="table style-1 dt-table-hover">
                                    <thead>
                                        <tr>
                                            <th>Estate</th>
                                            <th>OA Kapal Kayu</th>
                                            <th>OA Container</th>
                                            {{-- <th class="text-center dt-no-sorting">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detail as $dtl)
                                        <tr>
                                            <td>{{ $dtl->estate }}</td>
                                            <td>{{ $dtl->oa_kpl_kayu }}</td>
                                            <td>{{ $dtl->oa_container }}</td>
                                            {{-- <td class="text-center">
                                                <ul class="table-controls">
                                                    <li><a href="javascript:void(0);" class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="View"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye p-1 br-8 mb-1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a></li>
                                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                                </ul>
                                            </td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="basic" class="col-lg-12 col-sm-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Form Penawaran Harga</h4>
                        </div>
                    </div>
                </div>
                
                <div class="widget-content widget-content-area" style="padding: 1.5%;">
                    <form class="row g-3 needs-validation" action="{{ route('penawaran-harga.save') }}"  method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        {{-- <div class="col-md-4">
                            <label for="validationDefault04" class="form-label">PT Pelayaran</label>
                            <select class="form-select" id="validationDefault04" required>
                                <option selected disabled value="">Choose...</option>
                                <option>PT TEMPURAN MAS</option>
                                <option>PT LINTAS KUMALA ABADI</option>
                                <option>PT LILIYANA RAMA JAYA</option>
                                <option>PT ALAM BARITO RAYA</option>
                            </select>
                        </div> --}}
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Nama </label>
                            <input name="nama_pic" id="nama_cst" type="text" class="form-control" id="validationCustom03" placeholder="Masukkan nama" required>
                            <div class="invalid-feedback">
                                Form nama tidak boleh kosong
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault04" class="form-label">Customer</label>
                            <select name="cst_id" class="form-select" id="validationDefault04" required>
                                <option selected disabled value="">Choose...</option>
                                @foreach ($customer as $cst)
                                    <option value="{{ $cst->id }}">{{ $cst->nama_customer }}</option>
                                @endforeach
                            </select>
                        </div>
                            {{-- <div class="col-md-4">
                                <label for="validationCustom04" class="form-label">Estate</label>
                                <div class="input-group has-validation">
                                    <input name="no_cst" type="number" class="form-control" id="validationCustom04" placeholder="Masukkan nama estate" required>
                                    <div class="invalid-feedback">
                                        Form estate tidak boleh kosong
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Alamat</label>
                                <input name="alamat_cst" id="alamat" type="text" class="form-control" id="validationCustom03" placeholder="Masukkan alamat" required>
                                <div class="invalid-feedback">
                                    Form alamat tidak boleh kosong
                                </div>
                            </div>
                            @foreach ($detail as $dt)
                                <input type="text" style="display: none;" name="id_detail" value="{{ $dt->id_detail_ph }}">
                            @endforeach
                            <div class="col-12">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>

        <div id="basic" class="col-lg-12 col-sm-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Tabel Document Penawaran Harga</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <table id="style-3" class="table style-3 dt-table-hover">
                                    <thead>
                                        <tr>
                                            <th> Id </th>
                                            <th>Nama Penanggung Jawab</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Estate</th>
                                            <th class="text-center dt-no-sorting">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ph as $phs)
                                        <tr>
                                            <td>{{ $phs->id_penawaran }}</td>
                                            <td>{{ $phs->nama_pic }}</td>
                                            <td>{{ $phs->nama_customer }}</td>
                                            <td>{{ $phs->estate }}</td>
                                            <td class="text-center">
                                                <ul class="table-controls">
                                                    <li><a href="javascript:void(0);" class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="View"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye p-1 br-8 mb-1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a></li>
                                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>            

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>
        @vite(['resources/assets/js/forms/bootstrap_validation/bs_validation_script.js'])
        <script type="module" src="{{asset('plugins/global/vendors.min.js')}}"></script>
        @vite(['resources/assets/js/custom.js'])
        <script type="module" src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <script type='text/javascript'>
            $(document).ready(function() {
                $('#validationDefault04').change(function() {
                    var selectedId = $(this).val();

                    if (selectedId !== '') {
                        $.ajax({
                            url: "{{ route('getDetails', ['id' => ':id']) }}".replace(':id', selectedId),
                            type: 'GET',
                            dataType: 'json',
                            success: function(response) {
                                if (response.length > 0) {
                                    var data = response[0];
                                    $('#alamat').val(data.alamat);
                                }
                            },
                            error: function() {
                                console.log(response);
                            }
                        });
                    } else {
                        $('#alamat').val('');
                    }
                });
            });
        </script>

        <script type="module">
            // var e;
            const c1 = $('#style-1').DataTable({
                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                   "sLengthMenu": "Results :  _MENU_",
                },
                "lengthMenu": [5, 10, 20, 50],
                "pageLength": 10
            });
    
            multiCheck(c1);
    
            const c2 = $('#style-2').DataTable({
                headerCallback:function(e, a, t, n, s) {
                    e.getElementsByTagName("th")[0].innerHTML=`
                    <div class="form-check form-check-primary d-block new-control">
                        <input class="form-check-input chk-parent" type="checkbox" id="form-check-default">
                    </div>`
                },
                columnDefs:[ {
                    targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                        return `
                        <div class="form-check form-check-primary d-block new-control">
                            <input class="form-check-input child-chk" type="checkbox" id="form-check-default">
                        </div>`
                    }
                }],
                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                   "sLengthMenu": "Results :  _MENU_",
                },
                "lengthMenu": [5, 10, 20, 50],
                "pageLength": 10 
            });
    
            multiCheck(c2);
    
            const c3 = $('#style-3').DataTable({
                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                   "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [5, 10, 20, 50],
                "pageLength": 10,
                "responsive": true
            });
    
            multiCheck(c3);
        </script>
    </x-slot>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>    