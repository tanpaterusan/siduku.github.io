 <!-- Footer-->
 <footer class="footer text-center">
     <div class="container px-4 px-lg-5">
         <ul class="list-inline mb-5">
             <li class="list-inline-item">
                 <a class="social-link rounded-circle text-white mr-3" href="#!"><i class="icon-social-facebook"></i></a>
             </li>
             <li class="list-inline-item">
                 <a class="social-link rounded-circle text-white mr-3" href="#!"><i class="icon-social-twitter"></i></a>
             </li>
             <li class="list-inline-item">
                 <a class="social-link rounded-circle text-white" href="#!"><i class="icon-social-github"></i></a>
             </li>
         </ul>
         <p class="text-muted small mb-0">Copyright &copy; Your Website 2021</p>
     </div>
 </footer>
 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
 <!-- Bootstrap core JS-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
 <!-- Core theme JS-->
 <script src="js/scripts.js"></script>

 <script>
     $(document).ready(function() {
         $(document).on('click', '.detail', function() {
             var jenis = $(this).data('jenis');
             var perihal = $(this).data('perihal');
             var tempat = $(this).data('tempat');
             var waktu = $(this).data('waktu');
             var uraian = $(this).data('uraian');
             var pelapor = $(this).data('pelapor');
             var terlapor = $(this).data('terlapor');
             var telp = $(this).data('telp');
             $('#jenis').text(jenis);
             $('#perihal').text(perihal);
             $('#tempat').text(tempat);
             $('#waktu').text(waktu);
             $('#uraian').text(uraian);
             $('#pelapor').text(pelapor);
             $('#terlapor').text(terlapor);
             $('#telp').text(telp);
         });
     });

     $('.verif').on('click', function() {
         const id = $(this).data('id');
         $('#id').val(id);
     });

     $('.tinjut').on('click', function() {
         const id = $(this).data('id');
         $('#id').val(id);
     });

     $('.ket').on('click', function() {
         const ket = $(this).data('ket');
         $('#keterangan').text(ket);
     })
 </script>

 </body>

 </html>