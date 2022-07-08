
<?php 

include "dinamik_admin/admin_header.php"; 
?>

<div id="wrapper">

    <?php include "dinamik_admin/admin_sidebar.php"; ?>

    
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Categories</a>
            </li>
            <li class="breadcrumb-item active">Welcome to Admin Page: <small style="color:tomato;"><?php echo $_SESSION["username"]; ?></small></li>
          </ol>
        <hr>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>KATEGORİ ADI</th>
                    <th>EKLE - GÜNCELLE - SİL</th>
                </tr>
            </thead>
            <tbody>
            <?php

                if(isset($_POST["add_category"])){
                    $kategori_adi = $_POST["category_name"];
                    if($kategori_adi == " " || empty($kategori_adi)){
                        echo "
                        <div class='alert alert-danger' role='alert'>Boş geçilmez bir alandır!</div>
                        ";
                    }
                    else {
                        $sql_sorgu1 = "INSERT INTO categories(category_name) VALUE ('$kategori_adi')";
                        $yeni_kategori_ekle = mysqli_query($conn, $sql_sorgu1);
                        
                        echo "
                        <div class='alert alert-success' role='alert'>Ekleme işlemi Başarılıdır!</div>
                        ";
                        header("Location: categories.php");
                        
                    }

                }

            ?>



            <?php
                if(isset($_GET["delete"])){
                    $kategori_sil_id = $_GET["delete"];
                    $sql_sorgu3 = "DELETE FROM categories WHERE category_id={$kategori_sil_id}";
                    $kat_sil_sorgu = mysqli_query($conn, $sql_sorgu3);
                    header("Location: categories.php");
                }
            ?>





            <?php 
                if(isset($_POST["edit_category"])){
                    $kat_ad_sor = $_POST["category_namex"];

                    $sql_sorgu4 = "UPDATE  categories SET category_name ='$kat_ad_sor' WHERE category_id = '$_POST[category_id]'";
                    $guncel_kat_sorgu = mysqli_query($conn, $sql_sorgu4);
                    header("Location: categories.php");
                }
            ?>




            <?php
                $sql_sorgu2 = "SELECT * FROM categories ORDER BY category_id DESC";
                $butun_kategori = mysqli_query($conn, $sql_sorgu2);
                $k = 1;
                while ($satir = mysqli_fetch_assoc($butun_kategori)){

                    $kategori_id = $satir["category_id"];
                    $kategori_adi = $satir["category_name"];
                    echo"
                    <tr>
                        <td>{$kategori_id}</td>
                        <td>{$kategori_adi}</td>
                        <td>
                            <div class='dropdown'>
                                <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    Actions
                                </button>
                                <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                    <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$k' href='#'>Edit</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='categories.php?delete={$kategori_id}'>Delete</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' data-toggle='modal' data-target='#add_modal'>Add</a>
                                </div>
                            </div>
                        </td>
                    </tr>";

            ?>
                <div id="edit_modal<?php echo $k; ?>" class="modal fade">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="form-group">

                                        <input value="<?php if(isset($kategori_adi)) {echo $kategori_adi;} ?>" 
                                        type="text" class="form-control" name="category_namex">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="category_id" 
                                        value="<?php echo $satir["category_id"]; ?>">
                                        <input type="submit" class="btn btn-primary" name="edit_category" value="Edit Category">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $k++;} ?>
            </tbody>
        </table>

        <div id="add_modal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="category_name">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="add_category" value="Add Category">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        


<?php include "dinamik_admin/admin_footer.php"; ?>