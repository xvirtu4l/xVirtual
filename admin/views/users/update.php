<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Update
            </h6>
        </div>
        <div class="card-body">

            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['errors'])) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($_SESSION['errors'] as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php unset($_SESSION['errors']); ?>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3 mt-3">
                        <label for="user" class="form-label">User:</label>
                        <input type="text" class="form-control" id="user" value="<?= $user['user'] ?>" placeholder="Enter name" name="user">
                      </div>
                      <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" value="<?= $user['email'] ?>" placeholder="Enter email" name="email">
                      </div>
                      <div class="mb-3 mt-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="text" class="form-control" id="pass" value="<?= $user['pass'] ?>" placeholder="Enter password" name="password">
                      </div>


                    </div>
                    <div class="col-md-6">
                      <div class="mb-3 mt-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="address" value="<?= $user['address'] ?>" placeholder="Enter name" name="address">
                      </div>
                      <div class="mb-3 mt-3">
                        <label for="tel" class="form-label">Telephone:</label>
                        <input type="text" class="form-control" id="tel" value="<?= $user['tel'] ?>" placeholder="Enter name" name="tel">
                      </div>

                        <div class="mb-3 mt-3">
                            <label for="role" class="form-label">Role:</label>
                            <select name="role" id="role" class="form-control">
                                <option <?= $user['role'] == 1 ? 'selected' : null ?> value="1">Admin</option>
                                <option <?= $user['role'] == 0 ? 'selected' : null ?> value="0">Member</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= BASE_URL_ADMIN ?>?act=users" class="btn btn-danger">Back to list</a>
            </form>
        </div>
    </div>
</div>