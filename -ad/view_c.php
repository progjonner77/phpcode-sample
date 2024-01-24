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
                      <th>Client List</th>
                      <th>Status</th>
                      <th>Email</th>
                      <th>Account Name</th>
                      <th>Password</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">

                    <?php
                    $result = qField_all("account", "id");
                    $i = 0;
                    if (!$result) {
                    } else {
                      while ($row_pro = mysqli_fetch_assoc($result)) {
                        ++$i;
                        extract($row_pro); 
                        if($id == 0){
                          }else{
                              ?>
                                <tr data="
                        <tr><td>Account name:</td><td><?php echo $Account_Name ?></td></tr>
                        <tr><td>Account Number:</td><td><?php echo $Account_Number ?></td></tr>
                        <tr><td>Account Bal:</td><td><?php echo (nameToSymbol(getField('account', 'id', $id, 'Currency'))) . $Account_Balance ?></td></tr>
                        <tr><td>Account Email Address:</td><td><?php echo $Account_Email_Address ?></td></tr>
                        <tr><td>Account Tel No:</td><td><?php echo $Account_Tel_No ?></td></tr>
                        <tr><td>Account Type:</td><td><?php echo $Account_Type ?></td></tr>
                        <tr><td>Currency:</td><td><?php echo $Currency ?></td></tr>
                        <tr><td>Country:</td><td><?php echo $Country ?></td></tr>
                        ">


                          <td><?php echo $i ?></td>
                          <td class="dt-control"></td>

                          <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="<?php echo $Account_Name?>">
                                <img src="../-myaccount/includes/data/images/<?php echo getField("account", "id", $id,  "Image_Name") ?>" alt="Avatar" class="rounded-circle">
                              </li>
                            </ul>
                          </td>

                          <td>
                            <?php if ($Status == "Active") { ?>
                              <span class="badge bg-label-info  me-1">Active</span>

                            <?php } elseif ($Status == "Deactivated") { ?>
                              <span class="badge bg-label-danger  me-1">Deactivated</span>
                            <?php } ?>
                          </td>
                          <td>
                            <?php if ($email_status == "1") { ?>
                              <span class="badge bg-label-info  me-1">Sent</span>

                            <?php } elseif ($email_status == "0") { ?>
                              <span class="badge bg-label-danger  me-1">Unsent</span>
                            <?php }else{ ?>
                               <span class="badge bg-label-warning  me-1">Unconfirmed</span>
                            <?php } ?>
                          </td>
                          <td>
                            <?php echo $Account_Name ?>
                          </td>

                          <td>
                            <?php echo $Newpassword ?>
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
                        
                        <?php
                        }
                        // echo $User_id;
                      ?>
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
                          <label for="User_Name" class="form-label">Enter Account Name</label>
                          <input type="text" name="Account_Name" id="Account_Name" class="form-control" placeholder="Enter Account Name">
                        </div>
                        <div class="col mb-0">
                          <label for="Status" class="form-label">Account Number</label>
                          <input type="text" name="Account_Number" id="Account_Number" class="form-control" placeholder="Account Number">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="row mb-3">
                        <div class="col mb-0">
                          <label for="Date" class="form-label"> Account Balance</label> <input type="text" name="Account_Balance" id="Account_Balance" class="form-control" placeholder="000000">
                        </div>

                        <div class="col mb-0">
                          <label for="coin" class="form-label">Account Email Address</label>
                          <input type="text" name="Account_Email_Address" id="Account_Email_Address" class="form-control" placeholder="Account Email Address">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="row mb-3">
                        <div class="col mb-0">
                          <label for="emailBackdrop" class="form-label">Account Type</label>
                          <select name="Account_Type" id="Account_Type" class=" form-control form-select">
                            <option>Savings account</option>
                            <option>Current Account</option>
                            <option>Non Resident Account</option>
                            <option>Fixed Deposit Account</option>
                            <option>Check Account</option>
                          </select>
                        </div>
                        <div class="col mb-0">
                          <label for="Status" class="form-label">Currency</label>
                          <select name="Currency" id="Currency" class=" form-control form-select">
                            <?php
                            $result = qField_all("currency", "id");
                            if (!$result) {
                            } else {
                              while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo symbolToName($row["Symbol"]); ?>">
                                  <?php echo $row["Symbol"]; ?>
                                </option>

                            <?php
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="row mb-3">
                        <div class="col mb-0">
                          <label for="Ben_Accname" class="form-label">Status</label>
                          <select name="Status" id="Status" class=" form-control form-select">
                            <option>Active</option>
                            <option>Deactivated</option>
                          </select>
                        </div>

                        <div class="col mb-0">
                          <label for="Ben_Accname" class="form-label">Card Status</label>
                          <select name="Status_Card" id="Status_Card" class=" form-control form-select">
                            <option>Active</option>
                            <option>Inactive</option>
                            <option>Suspended</option>
                          </select>
                        </div>


                      </div>
                    </div>
                    <div class="row">
                      <div class="row mb-3">
                        <div class="col mb-0">
                          <label for="Ben_Accname" class="form-label">Date</label>
                          <input type="text" name="Date" id="Date" class="form-control" placeholder="2023:05:10">
                        </div>
                        <div class="col mb-0">
                          <label for="Ben_Bank" class="form-label">Account Tel No</label>
                          <input type="number" name="Account_Tel_No" id="Account_Tel_No" class="form-control" placeholder="Account Tel No">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="row mb-3">
                        <div class="col mb-0">
                          <label for="Ben_Accname" class="form-label"> Occupation </label>
                          <input type="text" name="Occupation" id="Occupation" class="form-control" placeholder="Occupation ">
                        </div>

                        <div class="col mb-0">
                          <label for="Ben_Accname" class="form-label"> Next Of KIN</label>
                          <input type="text" name="Next_Of_KIN" id="Next_Of_KIN" class="form-control" placeholder="Next Of KIN">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="row mb-3">
                        <div class="col mb-0">
                          <label for="Ben_Accname" class="form-label">Marital Status </label>
                          <input type="text" name="Marital_Status" id="Marital_Status" class="form-control" placeholder="Marital Status">
                        </div>
                        <div class="col mb-0">
                          <label for="Ben_Accname" class="form-label">Date of Birth</label>
                          <input type="text" name="Date_of_Birth" id="Date_of_Birth" class="form-control" placeholder="Date of Birth">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="row mb-3">
                        <div class="col mb-0">
                          <label for="Ben_Accname" class="form-label">Country</label>
                          <input type="text" name="Country" id="Country" class="form-control" placeholder="Country">
                        </div>
                        <div class="col mb-0">
                          <label for="Ben_Accname" class="form-label">Zip Code</label>
                          <input type="text" name="Zip_Code" id="Zip_Code" class="form-control" placeholder="Zip Code">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="row mb-3">
                        <div class="col mb-0">
                          <label for="nameBackdrop" class="form-label">IBAN_Number</label>
                          <input type="text" name="IBAN_Number" id="IBAN_Number" class="form-control" placeholder="IBAN_Number">
                        </div>
                        <div class="col mb-0">
                          <input type="text" hidden name="id" id="id">
                          <label for="Address" class="form-label">Address</label>
                          <input type="text" name="Address" id="Address" class="form-control" placeholder="Address">
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
          operation: "account",
        },
        dataType: "json",
        success: function(data) {
          $('#Account_Name').val(data.Account_Name);
          $('#Account_Number').val(data.Account_Number);
          $('#IBAN_Number').val(data.IBAN_Number);
          $('#Account_Balance').val(data.Account_Balance);
          $('#Account_Type').val(data.Account_Type);
          $('#Account_Email_Address').val(data.Account_Email_Address);
          $('#Account_Tel_No').val(data.Account_Tel_No);
          $('#id').val(data.id);
          $('#Currency').val(data.Currency);
          $('#Country').val(data.Country);
          $('#Zip_Code').val(data.Zip_Code);
          $('#Occupation').val(data.Occupation);
          $('#Next_Of_KIN').val(data.Next_Of_KIN);
          $('#Marital_Status').val(data.Marital_Status);
          $('#Status_Card').val(data.Status_Card);
          $('#Date').val(data.Date);
          $('#Status').val(data.Status);
          $('#Date_of_Birth').val(data.Date_of_Birth); //
          $('#Address').val(data.Address); //
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
          operation: "account",
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
        'value': "account"
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