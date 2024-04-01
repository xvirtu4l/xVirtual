<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
              Chi tiết
            </h6>
        </div>
        <div class="card-body">
            <table class="table">

                <tr>
                  <td>ID</td>
                  <td><?= $user['id'] ?></td>
                </tr>
              <tr>
                <td>Email</td>
                <td><?= $user['email'] ?></td>
              </tr>
              <tr>
                <td>Adress</td>
                <td><?= $user['address'] ?></td>
              </tr>
              <tr>
                <td>Telephone</td>
                <td><?= $user['tel'] ?></td>
              </tr>
              <tr>
                <td>Role</td>
                <td><?php
                    if ($user['role'] == 1) {
                      echo 'Admin';
                    } else {
                      echo 'Member';
                    }
                    ?></td>
              </tr>

            </table>

            <a href="<?= BASE_URL_ADMIN ?>?act=users" class="btn btn-danger">Back to list</a>
        </div>
    </div>
</div>