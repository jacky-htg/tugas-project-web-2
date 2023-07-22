<?= $this->extend('layouts/page_layout') ?>
<?= $this->section('content') ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<div class="right_col" role="main" style="min-height: 3790px;">
  <div class="title">
    <h3>Manajemen User</h3>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="myTable" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Is Actived</th>
                  <th>Is Verified</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>

        <script src="<?= base_url('vendors'); ?>/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url('vendors'); ?>/datatables.net-buttons/js/dataTables.buttons.min.js"></script>

        <style>
          /* Style for the title */
          .title h3 {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            color: #007bff;
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
          }

          /* Style for Show entries dropdown */
          div.dataTables_wrapper div.dataTables_length {
            margin-bottom: 10px;
          }

          div.dataTables_wrapper div.dataTables_length label {
            font-weight: 500;
            margin-right: 10px;
          }

          div.dataTables_wrapper div.dataTables_length select {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 4px 8px;
          }

          /* Style for Show entries dropdown focus */
          div.dataTables_wrapper div.dataTables_length select:focus {
            outline: none;
            border-color: #66afe9;
            box-shadow: 0 0 5px rgba(102, 175, 233, 0.5);
          }

          /* Style for the table search box */
          div.dataTables_wrapper div.dataTables_filter input {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 6px 10px;
            width: 200px;
          }

          /* Style for search input focus */
          div.dataTables_wrapper div.dataTables_filter input:focus {
            outline: none;
            border-color: #66afe9;
            box-shadow: 0 0 5px rgba(102, 175, 233, 0.5);
          }

          /* Style for pagination buttons */
          div.dataTables_wrapper div.dataTables_paginate ul.pagination {
            justify-content: flex-end;
          }

          /* Optional: Adjust button margin for better spacing */
          div.dataTables_wrapper div.dataTables_paginate ul.pagination li.paginate_button {
            margin: 2px;
          }

          /* Button styles */
          .btn {
            border-radius: 15px;
          }

          .btn-primary {
            background-color: #007bff;
            color: #fff;
          }

          .btn-primary:hover {
            background-color: #0056b3;
          }

          .btn-success {
            background-color: #28a745;
            color: #fff;
          }

          .btn-success:hover {
            background-color: #1b862b;
          }

          .btn-danger {
            background-color: #dc3545;
            color: #fff;
          }

          .btn-danger:hover {
            background-color: #b42a37;
          }
        </style>

        <script>
          $(document).ready(function() {
            let myTable = $('#myTable').DataTable({
              dom: '<"top"lfB>rt<"bottom"ip><"clear">',
              buttons: [{
                text: 'Add New User',
                className: 'btn btn-primary',
                action: function(e, dt, node, config) {
                  window.location = "<?= base_url('users'); ?>/create";
                }
              }],
              language: {
                paginate: {
                  first: '<i class="fas fa-angle-double-left"></i>', // Font Awesome double left arrow icon
                  last: '<i class="fas fa-angle-double-right"></i>', // Font Awesome double right arrow icon
                  next: '<i class="fas fa-angle-right"></i>', // Font Awesome right arrow icon
                  previous: '<i class="fas fa-angle-left"></i>', // Font Awesome left arrow icon
                }
              },
              'processing': true,
              'serverSide': true,
              'serverMethod': 'get',
              ajax: {
                url: '<?= base_url("api/users"); ?>',
                dataSrc: 'data'
              },
              "columnDefs": [{
                "targets": 3,
                "orderable": false
              }],
              columns: [{
                  data: 'name'
                },
                {
                  data: 'email'
                },
                {
                  data: 'is_actived'
                },
                {
                  data: 'is_verified'
                },
                {
                  data: null,
                  render: function(data, type, row) {
                    return '<div class="btn-group" role="group">' +
                      '<button data-id="' + row.DT_RowId + '" class="btn btn-success btn-sm updateBtn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>' +
                      '<button data-id="' + row.DT_RowId + '" class="btn btn-danger btn-sm deleteBtn"><i class="fa fa-trash" aria-hidden="true"></i></button>' +
                      '</div>';
                  }
                },
              ],
              "ordering": true,
              order: [],
            });

            $('#addTranskripBtn').on('click', function() {
              window.location = "<?= base_url('users'); ?>/create";
            });

            $('#myTable').on('click', '.updateBtn', function() {
              let id = $(this).data('id');
              window.location = "<?= base_url('users'); ?>/" + id + "/update";
            });

            $('#myTable').on('click', '.deleteBtn', function() {
              let id = $(this).data('id');
              if (confirm("Yakin ingin menghapus data #" + id)) {
                $.ajax({
                  url: "<?= base_url('users'); ?>/" + id + "/delete",
                  method: "POST",
                  success: function() {
                    myTable.ajax.reload();
                  }
                });
              }
            });
          });
        </script>
        <?= $this->endSection() ?>