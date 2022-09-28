<!DOCTYPE html>
<html lang="en">
<?php
    include "librarydb.php";
    $bookid=$_GET['id'];
    $getbookdetails = mysqli_query($con, "SELECT * FROM book WHERE Book_ID = '$bookid'")or die(mysqli_error($con));
    $details=mysqli_fetch_array($getbookdetails);
    $getBookID = $details['Book_ID'];
    $getBookName = $details['Book_Name'];
    $getBookAuthor = $details['Book_Author'];
    $getBookCategory = $details['Book_Category'];
    $getBookLanguage = $details['Book_Language'];
    $getBookCondition = $details['Book_Condition'];
    $getBookDescription = $details['Book_Description'];
    $getBookBorrowed = $details['Times_Borrowed'];
    session_start();
    $current_user=$_SESSION['current_id'];
?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin - Modify Book</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script>
                if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
                }
        </script>
        <style></style>
    </head>
    <body>
    <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <br>
                    <br>
                    <br>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-0">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-1">Modify</h3>
                                </div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="BookID" name="BookID" placeholder="Book ID" value="<?php echo $getBookID ?>" required />
                                                <label for="inputBookID">Book ID</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="BookName" name="BookName" placeholder="Book Name" value="<?php echo $getBookName ?>" required />
                                                <label for="inputBookName">Book Name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="BookAuthor" name="BookAuthor" placeholder="Book Author" value="<?php echo $getBookAuthor ?>"/>
                                                <label for="inputBookAuthor">Book Author</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="BookCategory" name="BookCategory" placeholder="Book Category" value="<?php echo $getBookCategory ?>" required />
                                                <label for="inputBookCategory">Book Category</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="BookCondition" name="BookCondition" placeholder="Book Condition" value="<?php echo $getBookCondition ?>" required />
                                                <label for="inputBookCondition">Book Condition</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="BookDescription" name="BookDescription" placeholder="Book Description" value="<?php echo $getBookDescription  ?>"/>
                                                <label for="inputBookDescription">Book Description</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="BookLanguage" name="BookLanguage" placeholder="Book Language" value="<?php echo $getBookLanguage ?>" required />
                                                <label for="inputBookLanguage">Book Language</label>
                                            </div>
                                            
                                            <div class="text-center">
                                                <input class="btn btn-success text-center" name="modifyNOW" type="submit" value="Modify"></input>
                                            </div>
                                        </form>
                                        <?php
                                        if(isset($_POST['modifyNOW'])){
                                            $modifiedid=$_POST['BookID'];
                                            $modifiedname=$_POST['BookName'];
                                            $modifiedauthor=$_POST['BookAuthor'];
                                            $modifiedcategory=$_POST['BookCategory'];
                                            $modifiedcondition=$_POST['BookCondition'];
                                            $modifieddescription=$_POST['BookDescription'];
                                            $modifiedlanguage=$_POST['BookLanguage'];
                                            if($current_user=='999'){
                                            if(isset($_POST['BookID'])&&(isset($_POST['BookName']))&&(isset($_POST['BookCategory']))&&(isset($_POST['BookCondition']))&&(isset($_POST['BookLanguage']))){
                                                $checkid = mysqli_query($con, "SELECT * FROM book WHERE Book_ID = $bookid");
                                                if(mysqli_fetch_assoc($checkid) != null){
                                                    $modifybook = mysqli_query($con, "UPDATE book SET Book_ID = '$modifiedid',Book_Name = '$modifiedname',Book_Author = '$modifiedauthor',Book_Category = '$modifiedcategory',Book_Condition = '$modifiedcondition',Book_Description = '$modifieddescription',Book_Language = '$modifiedlanguage' WHERE Book_ID=$bookid");
                                                    echo "<script>alert('Modify Book Successful!')</script>";
                                                    echo "<script> location.href='booklist.php'; </script>";
                                                }else{
                                                    echo "<script>alert('Book Not Found')</script>";
                                                    echo "<script> location.href='booklist.php'; </script>";
                                                }
                                                }
                                        }else{
                                            echo "<script>alert('This page is NOT FOR YOU!')</script>";
                                            echo "<script> location.href='index.php'; </script>";
                                        }
                                    }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Woon Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                                
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
