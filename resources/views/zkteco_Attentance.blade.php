@extends('backend.layouts.parent')

@section('title', 'Data Test')


@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.') }}css">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    {{-- ////////////////////////////////////////////////////////////    Start data table   ////////////////////////////////////// --}}
    <div class="row">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        {{-- <th>User Id</th> --}}
                        <th>id</th>
                        <th>state</th>
                        <th>Timestamp</th>
                        <th>type</th>
                    </tr>
                </thead>
                <tbody>
                    <h4>{{$Atten[50]}}</h4>
                    {{-- @for ($i = 1; $i < count($Atten); $i++)
                        <tr>
                            <td>{{ $Atten[$i]['uid'] }}</td>
                            <td>{{ $Atten[$i]->userid ?? " " }}</td>
                            <td>{{ $Atten[$i]->name ?? " " }}</td>
                            <td>{{ $Atten[$i]->role?? " " }}</td>
                            <td>{{ $Atten[$i]->password ?? " " }}</td>
                        </tr>
                    @endfor --}}
                </tbody>
            </table>
        </div>
    </div>
    {{-- {{ $samples->links() }} --}}
@endsection()

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

@endsection()
