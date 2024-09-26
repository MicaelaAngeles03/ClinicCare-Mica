<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajax crud 01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
</head>

<?php
    $title = 'Doctor';
    require_once('../../include/head.php');
?>
<body>
    <?php
        require_once('../../include/header.admin.php');
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
            <?php
                $doctor_page = 'active';
                require_once('../include/sidepanel.php');
            ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light">
                    <div class="row">
                        <div class="col-lg-10">
                        <h2 class="h3 brand-color pt-3 pb-2">Doctor</h2>
                        </div>
                   
                    <div class="col-lg-2 mt-3 d-flex ml-0" >
                    <div id="MyButtons" class=" mb-md-2 col-12 col-md-auto mt-2"></div>
                </div>
             </div>
                
                    <div class="table-responsive overflow-hidden">            
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <div class="row border border-2">
                                <div class="row g-2 mb-2 m-0">
                                   
                                
                                    <div class="search-keyword col-12 flex-lg-grow-0 d-flex ms-auto">
                                        <div class="input-group">
                                            <input type="text" name="keyword" id="keyword" placeholder="Search for doctor.." class="form-control">
                                            <button class="btn btn-outline-secondary brand-bg-color" type="button"><i class="fa fa-search color-white" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-0 m-6">
                            <button type="button" class="btn btn-primary p-2 fs-3 ">Filter</button>
                        </div>
                    </div>

