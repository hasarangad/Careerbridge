<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=fo, initial-scale=1.0">
    <title>Company_details_S</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/company.css">
    <link rel="stylesheet" href="styleNavF.css">

<body>
    <!--Navigation bar-->
    <?php
        include ('navBar.php');
    ?>

<div class="rapper">
    <div class="main">
        <?php
            include ('php/connection.php');
            include ('php/com_element_S.php');

            $id = $_GET['id'];
            $sql ="SELECT * FROM company WHERE com_id={$id}";

            $result = mysqli_query($connection,$sql);
       
            if($row = mysqli_fetch_assoc($result)){
                Com_elements($row['company_logo'],$row['company_name'],$row['location'],$row['employe'],$row['industry'],$row['description']);
            }
    
        ?>
    </div>

    <div class="line1"></div>
    <div class="topic1">
        <h3>Jobs related to the company</h3>
    </div>
    <div class="posts">
        <?php
            include ('php/job_elem.php');

            $id = $_GET['id'];
            $sql ="SELECT * FROM job WHERE com_id={$id}";

            $result = mysqli_query($connection,$sql);

            if(mysqli_num_rows($result)>0){
                while($rows =mysqli_fetch_assoc($result)){
                    job_element($rows['job_id'],$rows['job_title'],$rows['company_name'],$rows['job_category'],$rows['job_location'],$rows['sort_description']);     
                }   
            }

            ?>
    </div>


    <div class="line2"></div>
    <div class="topic2">
        <h3>Reviews related to the company</h3>
    </div>

    <h5>Comments</h5>

    <div class="rapper1">
        <?php
            include ('php/reviwe_element.php');
    
            $id = $_GET['id'];
            $sql ="SELECT * FROM reviews WHERE com_id={$id}";

            $result = mysqli_query($connection,$sql);

            if(mysqli_num_rows($result)>0){
                while($rows =mysqli_fetch_assoc($result)){
                    review_elem($rows['user_name'],$rows['email'],$rows['comment']);     
                }   
            }
        ?>
    </div>
    <div class="line2"></div>

</div>

<!-- Footer -->
<?php
    include('footer.php');

?>

</body>

</html>

<?php
    mysqli_close($connection);
?>








