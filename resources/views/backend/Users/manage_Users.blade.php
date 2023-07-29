@extends('backend.layouts.parent')

@section('title', ' المستخدمين')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.') }}css">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ url('plugins/toastr/toastr.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    {{-- <script src="sweetalert2.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="sweetalert2.min.css"> --}}
@endsection

@section('content')
    {{-- Form Enter --}}
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title"> اضافة مستخدم</h3>
        </div>
        <form method="POST" class="form1">
            @csrf
            <div class="card-body row">
                <div class="col-12">
                    <div class="form-group">
                        <label> أسم المتخدم </label>
                        <div class="search_select_box w-100">
                            <input type="text" class="form-control user_name text-center" placeholder="User Name">
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label> البريد الالكترونى </label>
                        <div class="search_select_box w-100">
                            <input type="email" class="form-control user_email text-center" placeholder="Email">
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label> كلمة المرور </label>
                        <input type="text" class="form-control password" placeholder="Password">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label> صلاحية المستخدم  </label>
                        <select class="form-select w-100 access" id="access" data-live-search="true">
                            <option value="1">Full Access</option>
                            <option value="2">View Attendance</option>
                            <option value="3">Gateway</option>
                            <option selected>...</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group d-flex justify-content-center" style="direction: rtl;">
                        <button class="Save btn bg-gradient-success" id="Save" style="color: white;">حفظ</button>
                        <button class="Clear btn bg-gradient-info" id="Clear" style="color: white;">تفريغ</button><br>
                    </div>
                </div>

            </div>
        </form>
        <!-- /.card-body -->
    </div>
    {{-- table --}}
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> بيانات  المستخدمين </h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 text-center">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>الرقم</th>
                            <th> أسم المستخدم </th>
                            <th> البريد الالكترونى </th>
                            <th> صلاحية المستخدم </th>
                            <th> كلمة المرور </th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($data = 0; $data < count($Users); $data++)
                            <tr>
                                <td>{{ $Users[$data]->id }}</td>
                                <td>{{ $Users[$data]->name }}</td>
                                <td>{{ $Users[$data]->email }}</td>
                                <td>{{ $Users[$data]->access_name }}</td>
                                <td>{{ $Users[$data]->password }}</td>
                                <td>
                                     <button class="btn btn-danger btn-sm delete" id="{{ $Users[$data]->id }}"><i class="fas fa-trash p-1"></i>حذف</button>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        @include('backend.include.message')
    </div>
@endsection


@section('js')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="sweetalert2.all.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('.search_select_box select').selectpicker();
        });

        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        // Get Data
        function GetRows(Records) {
            var data = "";
            for (var element = 0; element < Records.length; element++) {
                data += "<tr>";
                data += "<td>" + Records[element].id + "</td>";
                data += "<td>" + Records[element].name + "</td>";
                data += "<td>" + Records[element].email + "</td>";
                data += "<td>" + Records[element].access_name + "</td>";
                data += "<td>" + Records[element].password + "</td>";
                data += "<td><button class='btn btn-danger btn-sm delete' id='" + Records[element].id + "'><i class='fas fa-trash p-1'></i>حذف</button></td>";
                data += "</tr>";
            };
            $('tbody').html(data);
        }
        // Save item
        $('.form1').on('click', '.Save', function(e) {
            e.preventDefault();
            var id = $('.id').val();
            var Params = {
                'name': $('.user_name').val(),
                'email': $('.user_email').val(),
                'password': $('.password').val(),
                'access_id' : $('.access').val(),
            };
            var URL = "{{ route('Users.insert') }}";
            axios.post(URL, Params)
                .then(function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: "Inserted ...!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    GetRows(response.data.Users);
                })
                .catch(function(error) {
                    console.log(error);
                });
        });
        $('.form1').on('click', '.Clear',function(e){
            e.preventDefault();
           $('.user_name').val("");
           $('.user_email').val("");
           $('.password').val("");
        });
        // Delete Item
        $('table').on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            var URL = "{{ route('Users.delete', ':id') }}".replace(':id', id);
            axios.get(URL)
                .then(function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: "Deleted ...!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    GetRows(response.data.Users);
                })
                .catch(function(error) {
                    console.log(error);
                });
        });

    </script>
@endsection()
