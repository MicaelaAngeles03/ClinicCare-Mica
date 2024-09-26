<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Dashboard';
    $_page = 'active';
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
                    require_once('../include/sidepanel.php')
                ?>



        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light">
                    <div class="row">
                        <div class="col-lg-10">
                        <h2 class="h3 brand-color pt-3 pb-2">Product Category</h2>
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
                                   
                                
                                    <div class="search-keyword col-12 flex-lg-grow-0 d-flex ms-auto">
                                        <div class="input-group">
                                            <input type="text" name="keyword" id="keyword" placeholder="Search for category name.." class="form-control">
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
                
                    <div class="row d-flex justify-content-center gap-0 my-3">
                        <div class="col-4">
                            <a href="../manage/manage.php" class="btn btn-primary w-61 pb-2 pt-1" id = "productBtn">Product</a>
                        </div>
                        <div class="col-4">
                            <a href="category.php" class="btn btn-secondary w-100" id = "categoryBtn">Category</a>
                        </div>                
                    </div>

                    <?php
                            $Category_array = array(
                                array(
                                    'cname' => 'Accessories',
                                    'num_pro' => '7',
                                    'description' => 'Different type of acc..',
                                    'action' => '<div class="d-flex align-items-center gap-2"> <button type="button" class="btn btn-info fw-bold fs-6"> <span class="fa fa-eye px-2"></span>View</button>
                                                                                               <button type="button" class="btn btn-success"><i class="fa fa-check" data-bs-toggle="modal" data-bs-target="#EditCategoryModal"></i>Edit</button>
                                                                                               <button type="button" class="btn btn-danger mr-2"><i class="fa fa-trash"></i>Delete</button></div>'

                                ),
                                array(
                                    'cname' => 'Contat Lenses',
                                    'num_pro' => '3',
                                    'description' => 'Eye Protection lens..',
                                    'action' => '<div class="d-flex align-items-center gap-2"> <button type="button" class="btn btn-info fw-bold fs-6"> <span class="fa fa-eye px-2"></span>View</button>
                                    <button type="button" class="btn btn-success"><i class="fa fa-check"></i>Edit</button>
                                    <button type="button" class="btn btn-danger mr-2"><i class="fa fa-trash"></i>Delete</button></div>'

                                ),
                                array(
                                    'cname' => 'Lenses',
                                    'num_pro' => '6',
                                    'description' => 'Frame lenses for..',
                                    'action' => '<div class="d-flex align-items-center gap-2"> <button type="button" class="btn btn-info fw-bold fs-6"> <span class="fa fa-eye px-2"></span>View</button>
                                                                                               <button type="button" class="btn btn-success"><i class="fa fa-check"></i>Edit</button>
                                                                                               <button type="button" class="btn btn-danger mr-2"><i class="fa fa-trash"></i>Delete</button></div>'

                                ),
                                array(
                                    'cname' => 'Eyeglasses Frame',
                                    'num_pro' => '4',
                                    'description' => 'Frame for eye glas..',
                                    'action' => '<div class="d-flex align-items-center gap-2"> <button type="button" class="btn btn-info fw-bold fs-6"> <span class="fa fa-eye px-2"></span>View</button>
                                                                                               <button type="button" class="btn btn-success"><i class="fa fa-check"></i>Edit</button>
                                                                                               <button type="button" class="btn btn-danger mr-2"><i class="fa fa-trash"></i>Delete</button></div>'

                                )
            
                            );
                        ?>
                        <table id="Category" class="table table-striped table-sm  ">
                            <thead>
                                <tr class = "">
                                    <th scope="col">#</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Products</th>
                                    <th scope="col">Description</th>
                                    <th scope="col" width="25.9%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $counter = 5;
                                    foreach ($Category_array as $item){
                                ?>
                                        <tr>
                                            <td><?= $counter ?></td>
                                            <td><?= $item['cname'] ?></td>
                                            <td><?= $item['num_pro'] ?></td>
                                            <td><?= $item['description'] ?></td>
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
                                <button class="btn btn-outline-secondary btn-add" type="button"><i class="fa fa-plus " aria-hidden="true" data-bs-toggle="modal" data-bs-target="#addCategoryModal"></i></button>
                                </div>
                    </div>
                </main>
            </div>
        </div>

</main>
        
            
    <?php
        require_once('../../include/js.php')
    ?>
    <script src="category.js"></script>
</body>
</html>