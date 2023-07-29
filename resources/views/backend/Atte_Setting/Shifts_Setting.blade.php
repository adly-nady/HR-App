@extends('backend.layouts.parent')

@section('title', ' مواعيد الدخول و الخروج ')


@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.') }}css">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="col-12" style="display: flex">
        <div class="col-4">
            <!-- Default box 1 -->
            <form method="POST" class="form1">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title shift_time1" id="{{ $shift_time1->id }}">Shift 1</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="reco1" style="display: flex; justify-content: center;">
                            <div class="col-4">
                                <label for="Shift-1-1">بداية ساعة الدخول</label>
                                <input type="time" class="form-control in_from1" id="Shift-1" value="{{ $shift_time1->in_from }}">
                            </div>
                            <div class="col-4">
                                <label for="Shift-1-2">نهاية ساعة الدخول</label>
                                <input type="time" class="form-control in_to1" id="Shift-1-2" value="{{ $shift_time1->in_to }}">
                            </div>
                            <div class="col-4">
                                <label for="Shift-1-3">الدخول الافتراضى</label>
                                <input type="time" class="form-control default_in1" id="Shift-1-3" value="{{ $shift_time1->default_in }}">
                            </div>
                        </div>
                        <hr>
                        <div class="reco2" style="display: flex; justify-content: center;">
                            <div class="col-4">
                                <label for="Shift-1-4">بداية ساعة الخروج</label>
                                <input type="time" class="form-control out_from1" id="Shift-4" value="{{ $shift_time1->out_from }}">
                            </div>
                            <div class="col-4">
                                <label for="Shift-1-5">نهاية ساعة الخروج</label>
                                <input type="time" class="form-control out_to1" id="Shift-1-5" value="{{ $shift_time1->out_to }}">
                            </div>
                            <div class="col-4">
                                <label for="Shift-1-6">الدخول الافتراضى</label>
                                <input type="time" class="form-control default_out1" id="Shift-1-6" value="{{ $shift_time1->default_out }}">
                            </div>
                        </div>
                        <hr>
                        <div class="reco3" style="display: flex; justify-content: center;">
                            <div class="col-8 text-center">
                                <label for="Shift-1-7">اجمالى عدد الساعات الافترا ضية</label>
                                <input type="number" class="form-control Shift-1-7 text-center" id="Shift-1-7" readonly>
                            </div>
                        </div>
                        <br>
                        <br>
                        <button type="button" class="btn btn-block bg-gradient-success btn-sm save_shift1">حفظ</button>
                    </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    {{-- //////////////////////////////////////////////////////// --}}
    <div class="col-4">
        <!-- Default box 1 -->
        <form method="POST" class="form2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title shift_time2" id="{{ $shift_time2->id }}">Shift 2</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="reco1" style="display: flex; justify-content: center;">
                        <div class="col-4">
                            <label for="Shift-2-1">بداية ساعة الدخول</label>
                            <input type="time" class="form-control in_from2" id="Shift-2-1" value="{{ $shift_time2->in_from }}">
                        </div>
                        <div class="col-4">
                            <label for="Shift-2-2">نهاية ساعة الدخول</label>
                            <input type="time" class="form-control in_to2" id="Shift-2-2" value="{{ $shift_time2->in_to }}">
                        </div>
                        <div class="col-4">
                            <label for="Shift-2-3">الدخول الافتراضى</label>
                            <input type="time" class="form-control default_in2" id="Shift-2-3" value="{{ $shift_time2->default_in }}">
                        </div>
                    </div>
                    <hr>
                    <div class="reco2" style="display: flex; justify-content: center;">
                        <div class="col-4">
                            <label for="Shift-2-4">بداية ساعة الخروج</label>
                            <input type="time" class="form-control out_from2" id="Shift-2-4" value="{{ $shift_time2->out_from }}">
                        </div>
                        <div class="col-4">
                            <label for="Shift-2-5">نهاية ساعة الخروج</label>
                            <input type="time" class="form-control out_to2" id="Shift-2-5" value="{{ $shift_time2->out_to }}">
                        </div>
                        <div class="col-4">
                            <label for="Shift-2-6">الخروج الافتراضى</label>
                            <input type="time" class="form-control default_out2" id="Shift-2-6" value="{{ $shift_time2->default_out }}">
                        </div>
                    </div>
                    <hr>
                    <div class="reco3" style="display: flex; justify-content: center;">
                        <div class="col-8 text-center">
                            <label for="Shift-2-7">اجمالى عدد الساعات الافتراضية</label>
                            <input type="number" class="form-control text-center Shift-2-7" id="Shift-2-7" readonly>
                        </div>
                    </div>
                    <br>
                    <br>
                    <button type="button" class="btn btn-block bg-gradient-success btn-sm save_shift2">حفظ</button>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{-- Footer --}}
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </form>
    </div>
    {{-- //////////////////////////////////////////////////////// --}}
    <div class="col-4">
        <!-- Default box 1 -->
        <form method="POST" class="form3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title shift_time3" id="{{ $shift_time3->id }}">Shift 3</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="reco1" style="display: flex; justify-content: center;">
                        <div class="col-4">
                            <label for="Shift-3-1">بداية ساعة الدخول</label>
                            <input type="time" class="form-control in_from3" id="Shift-3-1" value="{{ $shift_time3->in_from }}">
                        </div>
                        <div class="col-4">
                            <label for="Shift-3-2">نهاية ساعة الدخول</label>
                            <input type="time" class="form-control in_to3" id="Shift-3-2" value="{{ $shift_time3->in_to }}">
                        </div>
                        <div class="col-4">
                            <label for="Shift-3-3"> الدخول الافتراضة</label>
                            <input type="time" class="form-control default_in3" id="Shift-3-3" value="{{ $shift_time3->default_in }}">
                        </div>
                    </div>
                    <hr>
                    <div class="reco2" style="display: flex; justify-content: center;">
                        <div class="col-4">
                            <label for="Shift-3-4">بداية ساعة الخروج</label>
                            <input type="time" class="form-control out_from3" id="Shift-3-4" value="{{ $shift_time3->out_from }}">
                        </div>
                        <div class="col-4">
                            <label for="Shift-3-5">نهاية ساعة الخروج</label>
                            <input type="time" class="form-control out_to3" id="Shift-3-5" value="{{ $shift_time3->out_to }}">
                        </div>
                        <div class="col-4">
                            <label for="Shift-3-6"> الخروج الافتراضية</label>
                            <input type="time" class="form-control default_out3" id="Shift-3-6" value="{{ $shift_time3->default_out }}">
                        </div>
                    </div>
                    <hr>
                    <div class="reco3" style="display: flex; justify-content: center;">
                        <div class="col-8 text-center">
                            <label for="Shift-3-7">اجمالى عدد الساعات الافتراضية</label>
                            <input type="number" class="form-control text-center Shift-3-7" id="Shift-3-7" readonly>
                        </div>
                    </div>
                    <br>
                    <br>
                    <button type="button" class="btn btn-block bg-gradient-success btn-sm save_shift3">حفظ</button>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{-- Footer --}}
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </form>
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
        if ($('.in_from1').val() != "" || $('.in_from2').val() != "" || $('.in_from3').val() != "") {
            // Convert All Buttons to Update
            $('.save_shift1').text('حفظ');
            $('.save_shift2').text('حفظ');
            $('.save_shift3').text('حفظ');

            // ///////////// Get All Diffrance of  Sift 1
            var default_in1 = $('.default_in1').val();
            var default_out1 = $('.default_out1').val();
            var diff1 = (new Date("1970-1-1 " + default_out1) - new Date("1970-1-1 " + default_in1)) / 1000 / 60 / 60;
            $('.Shift-1-7').val(diff1);
            // //////////////// Get All Diffrance of  Sift 2
            var default_in2 = $('.default_in2').val();
            var default_out2 = $('.default_out2').val();
            var diff2 = (new Date("1970-1-1 " + default_out2) - new Date("1970-1-1 " + default_in2)) / 1000 / 60 / 60;
            $('.Shift-2-7').val(diff2);
            // ////////////////  Get All Diffrance of  Sift 3
            var default_in3 = $('.default_in3').val();
            var default_out3 = $('.default_out3').val();
            var diff3 = (new Date("1970-1-1 " + default_out3) - new Date("1970-1-1 " + default_in3)) / 1000 / 60 / 60;
            $('.Shift-3-7').val(diff3);


            // Update Shift 1
            $('.form1').on('click', '.save_shift1', function(e) {
                e.preventDefault();

                // Chack if default if == 8 hours
                default_in1 = $('.default_in1').val();
                default_out1 = $('.default_out1').val();
                diff1 = (new Date("1970-1-1 " + default_out1) - new Date("1970-1-1 " + default_in1)) / 1000 / 60 / 60;

                if (diff1 == 8) {
                    var URL = "{{ route('Shift1.update') }}";
                    axios.post(URL, {
                            'id': $('.shift_time1').attr('id') ?? 0,
                            'in_from': $('.in_from1').val() ?? 0,
                            'in_to': $('.in_to1').val() ?? 0,
                            'default_in': $('.default_in1').val() ?? 0,
                            'out_from': $('.out_from1').val() ?? 0,
                            'out_to': $('.out_to1').val() ?? 0,
                            'default_out': $('.default_out1').val() ?? 0,
                        })
                        .then(function(response) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: response.data ?? "Not Find Parameter",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                } else {
                    alert("Default Total Hours of Shift 1 is Not = 8 Hours");
                }
            });


            // Update Shift 2
            $('.form2').on('click', '.save_shift2', function(e) {
                e.preventDefault();

                default_in2 = $('.default_in2').val();
                default_out2 = $('.default_out2').val();
                diff2 = (new Date("1970-1-1 " + default_out2) - new Date("1970-1-1 " + default_in2)) / 1000 / 60 / 60;

                if (diff2 == 8) {
                    var URL = "{{ route('Shift2.update') }}";
                    axios.post(URL, {
                            'id': $('.shift_time2').attr('id') ?? 0,
                            'in_from': $('.in_from2').val() ?? 0,
                            'in_to': $('.in_to2').val() ?? 0,
                            'default_in': $('.default_in2').val() ?? 0,
                            'out_from': $('.out_from2').val() ?? 0,
                            'out_to': $('.out_to2').val() ?? 0,
                            'default_out': $('.default_out2').val() ?? 0,
                        })
                        .then(function(response) {
                            console.log('Success');
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: response.data ?? "Not Find Parameter",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                } else {
                    alert("Default Total Hours of Shift 2 is Not = 8 Hours");
                }
            });

            // Update Shift 3
            $('.form3').on('click', '.save_shift3', function(e) {
                e.preventDefault();

                default_in3 = $('.default_in3').val();
                default_out3 = $('.default_out3').val();
                diff3 = (new Date("1970-1-1 " + default_out3) - new Date("1970-1-1 " + default_in3)) / 1000 / 60 / 60;
                if (diff3 == 8) {
                    var URL = "{{ route('Shift3.update') }}";
                    axios.post(URL, {
                            'id': $('.shift_time3').attr('id') ?? 0,
                            'in_from': $('.in_from3').val() ?? 0,
                            'in_to': $('.in_to3').val() ?? 0,
                            'default_in': $('.default_in3').val() ?? 0,
                            'out_from': $('.out_from3').val() ?? 0,
                            'out_to': $('.out_to3').val() ?? 0,
                            'default_out': $('.default_out3').val() ?? 0,
                        })
                        .then(function(response) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: response.data ?? "Not Find Parameter",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                } else {
                    alert("Default Total Hours of Shift 3 is Not = 8 Hours");
                }
            });
        }
    </script>
@endsection()
