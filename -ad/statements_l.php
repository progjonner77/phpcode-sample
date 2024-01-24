<!DOCTYPE html>
<?php include("includes/head.php") ?>
<link href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/r-2.4.1/datatables.min.css" rel="stylesheet" />

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
                <table class="table card-table table-hover td.dt-control table-bordered table-striped" id="table">

                  <thead>
                    <tr>
                      <th>#</th>
                      <th>View More</th>
                      <th>Client Name</th>
                      <th>Client List</th>
                      <th>Status</th>
                      <th>Reference</th>
                      <th>Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">

                    <?php
                    $result = qField_all("loan", "id");
                    $i = 0;
                    if (!$result) {
                    } else {
                      while ($row_pro = mysqli_fetch_assoc($result)) {
                        ++$i;
                        extract($row_pro);
                        // echo $User_id;
                    ?>


                        <tr data="
                        <tr><td>Loan Amount:</td><td><?php echo (nameToSymbol(getField('account', 'id', $User_id, 'Currency'))) . $Loan_Amount ?></td></tr>

                        <tr><td>Interest:</td><td><?php echo (nameToSymbol(getField('account', 'id', $User_id, 'Currency'))) . $Interest ?></td></tr>

                        <tr><td>Monthly Pay:</td><td><?php echo (nameToSymbol(getField('account', 'id', $User_id, 'Currency'))) . $Monthly_Payment ?></td></tr>

                        <tr><td>Total Pay:</td><td><?php echo (nameToSymbol(getField('account', 'id', $User_id, 'Currency'))) . $Total_Payment ?></td></tr>

                        <tr><td>Purpose For Loan:</td><td><?php echo $Purpose ?></td></tr>
                        <tr><td>Admin Remark:</td><td><?php echo $Remark ?></td></tr>">


                          <td><?php echo $i ?></td>
                          <td class="dt-control"></td>
                          <td>
                            <?php echo $User_Name ?>
                          </td>
                          <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="<?php echo $User_Name?>">
                                <img src="../-myaccount/includes/data/images/<?php echo getField("account", "id", $User_id,  "Image_Name") ?>" alt="Avatar" class="rounded-circle">
                              </li>
                            </ul>
                          </td>

                          <td>
                            <?php if ($Status == "Pending") { ?>
                              <span class="badge bg-label-primary me-1">Pending</span>

                            <?php } elseif ($Status == "Suspended") { ?>
                              <span class="badge bg-label-danger me-1">Suspended</span>

                            <?php } elseif ($Status == "Active") { ?>
                              <span class="badge bg-label-info  me-1">Active</span>

                            <?php } elseif ($Status == "Approved") { ?>
                              <span class="badge bg-label-success  me-1">Approved</span>
                            <?php } ?>
                          </td>
                          <td>
                            <?php echo $Loan_Amount ?>
                          </td>

                          <td>
                            <?php echo $Date ?>
                          </td>
                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                              <div class="dropdown-menu">
                                <!-- Button trigger modal -->
                                <a class="dropdown-item edit" href="javascript:void(0);" with="<?php echo $id ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item delete" with_del="<?php echo $id ?>" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                              </div>
                            </div>
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
        <!-- Modal Backdrop -->
        <div class="col-lg-4 col-md-3">
          <small class="text-light fw-semibold">Backdrop</small>
          <div class="mt-3">

            <button type="button" hidden class="btn btn-primary trigger_e" data-bs-toggle="modal" data-bs-target="#backDropModal">
              Launch modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
              <div class="modal-dialog">
                <form class="modal-content" id="formAccountSettings" method="POST">
                  <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                    <div class="row">
                      <div class="row mb-3">
                        <div class="col mb-0">
                          <label for="User_Name" class="form-label">Borrower's Name</label>
                          <input type="text" name="User_Name" id="User_Name" class="form-control" placeholder="Borrower's Name">
                        </div>
                        <div class="col mb-0">
                          <label for="Status" class="form-label">Loan status</label>
                          <select name="Status" id="Status" class=" form-control form-select">
                            <option>Approved</option>
                            <option>Pending</option>
                            <option>Suspended</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="row mb-3">
                        <div class="col mb-0">
                          <label for="nameBackdrop" class="form-label">Amount</label>
                          <input type="number" name="Loan_Amount" id="Loan_Amount" class="form-control" placeholder="Enter Amount">
                        </div>
                        <div class="col mb-0">
                          <label for="Date" class="form-label"> Date</label> <input type="text" name="Interest" id="Interest" class="form-control" placeholder="Loan  interest">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="row mb-3">
                        <div class="col mb-0">
                          <label for="emailBackdrop" class="form-label">Crypto Name</label>
                          <input type="text" name="Monthly_Payment" id="Monthly_Payment" class="form-control" placeholder="Crypto Name">
                        </div>
                        <div class="col mb-0">
                          <label for="coin" class="form-label">Coin name</label>
                          <input type="text" name="Total_Payment" id="Total_Payment" class="form-control" placeholder="Coin name">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="row mb-3">
                        <div class="col mb-0">
                          <label for="Ben_Bank" class="form-label">Years to pay back</label>
                          <input type="text" name="Year" id="Year" class="form-control" placeholder="Years to pay back">
                        </div>
                        <div class="col mb-0">
                          <label for="Ben_Accname" class="form-label">Date</label>
                          <input type="text" name="Date" id="Date" class="form-control" placeholder="2023:05:10">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="row mb-3">
                        <div class="col mb-0">
                          <label for="Purpose" class="form-label">Purpose of Loan</label>
                          <textarea name="Purpose" id="Purpose" col="7" class="form-control" placeholder="Purpose for loan" aria-label="Purpose for loan" aria-describedby="basic-icon-default-message2" style="height: 75px;"></textarea>
                        </div>

                        <div class="col mb-0">
                          <input type="text" hidden name="id" id="id">
                          <label for="Remark" class="form-label">Remark From You</label>
                          <textarea name="Remark" id="Remark" col="7" class="form-control" placeholder="Remark from you" aria-label="Remark from you" aria-describedby="basic-icon-default-message2" style="height: 75px;"></textarea>

                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary close" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
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
    $(".edit").click(function(e) {
      e.preventDefault();
      $(".trigger_e").click();

      var id = $(this).attr("with");
      $.ajax({
        url: "admin_temps/admin/funcs/feed_Trans.php",
        method: "POST",
        data: {
          id: id,
          operation: "loan",
        },
        dataType: "json",
        success: function(data) {
          $('#Loan_Amount').val(data.Loan_Amount);
          $('#Interest').val(data.Interest);
          $('#Monthly_Payment').val(data.Monthly_Payment);
          $('#Total_Payment').val(data.Total_Payment);
          $('#Year').val(data.Year);
          $('#Date').val(data.Date);
          $('#Purpose').val(data.Purpose);
          $('#id').val(data.id);
          $('#Remark').val(data.Remark);
          $('#User_Name').val(data.User_Name);
          $('#Status').val(data.Status);
          //
        }

      });



    });
  </script>

  <script>
    $(".delete").click(function(e) {
      e.preventDefault();
      const self = $(this);
      var val;
      off(self)

      var id = $(this).attr("with_del");
      $.ajax({
        url: "admin_temps/admin/funcs/super_delete.php",
        method: "POST",
        data: {
          id: id,
          operation: "loan",
        },
        dataType: "json",
        error: function() {
          error(self)
        },
        success: function(data) {
          success(self, "Deleted Successfully");
          setTimeout(() => {
            window.location = "";
          }, 3000);
        }

      });

    });
  </script>

  <script>
    $(".save").click(function(e) {
      e.preventDefault();
      const self = $(this);
      var val;
      off(self)

      var _formData = $("#formAccountSettings").serializeArray();
      _formData.push({
        'name': "operation",
        'value': "loan"
      });

      var $_databaseObject = {
        url: "admin_temps/admin/funcs/super_update.php",
        method: "POST",
        dataType: "json",
        data: _formData,
        cache: true,
        processData: true,

        error: function() {
          error(self);
        },

        success: function(data) {

          if (data.output1 == 1) {
            $('.btn-close').click();
            $("#formAccountSettings")[0].reset();
            success(self);
            setTimeout(() => {
              window.location = "";
            }, 3000);
          } else {
            error(self, data.error);
          }

        }
      }
      $.ajax($_databaseObject);
      //alert();
    })
  </script>

  <script>
    function format(d) {
      // `d` is the original data object for the row
      return (
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        d +
        '</table>'
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
      $('#table tbody').on('click', 'td.dt-control', function() {
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