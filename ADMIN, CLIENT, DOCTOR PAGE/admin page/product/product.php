<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Dashboard';
    $manage_page = 'active';
    require_once('../../include/head.php');
?>
<body>
    <?php
        require_once('../../include/header.admin.php')
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <?php
                    $manage_page = 'active';
                    require_once('../include/sidepanel.php')
                ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light">
                    <div class="">
                        <div class="col-lg-10">
                        <h2 class="h3 brand-color pt-3 pb-2">Product</h2>
                        </div>
                   
                    <div class="col-lg-2 mt-3 visually-hidden">
                    <div id="MyButtons" class=" mb-md-2 col-12 col-md-auto"></div>
                </div>
             </div>
                
                    <div class="table-responsive overflow-hidden">            
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <div class="row border border-2">
                                <div class="row g-2 mb-2 m-0">
                                   
                                <div class="form-group col-12 col-sm-auto flex-sm-grow-1 flex-lg-grow-0 ms-lg-auto">
                                        <select name="employee-role" id="employee-role" class="form-select me-md-2">
                                            <option value="">All Category</option>
                                            <option value="Eye Glasses Frame">Eye Glasses Frame</option>
                                            <option value="Lenses">Lenses</option>
                                            <option value="Contact Lenses">Contact Lenses</option>
                                            <option value="Sunglasses">Sunglasses</option>
                                            <option value="Accessories">Accessories</option>
                                        </select>
                                    </div>

                                    <div class="search-keyword col-12 flex-lg-grow-0 d-flex">
                                        <div class="input-group">
                                            <input type="text" name="keyword" id="keyword" placeholder="Search for product name.." class="form-control">
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
                    <div class="row d-flex justify-content-center gap-0 my-3 ">
                        <div class="col-4">
                            <a href="../manage/manage.php" class="btn btn-primary w-61 pb-2 pt-1">Product</a>
                        </div>
                        <div class="col-4">
                            <a href="../category/category.php" class="btn btn-secondary w-100">Category</a>
                        </div>                
                    </div>


                    <?php
                            $employee_array = array(
                                array(
                                    'pname' => 'Progressive Lenses',
                                    'category' => 'Lenses',
                                    'price' => 'P359.00',
                                    'description' => 'Segmented lenses..',
                                    'picture' => 'img3.jpg',
                                    'action' => '<div class="d-flex align-items-center gap-2"> <button type="button" class="btn btn-info fw-bold fs-6"> <span class="fa fa-eye px-2"></span>View</button>
                                                                                               <button type="button" class="btn btn-success"><i class="fa fa-check" data-bs-toggle="modal" data-bs-target="#EditEmployeeModal"></i>Edit</button>
                                                                                               <button type="button" class="btn btn-danger mr-2"><i class="fa fa-trash"></i>Delete</button></div>'

                                ),
                                array(
                                    'pname' => 'Gabriel Lakinto',
                                    'category' => 'Lakinto@gmail.com',
                                    'price' => '11/4/1980',
                                    'description' => 'Talon-Talon, Zamboanga City',
                                    'picture' => 'Janitor',
                                    'action' => '<div class="d-flex align-items-center gap-2"> <button type="button" class="btn btn-info fw-bold fs-6"> <span class="fa fa-eye px-2"></span>View</button>
                                    <button type="button" class="btn btn-success"><i class="fa fa-check"></i>Edit</button>
                                    <button type="button" class="btn btn-danger mr-2"><i class="fa fa-trash"></i>Delete</button></div>'

                                ),
                                array(
                                    'pname' => 'Cases and Holder',
                                    'category' => 'Accessories',
                                    'price' => 'P150.00',
                                    'description' => 'Protective cases..',
                                    'picture' => 'img2.jpg',
                                    'action' => '<div class="d-flex align-items-center gap-2"> <button type="button" class="btn btn-info fw-bold fs-6"> <span class="fa fa-eye px-2"></span>View</button>
                                                                                               <button type="button" class="btn btn-success"><i class="fa fa-check"></i>Edit</button>
                                                                                               <button type="button" class="btn btn-danger mr-2"><i class="fa fa-trash"></i>Delete</button></div>'

                                ),
                                array(
                                    'pname' => 'Fashion Sunglasses',
                                    'category' => 'Sunglasses',
                                    'price' => 'P200.00',
                                    'description' => 'Stylish and trendy..',
                                    'picture' => 'img1.jpg',
                                    'action' => '<div class="d-flex align-items-center gap-2"> <button type="button" class="btn btn-info fw-bold fs-6"> <span class="fa fa-eye px-2"></span>View</button>
                                                                                               <button type="button" class="btn btn-success"><i class="fa fa-check"></i>Edit</button>
                                                                                               <button type="button" class="btn btn-danger mr-2"><i class="fa fa-trash"></i>Delete</button></div>'

                                )
            
                            );
                        ?>
                        <table id="employee" class="table table-striped table-sm  ">
                            <thead>
                                <tr class = "">
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Categroy</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Picture</th>
                                    <th scope="col" width="25.9%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $counter = 5;
                                    foreach ($employee_array as $item){
                                ?>
                                        <tr>
                                            <td><?= $counter ?></td>
                                            <td><?= $item['pname'] ?></td>
                                            <td><?= $item['category'] ?></td>
                                            <td><?= $item['price'] ?></td>
                                            <td><?= $item['description'] ?></td>
                                            <td><?= $item['picture'] ?></td>
                                            <td class = "text-center"><?= $item['action'] ?></td>
                                        </tr>
                                <?php
                                    $counter++;
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end align-items-end  mt-1">
                                <h3 style = "color: #0008BD" class = "pt-2">Add</h3>
                                <button class="btn btn-outline-secondary btn-add" type="button"><i class="fa fa-plus " aria-hidden="true" data-bs-toggle="modal" data-bs-target="#addProductModal"></i></button>
                                </div>
                    </div>
                </main>
            </div>
        </div>

</main>
        

<div class="modal fade modal-centered" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style = "max-width:440px;">
                <div class="modal-content p-3">
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="col text-center">
                    <h5 class = "pb-2 fw-bold text-primary">Add Product</h5>
                </div>
               




                <div class="row">
    
                

                <div class="col mt-2">
                <div class="col">
                <label for="exampleFormControlInput1" class="form-label  fw-bold mb-1">Product Name:</label>
                   <input type="email" class="form-control" id="exampleFormControlInput1">
                </div>

                <div class="col mt-1">
                    <label for="exampleFormControlSelect1" class="form-label fw-bold mb-1">Category:</label>
                    <select class="form-select" id="exampleFormControlSelect1">
                    <option value="eyeGlassesFrames">Chosse Category</option>
                        <option value="eyeGlassesFrames">Eye Glasses Frames</option>
                        <option value="lenses">Lenses</option>
                        <option value="contactLenses">Contact Lenses</option>
                        <option value="sunglasses">Sunglasses</option>
                        <option value="accessories">Accessories</option>
                    </select>
                </div>


                <div class="col mt-1">
                <label for="exampleFormControlInput1" class="form-label  fw-bold mb-1">Price:</label>
                   <input type="email" class="form-control" id="exampleFormControlInput1">
                </div>

                
                <div class="col mt-1">
                <label for="exampleFormControlInput1" class="form-label  fw-bold mb-1">Description:</label>
                   <input type="email" class="form-control" id="exampleFormControlInput1">
                </div>

                <div class="col mt-1">
                <label for="exampleFormControlInput1" class="form-label  fw-bold mb-1">Picture:</label>
                   <input type="file" class="form-control" id="exampleFormControlInput1">
                </div>

            


            <div class="col text-center pt-3 mt-2">
            <button type="button" class="btn btn-primary w-100 pb-2 fs-5 fw-bold"  style = "height:40px;">Add Product</button>
            </div>      
                </div>
                </div>
            </div>
        </div>
        
    
            
    <?php
        require_once('../../include/js.php')
    ?>
    <script src="product.js"></script>
</body>
</html>