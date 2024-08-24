<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Application</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1 id="main_title" class="text-center my-4">CRUD APPLICATION</h1>
  <div class="container">

    <?php include('connection.php')  ?>

    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2>Students Details</h2>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
        ADD STUDENT
      </button>
    </div>

    <table class="table table-hover table-bordered table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Class</th>
          <th>Phone no.</th>
          <th>E-mail</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $query = "SELECT * FROM `crud_student_details`";
        $result = mysqli_query($conn, $query);

        if (!$result) {
          die("failed" . mysqli_error($conn));
        } else {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <tr>
              <td><?php echo $row['id']; ?> </td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['class']; ?></td>
              <td><?php echo $row['phone_number']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td>
                <a href="edit_student.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete_student.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
            </tr>

        <?php
          }
        }
        ?>
      </tbody>
    </table>

    <!-- Modal -->

    <form action="add_student.php" method="POST">
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Add Student</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-group mb-3">
                <label for="id">ID</label>
                <input type="number" class="form-control" id="id" name="id" required>
              </div>
              <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="form-group mb-3">
                <label for="class">Class</label>
                <input type="text" class="form-control" id="class" name="class" required>
              </div>
              <div class="form-group mb-3">
                <label for="phone">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
              </div>
              <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" name="submit">ADD</button>
            </div>
          </div>
        </div>
      </div>
    </form>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
