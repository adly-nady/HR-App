@extends('backend.layouts.parent')

@section('title', ' الاقسام ')


@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.') }}css">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection


@section('content')
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title"> إضافة: أقسام</h3>
            </div>
            <form class="form-horizontal">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">اسم القسم</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control dp_name" id="inputEmail3" placeholder="Department Name">
                        </div>
                    </div>
                    <!-- /.card-footer -->
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-info save">حفظ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- table --}}
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">الاقسام</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 text-center">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>الرقم</th>
                            <th>أسم القسم</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($dp = 0; $dp < count($departments); $dp++)
                            <tr class="{{ $departments[$dp]->id }}tr">
                                <td>{{ $departments[$dp]->id }}</td>
                                <td>{{ $departments[$dp]->dep_name }}</td>
                                <td><button class="btn btn-danger btn-sm delete" id="{{ $departments[$dp]->id }}"><i class="fas fa-trash p-1"></i>حذف</button></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

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
        // Get Data
        function GetRows() {
            axios.get("{{ route('department_GetData') }}")
                .then(function(response) {
                    // create forech to loop on data
                    var data = "";
                    response.data.departments.forEach(element => {
                        data += "<tr id='" + element.id + "tr'>";
                        data += "<td>" + element.id + "</td>";
                        data += "<td>" + element.dep_name + "</td>";
                        data += "<td>";
                        data += "<button class='btn btn-danger btn-sm delete' id='" + element.id + "''><i class='fas fa-trash p-1'></i>Delete</button>";
                        data += "</td>";
                        data += "</tr>";
                    });
                    $('tbody').html(data);
                    console.log('Show data successfully ...!');
                })
        }
        // Save item
        $('form').on('click', '.save', function(e) {
            e.preventDefault();
            var URL = "{{ route('department_save') }}";
            axios.post(URL, {
                    'dep_name': $('.dp_name').val() ?? 0,
                })
                .then(function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.data ?? "Not Find Parameter",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    GetRows();
                })
                .catch(function(error) {
                    alert(error);
                });
        });
        // Delete Item
        $('table').on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            var URL = "{{ route('department_delete', ':id') }}".replace(':id', id);
            axios.get(URL)
                .then(function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.data ?? "Not Find Parameter",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    GetRows();
                })
                .catch(function(error) {
                    alert(error);
                });
        });
    </script>
@endsection()
