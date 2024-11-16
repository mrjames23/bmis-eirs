<!-- jQuery -->
<script src="<?= ASSETS ?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= ASSETS ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
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
<!-- Data Tables -->
<script src="<?= ASSETS ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= ASSETS ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= ASSETS ?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $(window).on('load', function() {
        $('.preloader').addClass('fade-out')

        /** Add Active class and stay opened on selected aside */
        var url = window.location;
        $('li.nav-item a').filter(function() {
            return this.href == url;
        }).parentsUntil(".nav-item > .nav-link").addClass('menu-open');
    })
</script>
<!-- Active Script -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script>
    $(function() {
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
        })
        // Toast Fire
        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 2000
        });

        function error() {
            Swal.fire({
                title: 'Error!',
                text: 'Something went wrong!',
                icon: 'error',
                confirmButtonText: 'Exit'
            })
        }

        function loading() {
            Swal.fire({
                title: 'Please wait...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            })
        }
    })
</script>