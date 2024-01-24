<!DOCTYPE html>
<?php include("includes/head.php") ?>

<link href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/r-2.4.1/datatables.min.css" rel="stylesheet" />

<style>
  td.highlight {
    background-color: whitesmoke !important;
  }

  tr.highlight {
    background-color: whitesmoke !important;
  }
</style>

<body>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container">

      <!-- Menu -->
      <?php include("includes/side.php") ?>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">

        <!-- Navbar -->
        <?php include "includes/top.php" ?>
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">

          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">


            <h4 class="fw-bold py-3 mb-4">
              <span class="text-muted fw-light">Tables /</span> Basic Tables
            </h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
              <h5 class="card-header">Table Basic</h5>

              <div class="table-responsive text-nowrap">
                <table class="table card-table table-hover td.dt-control" id="table">

                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Last active Date</th>
                      <th>Last active Time</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">

                    <?php
                    $result = qField('login_details', 'user_id', $_SESSION['Account_id']);
                    $i = 0;
                    if (!$result) {
                    } else {
                      while ($row_pro = mysqli_fetch_assoc($result)) {
                        ++$i;

                        extract($row_pro)
                    ?>

                        <tr> 
                          <td><?php echo $i ?></td>
                          <td>
                            <?php echo strstr($last_activity, " ", true )?>
                          </td>

                          <td>
                            <?php echo strstr($last_activity, " ", false ) ?>
                          </td>

                        </tr>
                    <?php }
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!--/ Basic Bootstrap Table -->

            <hr class="my-5">

          </div>
          <!-- / Content -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

  </div>
  <!-- / Layout wrapper -->

  <?php include("includes/script.php") ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/r-2.4.1/datatables.min.js"></script>

  <script>
    
    function format(d) {
    // `d` is the original data object for the row
    return (
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            d
         +'</table>'
    );

}

    $(document).ready(function() {
      var table = $('#table').DataTable();
      $('#table tbody').on('mouseenter', 'td', function() {
        var colIdx = table.cell(this).index().column;
        $(table.cells().nodes()).removeClass('highlight');
        $(table.column(colIdx).nodes()).addClass('highlight');
      });
      // Add event listener for opening and closing details
      $('#table tbody').on('click', 'td.dt-control', function () {
          var tr = $(this).closest('tr');
          var row = table.row(tr);

          if (row.child.isShown()) {
              // This row is already open - close it
              row.child.hide();
              tr.removeClass('shown');
          } else {
              // Open this row
              row.child(format(tr.attr("data"))).show();
              tr.addClass('shown');
          }
      });
    });
  </script>
</body>

</html>