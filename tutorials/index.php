<?php 

    include("db_connect.php");

    $sql = 'SELECT title,ingridents,id FROM pizza ORDER BY current_at';
    //make query and get result
    $result = mysqli_query($conn,$sql);
   
    // fectch result in form array
    $pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    //free result from memory
    mysqli_free_result($result);
    // closing the connection to database
    mysqli_close($conn);
    // print_r($pizzas);
   //print_r(explode(',',$pizzas[0]['ingridents']));
?>
<html>
<?php
include("header.php");
?>
    <h4 class="center grey-text">Pizzas!</h4>

<div class="container">
    <div class="row">

        <?php foreach($pizzas as $pizza): ?>

            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <img src="pizzas.svg" class="pizza">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                        <ul>
                            <?php foreach(explode(',',$pizza['ingridents']) as $ing) : ?>
                            <li><?php echo $ing ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a class="brand-text" href="details.php?id=<?php echo $pizza['id']?>">more info</a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>

<?php
include("footer.php");
 ?>
 </html>