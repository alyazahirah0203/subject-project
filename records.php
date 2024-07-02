<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto:700&display=swap');

        .wrapper {
            width: 100%;
            height: 100vh;
        }

        .navbar {
            height: 75px;
            width: 100%;
            background: rgba(0, 0, 0, 0.4);
        }

        .logo {
            width: 140px;
            height: auto;
            padding: 20px 100px;
            margin-top: -50px;
            margin-left: -20px;
        }

        .navbar ul {
            float: right;
            margin-right: 20px;
        }

        .navbar ul li {
            list-style: none;
            margin: 0 8px;
            display: inline-block;
            line-height: 80px;
        }

        .navbar ul li a {
            font-size: 20px;
            font-family: 'Roboto', sans-serif;
            color: white;
            padding: 6px 13px;
            text-decoration: none;
            transition: .4s;
        }

        .navbar ul li a.active,
        .navbar ul li a:hover {
            background: red;
            border-radius: 2px;
        }

        .wrapper .center {
            position: absolute;
            left: 50%;
            top: 55%;
            transform: translate(-50%, -50%);
            font-family: sans-serif;
            user-select: none;
        }

        h1 {
            font-weight: 600;
            text-align: left;
            color: red;
            padding-top: 8px;
            margin-top: 80px;
            margin-left: 80px;
            font-family: 'Roboto', sans-serif;
        }
    </style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KK5 E-PARCEL</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <nav class="navbar">
            <img class="logo" src="logo2.png">
            <ul>
                <li><a href="homepage.php">Home</a></li>
                <li><a href="about1.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="insert.php">New Record</a></li>
                <li><a class="active" href="records.php">View Record</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1>Records</h1>

            <!-- DataTales Example -->
            <?php
            include 'dbconnection.php';

            // Update status if the form is submitted
            if (isset($_POST['update_status'])) {
                $pID = $_POST['pID'];
                $update_sql = "UPDATE parcels SET status = 2 WHERE pID = '$pID'";
                mysqli_query($conn, $update_sql);
            }

            // Delete record if the form is submitted
            if (isset($_POST['delete_record'])) {
                $pID = $_POST['pID'];
                $delete_sql = "DELETE FROM parcels WHERE pID = '$pID'";
                mysqli_query($conn, $delete_sql);
            }

            // SQL query to fetch data from both tables using JOIN
            $sql = "SELECT students.stdID, students.stdname, students.stdphone, students.stdmatric, parcels.pID, parcels.parcelnum, parcels.pdate, parcels.courier, parcels.rack, parcels.status
                    FROM students
                    JOIN parcels ON students.stdID = parcels.stdID";

            $result = mysqli_query($conn, $sql);

            // Check if there are results
            if ($result && mysqli_num_rows($result) > 0) {
                echo "<div class='card shadow mb-4'>
                        <div class='card-header py-3'>
                            <br>
                            <h6 class='m-0 font-weight-bold text-primary'>Parcel and Student Record</h6>
                        </div>
                        <div class='card-body'>
                            <div class='table-responsive'>
                                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                    <thead>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Student Phone</th>
                                            <th>Student Matric</th>
                                            <th>Parcel Number</th>
                                            <th>Arrival Date</th>
                                            <th>Courier</th>
                                            <th>Rack</th>
                                            <th>Status</th>
                                            <th>Update</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                // Fetch and display each row of data
                while ($row = mysqli_fetch_assoc($result)) {
                    $status = $row['status'] == 1 ? 'Incomplete' : 'Complete';
                    echo "<tr>
                            <td>{$row['stdname']}</td>
                            <td>{$row['stdphone']}</td>
                            <td>{$row['stdmatric']}</td>
                            <td>{$row['parcelnum']}</td>
                            <td>{$row['pdate']}</td>
                            <td>{$row['courier']}</td>
                            <td>{$row['rack']}</td>
                            <td>$status</td>
                            <td>";
                    if ($row['status'] == 1) {
                        echo "<form method='POST' action=''>
                                <input type='hidden' name='pID' value='{$row['pID']}'>
                                <button type='submit' name='update_status' class='btn btn-success'>Complete</button>
                              </form>";
                    } else {
                        echo "<form method='POST' action=''>
                                <input type='hidden' name='pID' value='{$row['pID']}'>
                                <button type='submit' name='delete_record' class='btn btn-danger'><i class='fas fa-trash-alt'></i></button>
                              </form>";
                    }
                    echo "</td>
                        </tr>";
                }
                echo "      </tbody>
                            </table>
                        </div>
                    </div>
                </div>";
            } else {
                echo "No records found.";
            }

            // Close database connection
            mysqli_close($conn);
            ?>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>
</html>
