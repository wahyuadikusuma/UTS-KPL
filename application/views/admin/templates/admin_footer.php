 <!-- Footer -->
 <footer class="sticky-footer bg-light text-dark">
     <!-- developed with <3 by wahyu adi kusuma -->
     <div class="container my-auto">
         <div class="copyright text-center my-auto">
             <span>Copyright &copy; <?= date('Y') ?> by Diskominfo Kabupaten Wonogiri. All Right Reserved. </span>
         </div>
     </div>
 </footer>
 <!-- End of Footer -->

 </div>
 <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-primary" href="<?= base_url('admin/logout'); ?>">Logout</a>
             </div>
         </div>
     </div>
 </div>


 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Load Jquery & Datatable JS -->
 <script type="text/javascript" src="<?php echo base_url('assets/datatables/datatables.min.js') ?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/datatables/lib/js/dataTables.bootstrap4.min.js') ?>"></script>
 <script type="text/javascript">
     $(document).ready(function() {
         $('.tanggal').datepicker({
             format: "dd-mm-yyyy",
             autoclose: true
         });
     });
 </script>
 <script>
     $(document).ready(function() {
         tabel = $('#table-artikel').DataTable({
             "processing": true,
             "serverSide": true,
             "ordering": true, // Set true agar bisa di sorting
             "ajax": {
                 "url": "<?php echo base_url('ajax/get_ajax_artikel') ?>", // URL file untuk proses select datanya
                 "type": "POST"
             },
             "columnDefs": [{
                 "targets": [-2, -1],
                 "orderable": false,
             }],
             "deferRender": true,
             "aLengthMenu": [
                 [5, 10, 25],
                 [5, 10, 25]
             ], // Combobox Limit
             "order": [],
             //  "responsive": true,
             autoFill: true
         })
     });
 </script>

 <script>
     $(document).ready(function() {
         tabel = $('#table-pesan').DataTable({
             "processing": true,
             "serverSide": true,
             "ordering": true, // Set true agar bisa di sorting
             "ajax": {
                 "url": "<?php echo base_url('ajax/get_ajax_pesan') ?>", // URL file untuk proses select datanya
                 "type": "POST"
             },
             "columnDefs": [{
                 "targets": [-1],
                 "orderable": false,
             }],
             "deferRender": true,
             "aLengthMenu": [
                 [5, 10, 25],
                 [5, 10, 25]
             ], // Combobox Limit
             "order": [],
             //  "responsive": true,
             autoFill: true
         })
     });
 </script>

 <script>
     $(document).ready(function() {
         tabel = $('#table-kegiatan').DataTable({
             "processing": true,
             "serverSide": true,
             "ordering": true, // Set true agar bisa di sorting
             "ajax": {
                 "url": "<?php echo base_url('ajax/get_ajax_kegiatan') ?>", // URL file untuk proses select datanya
                 "type": "POST"
             },
             "columnDefs": [{
                 "targets": [-2, -1],
                 "orderable": false,
             }],
             "deferRender": true,
             "aLengthMenu": [
                 [5, 10, 25],
                 [5, 10, 25]
             ], // Combobox Limit
             "order": [],
             //  "responsive": true,
             autoFill: true
         })
     });
 </script>

 <script>
     $(document).ready(function() {
         tabel = $('#table-fotokegiatan').DataTable({
             "processing": true,
             "serverSide": true,
             "ordering": true, // Set true agar bisa di sorting
             "ajax": {
                 "url": "<?php echo base_url('ajax/get_ajax_fotokegiatan') ?>", // URL file untuk proses select datanya
                 "type": "POST"
             },
             "columnDefs": [{
                 "targets": [-2, -1],
                 "orderable": false,
             }],
             "deferRender": true,
             "aLengthMenu": [
                 [5, 10, 25],
                 [5, 10, 25]
             ], // Combobox Limit
             "order": [],
             //  "responsive": true,
             autoFill: true
         })
     });
 </script>

 <script>
     $(document).ready(function() {
         tabel = $('#table-materi').DataTable({
             "processing": true,
             "serverSide": true,
             "ordering": true, // Set true agar bisa di sorting
             "ajax": {
                 "url": "<?php echo base_url('ajax/get_ajax_materi') ?>", // URL file untuk proses select datanya
                 "type": "POST"
             },
             "columnDefs": [{
                 "targets": [-1], // -1 itu field aksi
                 "orderable": false,
             }],
             "deferRender": true,
             "aLengthMenu": [
                 [5, 10, 25],
                 [5, 10, 25]
             ], // Combobox Limit
             "order": [],
             //  "responsive": true,
             autoFill: true
         })
     });
 </script>

 <!-- Sweet Alert 2 -->
 <script src="<?= base_url(); ?>assets/js/sweetalert2/sweetalert2.all.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/sweetalert2/myscript.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?= base_url('assets/'); ?>js/sb-admin-2/sb-admin-2.min.js"></script>


 </body>

 </html>