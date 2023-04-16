<div class="wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title text-bold mt-3">Users DataTable</h2>
              <div class="row mb-2">
                <div class="col-sm-12">
                  <button class="btn btn-info bg-info float-right" data-toggle="modal" data-target="#addUserModal">
                    <i class="fas fa-plus mr-2"></i>Add New User
                  </button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <table id="user-table" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr class="text-center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Subscription Date</th>
                    <th>Assigned Group ID</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <?php foreach ($allUsers as $user) { ?>
                    <tr>
                      <td><?php echo $user['id']; ?></td>
                      <td><?php echo $user['user_name']; ?></td>
                      <td><?php echo $user['user_email']; ?></td>
                      <td><?php echo $user['user_mobile_number']; ?></td>
                      <td><?php echo $user['user_username']; ?></td>
                      <td><?php echo $user['user_password']; ?></td>
                      <td><?php echo $user['subscription_date']; ?></td>
                      <td><?php echo $user['group_id']; ?></td>
                      <td class="d-flex justify-content-around">
                        <a href="/user/edit?id=<?php echo $user['id']; ?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-edit"></i></a>
                        <form method="post" action="/user/delete?id=<?php echo $user['id']; ?>">
                          <button type="button" data-toggle="modal" data-target="#deleteModel" onclick="UserdeletemodalShow(event)" class="btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i> </button>
                          <input type="hidden" name="_method" value="DELETE">
                        </form>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <i class="bi bi-exclamation-triangle" style="color: #e74c3c;margin-right:5px;"></i>Warning</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5>Are You Sure to Delete this User?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" id="delete-user">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(function() {
    $("#user-table").DataTable({
      "responsive": true,
      "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
    }).buttons().container().appendTo('#user-table_wrapper .col-md-6:eq(0)');
  });

  function UserdeletemodalShow(event) {
    console.log("zaft");
    let deleteBtnModal = document.querySelector("#delete-user");
    deleteBtnModal.onclick = function() {
      event.target.closest("form").submit();
    }
  }
</script>