<div class="modal fade" id="doctorAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bolder brand-color" id="exampleModalLabel">Add doctor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Created form -->
                <form id="savedoctor"  enctype="multipart/form-data">
                    <div class="modal-body">

                        <div id="errorMessage" class="alert alert-warning d-none"></div>

                        <div class="row">
                        <div class="col-4 mb-3">
                            <label for="firstname" class="form-label fw-bold mb-1">First Name:</label>
                            <input type="text" class="form-control" name="firstname" required>
                        </div>

                        <div class="col-4 mb-3">
                            <label for="middlename"  class="form-label  fw-bold mb-1">M.N<span class = "fst-italic text-secondary fw-lighter">(Optional)</span>:</label>
                            <input type="text" class="form-control" name="middlename" >
                        </div>

                        <div class="col-4 mb-3">
                            <label for="lastname" class="form-label  fw-bold mb-1">Last Name:</label>
                            <input type="lastname" class="form-control" name="lastname" required>
                        </div>
                        </div>

                        <div class="mb-3">
                            <label for="birthdate" class="form-label  fw-bold mb-1">BirthDate:</label>
                            <input type="date" class="form-control" name="birthdate" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label  fw-bold mb-1">Email:</label>
                            <input type="email" class="form-control" name="email" required >
                        </div>

                        <div class="mb-3">
                            <label for="contact_number" class="form-label  fw-bold mb-1">Contact Number:</label>
                            <input type="number" class="form-control" name="contact_number" required>
                        </div>

                    

                        <div class="mb-3">
                            <label class="form-label fw-bold mb-1" >Gender:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="Male" id="maleRadio">
                                <label class="form-check-label" for="maleRadio">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="Female" id="femaleRadio">
                                <label class="form-check-label" for="femaleRadio">Female</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label  fw-bold mb-1">Address:</label>
                            <input type="text" class="form-control" name="address" required >
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold mb-1">Description:</label>
                            <input type="text" name="description" id="description" class="form-control" required />
                        </div>

                        <div class="mb-3">
                            <label for="picture" class="form-label  fw-bold mb-1">Picture<span class = "fst-italic text-secondary fw-lighter">(Optional)</span>:</label>
                            <input type="file" class="form-control" name="picture" accept=".jpg, .jpeg, .png" id = "picture">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label fw-bold mb-1">Password:</label>
                            <input type="text" name="password" id="pasword" class="form-control" required />
                        </div>  
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style = "height:2.3em; width: 6em;">Save doctor</button>
                    </div>
                </form>

                <!-- End of the form -->

            </div>
        </div>
    </div>




      <!-- Edit doctor Modal -->
      <div class="modal fade" id="doctorEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  brand-color fw-bolder" id="exampleModalLabel">Edit Doctor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updatedoctor" enctype="multipart/form-data" >
                    <div class="modal-body">

                        <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                        <input type="hidden" name="doctor_id" id="doctor_id">
                         <div class="row">
                         <div class="col-4 mb-3">
                            <label for="" class="form-label fw-bold mb-1">First Name:</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" required  />
                        </div>
                        <div class="col-4 mb-3">
                            <label for="" class="form-label  fw-bold mb-1">M.N<span class = "fst-italic text-secondary fw-lighter">(Optional)</span>:</label>
                            <input type="text" name="middlename" id="middlename" class="form-control" />
                        </div>
                        <div class="col-4 mb-3">
                            <label for="" class="form-label fw-bold mb-1">Last Name:</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" required  />
                        </div>
                         </div>

                         <div class="mb-3">
                            <label for="" class="form-label fw-bold mb-1">Birthdate:</label>
                            <input type="date" name="birthdate" id="birthdate" class="form-control" required />
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label fw-bold mb-1">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" required />
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label fw-bold mb-1">Contact Number:</label>
                            <input type="number" name="contact_number" id="contact_number" class="form-control" required />
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold mb-1" >Gender:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="Male" id="maleRadio">
                                <label class="form-check-label" for="maleRadio">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="Female" id="femaleRadio">
                                <label class="form-check-label" for="femaleRadio">Female</label>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="" class="form-label fw-bold mb-1">Address:</label>
                            <input type="text" name="address" id="address" class="form-control" />
                        </div>

                        
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold mb-1">Description:</label>
                            <input type="text" name="description" id="description" class="form-control" />
                        </div>
                        
                        <div class="mb-3">
                            <label for="picture"  class="form-label  fw-bold mb-1">Picture<span class = "fst-italic text-secondary fw-lighter">(Optional)</span>:</label>
                            <div class="input-group">
                                <input type="file" name="picture" id="picture" class="form-control" placeholder = "">
                                <input type="text" class="form-control" id="pictureText" readonly>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold mb-1">Password:</label>
                            <input type="text" name="password" id="password" class="form-control" required />
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Update doctor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View doctor Modal -->
    <div class="modal fade" id="doctorViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title brand-color fw-bolder" id="exampleModalLabel">View doctor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" class="form-control">

                <div class="mb-3 text-center" style = "border-radius:50%;">
                    <img id="view_picture" alt="doctor Picture">
                </div>

                <div class="mb-3">
                    <p id="view_fullname" ></p>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label  fw-bold mb-1">Birthdate:</label>
                    <p id="view_birthdate" class="form-control"></p>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label  fw-bold mb-1">Email:</label>
                    <p id="view_email" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label  fw-bold mb-1">Contact Number:</label>
                    <p id="view_contact_number" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label  fw-bold mb-1">Gender:</label>
                    <p id="view_gender" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label  fw-bold mb-1">Address:</label>
                    <p id="view_address" class="form-control"></p>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label  fw-bold mb-1">description:</label>
                    <p id="view_description" class="form-control"></p>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label  fw-bold mb-1">Password:</label>
                    <p id="view_password" class="form-control"></p>
                </div>
               
               

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>




                <?php
                require '../../classes/database.php';

                $query = 'SELECT * FROM doctor';
                $query_run = mysqli_query($con, $query);
                ?>

                <!-- Iterate through doctor data and generate modals -->
                <?php while ($doctor = mysqli_fetch_assoc($query_run)) { ?>
                    <div class="modal fade" id="deleteSchedModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Deletion</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body fs-5">
                                    Are you sure you want to delete?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" value="<?= $doctor['id'] ?>" class="deletedoctorBtn btn btn-primary px-3">Yes</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
    
                        
                <div class="card-body">
    <table id="doctor" class="table table-primary table-striped" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th width="20%">Doctor's Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Gender</th>
                <th width="23%" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require '../../classes/database.php';

            $query = 'SELECT * FROM doctor';
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
                $counter = 1;
                foreach ($query_run as $doctor) {
                    ?>
                    <tr>
                        <td><?= $counter ?></td>
                        <td><?= $doctor['firstname'] . ' ' . $doctor['middlename'] . ' ' . $doctor['lastname'] ?></td>
                        <td><?= $doctor['email'] ?></td>
                        <td><?= $doctor['address'] ?></td>
                        <td><?= $doctor['gender'] ?></td>
                        <td>
                            <button type="button" value="<?= $doctor['id'] ?>" class="viewdoctorBtn btn btn-info">View</button>
                            <button type="button" value="<?= $doctor['id'] ?>" class="editdoctorBtn btn btn-warning">Edit</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSchedModal">Delete</button>
                        </td>
                    </tr>
                    <?php
                    $counter++;
                }
            }
            ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-end align-items-end mt-1">
        <h3 style="color: #0008BD" class="pt-2">Add</h3>
        <button class="btn btn-outline-secondary btn-add" type="button" data-bs-toggle="modal" data-bs-target="#doctorAddModal">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
    </div>
</div>

                    </div>
                </main>
            </div>
        </div>
    </main>
    <?php
        require_once('../../include/js.php');
    ?>
    <script src="doctor.js"></script>
  
</body>
</html>