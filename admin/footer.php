</div>

</div>


<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery.overlayScrollbars.min.js"></script>
<script src="assets/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/dataTables.responsive.min.js"></script>
<script src="assets/js/responsive.bootstrap4.min.js"></script>
<script src="assets/js/dataTables.buttons.min.js"></script>
<script src="assets/js/buttons.bootstrap4.min.js"></script>

<script src="assets/js/jquery.validate.min.js"></script>

<script type="text/javascript" src="assets/js/adminlte.js"></script>

<script src="./assets/lib/ckeditor/ckeditor.js"></script>

<script>
  if (document.getElementById('p_description')) {
    CKEDITOR.replace('p_description');
  }

  if (document.getElementById('p_short_description')) {
    CKEDITOR.replace('p_short_description');
  }
</script>

<script type="text/javascript">
  (function() {
    $('.select2').select2();

    $("#example1")
      .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["excel"],
      })
      .buttons()
      .container()
      .appendTo("#example1_wrapper .col-md-6:eq(0)");

    $('#example2').DataTable({
      "paging": true,
      "pageLength": 10,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "language": {
            "lengthMenu": "_MENU_",
            "zeroRecords": "Không có kết quả nào được tìm thấy",
            "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
            "infoEmpty":"Không có kết quả",
            "infoFiltered":   "",
            "paginate": {
                "first":      "Đầu tiên",
                "last":       "Cuối cùng",
                "next":       "Tiếp",
                "previous":   "Trước"
            },
            "search": "Tìm kiếm:",
        }
    });

    $('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

    function confirmDelete() {
      return confirm("Bạn có chắc muốn xóa dữ liệu này không?");
    }
  })()
</script>

<script type="text/javascript">
  $(document).ready(function() {

    $("#btnAddNew").click(function() {

      var rowNumber = $("#ProductTable tbody tr").length;

      var trNew = "";

      var addLink = "<div class=\"upload-btn" + rowNumber + "\"><input type=\"file\" name=\"photo[]\"  style=\"margin-bottom:5px;\"></div>";

      var deleteRow = "<a href=\"javascript:void()\" class=\"Delete btn btn-danger btn-xs\">X</a>";

      trNew = trNew + "<tr> ";

      trNew += "<td>" + addLink + "</td>";
      trNew += "<td style=\"width:28px;\">" + deleteRow + "</td>";

      trNew = trNew + " </tr>";

      $("#ProductTable tbody").append(trNew);

    });

    $('#ProductTable').delegate('a.Delete', 'click', function() {
      $(this).parent().parent().fadeOut('slow').remove();
      return false;
    });

    $.validator.addMethod("imageFormat", function(value, element) {
      if (value == '') {
        return true; 
      }
      return this.optional(element) || /\.(jpe?g|png|gif)$/i.test(value);
    }, "Vui lòng chọn ảnh có định dạng JPEG, PNG, hoặc GIF.");
    $.validator.addMethod("positiveNumber", function(value, element) {
      if (value == '') {
        return true; 
      }
      return Number(value) > 0;
    }, "Vui lòng nhập số dương");
    $('#addPdForm').validate({
      rules: {
        cate_id: 'required',
        p_name: 'required',
        p_old_price: {
          number: true,
          positiveNumber: true
        },
        'photo[]' : {
          imageFormat: true,
        },
        p_current_price: {
          required: true,
          number: true,
          positiveNumber: true
        },
        p_quantity: {
          required: true,
          number: true,
          positiveNumber: true
        },
        p_featured_photo: {
          required: true,
          imageFormat: true
        }
      },
      messages: {
        cate_id: 'Trường này không được để trống',
        p_name: 'Trường này không được để trống',
        p_old_price: {
          number: 'Vui lòng nhập kiểu số',
          positiveNumber: 'Vui lòng nhâp số dương',
        },
        p_current_price: {
          required: 'Trường này không được để trống',
          number: 'Vui lòng nhập kiểu số',
          positiveNumber: 'Vui lòng nhâp số dương',
        },
        p_quantity: {
          required: 'Trường này không được để trống',
          number: 'Vui lòng nhập kiểu số',
          positiveNumber: 'Vui lòng nhâp số dương',
        },
        p_featured_photo: {
          required: 'Vui lòng chọn ảnh đại diện',
          imageFormat: 'Vui lòng chọn ảnh có định dạng JPEG, JPG, PNG, hoặc GIF'
        } 
      },
      submitHandler: function(form) {
        form.submit();
      }
    });
    $('#updatePdForm').validate({
      rules: {
        cate_id: 'required',
        p_name: 'required',
        p_old_price: {
          number: true,
          positiveNumber: true
        },
        'photo[]' : {
          imageFormat: true,
        },
        p_current_price: {
          required: true,
          number: true,
          positiveNumber: true
        },
        p_quantity: {
          required: true,
          number: true,
          positiveNumber: true
        },
        p_featured_photo: {
          imageFormat: true
        }
      },
      messages: {
        cate_id: 'Trường này không được để trống',
        p_name: 'Trường này không được để trống',
        p_old_price: {
          number: 'Vui lòng nhập kiểu số',
          positiveNumber: 'Vui lòng nhâp số dương',
        },
        p_current_price: {
          required: 'Trường này không được để trống',
          number: 'Vui lòng nhập kiểu số',
          positiveNumber: 'Vui lòng nhâp số dương',
        },
        p_quantity: {
          required: 'Trường này không được để trống',
          number: 'Vui lòng nhập kiểu số',
          positiveNumber: 'Vui lòng nhâp số dương',
        },
        p_featured_photo: {
          imageFormat: 'Vui lòng chọn ảnh có định dạng JPEG, JPG, PNG, hoặc GIF'
        } 
      },
      submitHandler: function(form) {
        form.submit();
      }
    });

  })
</script>

</body>

</html>