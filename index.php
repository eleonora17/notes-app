<?php
    require './Models/Note.php';
    //
    if (!$_GET) 
    {

?>
    <!-- form contenente il main menu -->
    <form method = "GET" action = "index.php">
        <label for="showAll"> Show all </label>
        <input type="radio" name="action" id = "showAll" value = "showAll"> <br>
        <label for="showOne"> Show one </label>
        <input type="radio" name="action" id = "showOne" value = "showOne"> <br>
        <label for="add"> Add </label>
        <input type="radio" name="action" id = "add" value = "add"> <br>
        <label for="delete"> Delete </label>
        <input type="radio" name="action" id = "delete" value = "delete"> <br>
        <label for="modify"> Modify </label>
        <input type="radio" name="action" id = "modify" value = "modify"> <br>
        <input type="submit">
    </form>

<?php
    }
    else
    {
        //switch per il redirect alle varie pagine con le funzioni del menu
        //VALUTARE SE USARE REQUIRE O HEADER
        switch ($_GET["action"])
        {
            case "showAll":
                //header("Location: ./showAll.php");
                require('./Views/showAll.php'); 
                break;
            case "showOne": 
                //header("Location: ./show.php");   
                require('./Views/showOne.php');                   
                break;
            case "add":
                //header("Location: ./Views/add.php");
                require('./Views/add.php'); 
                break;
            case "delete":
                //header("Location: ./delete.php");
                require('./Views/delete.php'); 
                break;
            case "modify":
                //header("Location: ./modify.php");
                require('./Views/modify.php'); 
                break;
        }
    }
?>