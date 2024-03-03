    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>
    <script>// Get the input elements
     var bayarInput = document.querySelector('input[name="Bayar"]');
     var totalHargaInput = document.querySelector('input[name="TotalHarga"]');    
     // Add event listener to the Bayar input field<br/>    
     bayarInput.addEventListener('input', function() {
        var kembalian = 0;
     // Get the values entered by the user<br/>        
     var bayar = parseFloat(this.value);
     var totalHarga = parseFloat(totalHargaInput.value);
     // Calculate the kembalian<br/>        
     var kembalian = bayar - totalHarga;
     // Update the display of kembalian<br/>        
     document.getElementById('kembalianDisplay').textContent = kembalian.toFixed(2);
     document.getElementById('kembalianDisplay').value = kembalian;
     if (kembalian < 1000) {
        console.log("Jumlah uang masih kurang!");
     }
      // You can customize the display format as needed<br/>    
      })

      ;</script>

</body>

</html>