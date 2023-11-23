</div>
          <!-- /.container-fluid -->
</div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2021</span>
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
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn đăng xuất?</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
           Ấn cancel để hủy
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <a class="btn btn-primary" href="../login/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    
    <!-- axios -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
    const tbody = document.getElementById("data-content");
    const pagination = document.querySelector(".pagination");
    const currentPage = 1;
    const getProduct = async (data = 1) => {
        try {
            const res = await axios.get(`http://localhost:3000/quantri/pagination.php?page=${data}`);
            printBtn(res.data.totalPage);
            printProduct(res.data);
        } catch (e) {
            console.error(e);
        }
    };

    getProduct(currentPage);

    const printProduct = (data) => {
        const listProduct = data?.products?.map((item, index) => {
            const images = item.images.split(";");
            return `
            <tr>
                <td>${item.name}</td>
                <td><img src=${images[0]} height='100px'/></td>
                <td>${item.category}</td>
                <td>${item.brand}</td>
                <td>${item.status}</td>
                <td>
                    <a href='../quantri/editproduct.php?id=${item.id}'><i class='fa-solid fa-pen-to-square'></i></a> 
                    <a href='../quantri/deleteproduct.php?id=${item.id}'><i class='fa-regular fa-trash-can'></i></a>                    
                </td>
            </tr>
            `
        }).join("");

        tbody.innerHTML = listProduct;
    }

    const printBtn = (total) => {
      let html = `<li class="page-item page-link" onclick="getProduct(${currentPage > 1 ? currentPage - 1 : 1})">
                   
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    
                    </li>`;
                    
        for(let i = 1; i <= total; i++) {
          html += `<li class="page-item page-link" onclick="getProduct(${i})">${i}</li>`;
        }
        html += `<li class="page-item page-link" onclick="getProduct(${currentPage < total ? currentPage + 1 : total})">    
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </li>`;

        pagination.innerHTML = html;
    }


</script>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Page level custom scripts -->

  </body>
</html>