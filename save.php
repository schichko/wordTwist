<?php
    
    function findSubstrings() {
        echo ("HELLO");
    }
    
    //this is the basic way of getting a database handler from PDO, PHP's built in quasi-ORM
    $dbhandle = new PDO("sqlite:scrabble.sqlite") or die("Failed to open DB");
    if (!$dbhandle) die ($error);
 

    $rack = "ABILOTU";
    echo("Rack for this problem: $rack \n");
    $sizeOfRack = strlen($rack);
    $count = 0;
    $newVar= array();
    while($count <= $sizeOfRack) {
        echo "The number is: $count \n";

        $substring = substr($rack, 0,$count);
        
        echo "The String rack is: $substring \n";
        
        $query = "SELECT words FROM racks WHERE rack = \"$substring\"";
        
        $statement = $dbhandle->prepare($query);
        echo("QUERY DONE, CHEKCING STATEMENT\n");
    
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        header('HTTP/1.1 200 OK');
        header('Content-Type: application/json');

        echo json_encode($results);
        
        echo ("\n\n");
        findSubstrings();
    
        if(json_encode($results) == "[]"){
            echo("Empty arr\n\n\n");
        }
        else{
            array_push($newVar,json_encode($results));
        }
        print_r ($newVar);
        
        $count++;
    }
    print_r(array_filter($newVar));
    
    
?>