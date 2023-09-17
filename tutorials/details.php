<?php
 
 include("db_connect.php");
    // to check if id prameter is set or not
if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);
    $sql = "DELETE FROM pizza WHERE id = $id_to_delete";
    if(mysqli_query($conn,$sql)){
        header('Location:index.php');
    }else{
        echo error.mysqli_error();
    }

}



 if(isset($_GET['id'])){
    
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    echo $id;
    $sql = "SELECT * FROM pizza WHERE id = $id";
    // make query
    $result = mysqli_query($conn,$sql);
    // to fetch the result
    $pizza = mysqli_fetch_assoc($result);
   
    mysqli_free_result($result);
    mysqli_close($conn);


 }

?>
<!DOCTYPE html>
<html>
<?php
include("header.php");
?>

<div class="container center">
    <?php if($pizza) : ?>
    <h4>
        <?php echo htmlspecialchars($pizza['title']); ?>

    </h4>
    <p>created by <?php echo htmlspecialchars($pizza['email'])?></p>
    <p><?php echo date($pizza['current_at']) ?></p>
    <h5>ingridents</h5>
    <p><?php  echo htmlspecialchars($pizza['ingridents'])?></p>
    
    
    <form action="details.php" method="POST">
        <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
        <input type="submit" name ="delete" value="Delete" class = "btn brand z-depth-0">   
    </form>


    <?php else : ?>
        <h5>No such pizza</h5>
    <?php endif ?>
</div>


<?php
include("footer.php");
?>
</html>