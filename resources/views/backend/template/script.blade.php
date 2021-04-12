<script src="{{ (asset('public/backend/plugins/jquery/jquery.min.js')) }}"></script>
<script src="{{ (asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')) }}"></script>
<script src="{{ (asset('public/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')) }}"></script>
<script src="{{ (asset('public/backend/js/adminlte.js')) }}"></script>
<script src="{{ (asset('public/backend/js/demo.js')) }}"></script>
<script src="{{ (asset('public/backend/plugins/jquery-mousewheel/jquery.mousewheel.js')) }}"></script>
<script src="{{ (asset('public/backend/plugins/raphael/raphael.min.js')) }}"></script>
<script src="{{ (asset('public/backend/plugins/jquery-mapael/jquery.mapael.min.js')) }}"></script>
<script src="{{ (asset('public/backend/plugins/chart.js')) }}"></script>
<script src="{{ (asset('public/backend/js/pages/dashboard2.js')) }}"></script>
<!-- DataTables -->
<script src="{{ (asset('public/backend/plugins/datatables/jquery.dataTables.min.js')) }}"></script>
<script src="{{ (asset('public/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')) }}"></script>
<script src="{{ (asset('public/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')) }}"></script>
<script src="{{ (asset('public/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')) }}"></script>

<!-- Select2 -->
<script src="{{ (asset('public/backend/plugins/select2/js/select2.full.min.js')) }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ (asset('public/backend/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')) }}"></script>
<!-- InputMask -->
<script src="{{ (asset('public/backend/plugins/moment/moment.min.js')) }}"></script>
<script src="{{ (asset('public/backend/plugins/inputmask/min/jquery.inputmask.bundle.min.js')) }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ (asset('public/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')) }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ (asset('public/backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js')) }}"></script>
<!-- AdminLTE App -->
<script src="{{ (asset('public/backend/js/adminlte.min.js')) }}"></script>
<!-- AdminLTE for demo purposes -->
<!-- bs-custom-file-input -->
<script src="{{ (asset('public/backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js')) }}"></script>

<script src="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
<!--Summernote-->
<script src="{{ (asset('public/backend/plugins/summernote/summernote-bs4.min.js')) }}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ (asset('public/backend/plugins/jquery-ui/jquery-ui.min.js')) }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ (asset('public/backend/js/pages/dashboard.js')) }}"></script>
<script src="{{ (asset('public/backend/js/adminlte.js')) }}"></script>

<!-- AdminLTE for demo purposes -->

<script>
$(function () {
// Summernote
    $('#textarea').summernote()
})
</script>

<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });</script>


<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });</script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function (event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });
        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    })
</script>