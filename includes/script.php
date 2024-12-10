    <!-- Bootstrap 4 -->
    <script src="<?= ASSETS ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= ASSETS ?>/dist/js/adminlte.js"></script>
    <!-- ChartJS -->
    <script src="<?= ASSETS ?>/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= ASSETS ?>/plugins/sparklines/sparkline.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= ASSETS ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= ASSETS ?>/plugins/moment/moment.min.js"></script>
    <script src="<?= ASSETS ?>/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= ASSETS ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?= ASSETS ?>/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= ASSETS ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= ASSETS ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?= ASSETS ?>/plugins/toastr/toastr.min.js"></script>
    <!-- BS-Stepper -->
    <script src="<?= ASSETS ?>/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="<?= ASSETS ?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- Data Tables -->
    <script src="<?= ASSETS ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= ASSETS ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- InputMask -->
    <script src="<?= ASSETS ?>/plugins/moment/moment.min.js"></script>
    <script src="<?= ASSETS ?>/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- jquery-validation -->
    <script src="<?= ASSETS ?>/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= ASSETS ?>/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
        // Toast Fire
        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 2000
        });
        $(function() {
            // Initialize the bootstrap switch
            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
            // for data-tooltip
            $('[data-toggle="tooltip"]').tooltip();
            // Data Table Initialize
            $('#table').DataTable({
                'paging': true,
                'responsive': true,
                'lengthChange': true,
                'searching': true,
                'ordering': false,
                'info': true,
                'autoWidth': false,
                'scrollX': true,
            });
            //Money Euro
            $('[data-mask]').inputmask()
        })
    </script>