@extends('backend.layouts.parent')

@section('title', ' اعدادات تعريف جهاز الحضور و والانصراف ')


@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.') }}css">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="col-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> بيانات الجهاز </h3>
                <div class="card-tools">
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button> --}}
                </div>
            </div>
            <form method="POST">
                @csrf
                <div class="card-body">
                    <label for="Machine-Name"> أسم الماكينة </label>
                    <input type="text" class="form-control" id="Machine-Name" placeholder="Machine Name" value="{{ $machin_name }}" readonly>
                    <br>
                    <label for="IP-Addrees">IP Addrees</label>
                    <input type="text" class="form-control" id="IP-Addrees" placeholder="IP Addrees" value="{{ $machin_ip }}">
                    <br>
                    <label for="Port">Port</label>
                    <input type="text" class="form-control" id="Port" placeholder="Port" value="{{ $machin_port }}">
                    <br>
                    <button type="button" class="btn btn-block bg-gradient-success btn-sm save">حفظ</button>
                </div>
            </form>
            <!-- /.card-body -->
            <div class="card-footer">
                {{-- Footer --}}
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </div>
    @include('backend.include.message')
    </div>
@endsection

@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ url('plugins/datatables/jquery.dataTables.min') }}.js"></script>
    <script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        // chack Data
        if ($('#IP-Addrees').val() != " ") {
            $('.save').css("display", "none");
        }

        // Insert Data
        $('form').on('click', '.save', function(e) {
            e.preventDefault();
            var URL = "{{ route('Machine_config.save') }}";
            axios.post(URL, {
                    machin_name: $('#Machine-Name').val(),
                    machin_ip: $('#IP-Addrees').val(),
                    machin_port: $('#Port').val(),
                })
                .then(function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.data['message'],
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('.save').css("display", "none");
                    // GetRows();
                })
                .catch(function(error) {
                    console.log(error);
                });
        });
    </script>
@endsection()
