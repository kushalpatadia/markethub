<?php
//Include database configuration file
$conn = mysqli_connect("localhost","root","","markethub");

if(isset($_POST["category_id"]) && !empty($_POST["category_id"])){
    //Get all state data
    $query = mysqli_query($conn,"SELECT * FROM tbl_menubar WHERE type='s' AND parent_id = ".$_POST['category_id']." ORDER BY menu ASC");
    
    //Count total number of rows
    $rowCount = mysqli_num_rows($query);
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select subcategory</option>';
        while($row = mysqli_fetch_assoc($query)){ 
            echo '<option value="'.$row['id'].'">'.$row['menu'].'</option>';
        }
    }else{
        echo '<option value="">subcategory not available</option>';
    }
}

if(isset($_POST["subcategory_id"]) && !empty($_POST["subcategory_id"])){
    //Get all city data
    $query = mysqli_query($conn,"SELECT * FROM tbl_menubar WHERE type='b' AND parent_id = ".$_POST['subcategory_id']." ORDER BY menu ASC");
    
    //Count total number of rows
    $rowCount = mysqli_num_rows($query);
    
    //Display cities list
    if($rowCount > 0){
        echo "<h3>Brand</h3>";
        while($row = mysqli_fetch_assoc($query)){ 
            echo "<input type='checkbox' name='brand[]' value='".$row['menu']."'>";
            echo "<label for='ch1'>".$row['menu']."</label><br>";
            // echo $option;
        }
    }else{
        echo '<option value="">brand not available</option>';
    }
}
?>