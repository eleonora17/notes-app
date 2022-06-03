<?php
    require './Models/Note.php';
?>

<head>
    <link rel="stylesheet" href="./styles/styles.css">
</head>

<body>

<div class="topbar">
    <div class="topbar-item1">
        <a href="index.php?action=showAll"><img class="logo" src="./styles/imgs/wlogo.png"></a>
    </div>
    <div class="topbar-item2">
        <h1>notes-app</h1>
    </div>
    <div class="topbar-item3">
        <form method="GET" action="index.php">
            <input type="hidden" name="action" value="showAll">
            <input type="text" name="searchbar" placeholder="Cerca note" class="searchbar">
        </form>   
    </div>
    <div class="topbar-item4">
        <button class="add-button"><a href="./index.php?action=add"><img class="addlogo" src="./styles/imgs/wadd.png"></a></button>
    </div>
    <div class="topbar-item5">
        <h1>Nuova nota</h1>
    </div>
</div>
<?php        
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
            case "edit":
                //header("Location: ./edit.php");
                require('./Views/edit.php'); 
                break;
        }
?>
</body>