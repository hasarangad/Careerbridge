<?php
    session_start();
    include 'dbh.inc.php';
    include './php/elements_S.php';
    
    if(!isset($_SESSION['uName'])){
        header('Location: login.php');
     }
     else{
         $uName = $_SESSION['uName'];
     }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View_companies_S</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styleNavF.css">

</head>

<body>
    <!-- Navigation -->
<?php
    include('navBarS.php');
?>

<!-- main body -->

<div class="rapper">

    <div class="section">

            <div class="main-caption">
                <h1>Find great places to work</h1>
            </div>
            <div class="sub-caption">
                <h3>Get access to millions of company Jobs</h3>
            </div>

    </div>

    <div class="search">

        <form action="view_companies_S.php" method="get">

            <div class="form">
                <div class="input">
                    <input type="text" name="search" placeholder="Enter campany name" autofocus>
                </div>

                <div class="btn">
                    <button type ="submit" name ="submit">Find Companies</button>
                </div>

            </div>

        </form>
        
    </div>

    <div class="line"></div>
    
    <div class="main">
        <?php
            //job search
            if(isset($_GET['search'])){
                $search = mysqli_real_escape_string($connection,$_GET['search']);
                $sql ="SELECT * FROM company WHERE (company_name LIKE '%{$search}%') ORDER BY company_name ";
            }
            else{
                $sql ="SELECT * FROM company";
            }
    
            $result = mysqli_query($connection,$sql);

            if(mysqli_num_rows($result)>0){
                while($rows =mysqli_fetch_assoc($result)){
                    //call php function
                    elements($rows['com_id'],$rows['company_logo'],$rows['company_name'],$rows['location'],$rows['employe'],$rows['industry'],$rows['description']);
                }   
            }
        ?>
    </div>
    
    <div class="line"></div>

    <div class="rate">
        <div class="rating">
            <div class="title">
                <strong>Rate your recent employer</strong>
            </div>
            <div class="star">
                <p>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </p>
            </div>
        </div>

        <div class="btn">
            <a href="feedback.php">
                <button>Add Reviwes</button>      
            </a>
        </div>
    </div>


</div>

<!--footer -->
    <?php
        include('footer.php');
    ?>
    

</body>
</html>
