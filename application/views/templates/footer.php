       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->

       <!-- Footer -->
       <footer class="sticky-footer bg-white">
           <div class="container my-auto">
               <div class="copyright text-center my-auto">
                   <span>Copyright &copy; IT GIT Banua</span>
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
                       <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin untuk keluar?</h5>
                       <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">×</span>
                       </button>
                   </div>
                   <div class="modal-body">Jika anda keluar maka seluruh sesi hilang</div>
                   <div class="modal-footer">
                       <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                       <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Keluar</a>
                   </div>
               </div>
           </div>
       </div>

       <script>
           $(document).ready(function() {
               $('#example').DataTable({
                   responsive: {
                       details: {
                           display: $.fn.dataTable.Responsive.display.modal({
                               header: function(row) {
                                   var data = row.data();
                                   return 'Details for ' + data[0] + ' ' + data[1];
                               }
                           }),
                           renderer: $.fn.dataTable.Responsive.renderer.tableAll()
                       }
                   }
               });
           });
       </script>

       <!-- Bootstrap core JavaScript-->

       <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

       <!-- Core plugin JavaScript-->
       <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

       <!-- Custom scripts for all pages-->
       <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
       <!-- Page level plugins -->
       <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

       <!-- Page level custom scripts -->
       <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
       <script>
           // Pie Chart Example
           var ctx = document.getElementById("myPieChart");
           var myPieChart = new Chart(ctx, {
               type: 'doughnut',
               data: {
                   labels: ["Honor Sekolah", "PPPK", "Honor Provinsi", "PNS"],
                   datasets: [{
                       data: [25, 25, 30, 20],
                       backgroundColor: ['#4e73df', '#1cc88a', '#f56954', '#f39c12'],
                       hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                       hoverBorderColor: "rgba(234, 236, 244, 1)",
                   }],
               },
               options: {
                   maintainAspectRatio: false,
                   tooltips: {
                       backgroundColor: "rgb(255,255,255)",
                       bodyFontColor: "#858796",
                       borderColor: '#dddfeb',
                       borderWidth: 1,
                       xPadding: 15,
                       yPadding: 15,
                       displayColors: false,
                       caretPadding: 10,
                   },
                   legend: {
                       display: false
                   },
                   cutoutPercentage: 80,
               },
           });
       </script>


       </body>

       </html>