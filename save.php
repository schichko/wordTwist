<?php
  
    
    //this is the basic way of getting a database handler from PDO, PHP's built in quasi-ORM
    $dbhandle = new PDO("sqlite:scrabble.sqlite") or die("Failed to open DB");
    if (!$dbhandle) die ($error);
 
     $count = 1;
    $binaryVar = decbin($count);
    
    echo $binaryVar."\n";
    echo "\n";
    echo var_dump($binaryVar);
    
    echo strrev($binaryVar);
    
    $rack = "ABILOTU";
    echo '<script>console.log("Your stuff here")</script>';
  //  console.log("Rack for this problem: $rack \n");
    $sizeOfRack = strlen($rack);
    
    $newVar= array();
    $outerCount = 0;
    
    while(strlen($binaryVar) < $sizeOfRack + 1){
        $binaryVar = decbin($count);
        $binaryVar = strrev($binaryVar);
        echo("Count: ".$count." Binary val: ".$binaryVar."\n");
        $count ++;
        /*if(binary var length is greater dont add it ){
            
        }
        else{
            
        }*/
        $bigBoy = "";
        for ($x = 0; $x < strlen($binaryVar); $x++) {
            echo("INSIDE"."\n");
            echo($binaryVar[$x]);
            if($binaryVar[$x] == "1" ){
                //echo "GOOD".$rack[$x]."\n";
                $bigBoy = $bigBoy.$rack[$x];
            }
           
        }
        echo "Final".$bigBoy;
        $query = "SELECT words FROM racks WHERE rack = \"$bigBoy\"";
        $statement = $dbhandle->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        header('HTTP/1.1 200 OK');
        header('Content-Type: application/json');
        echo json_encode($results);
        if(json_encode($results) == "[]"){
           echo("Empty arr\n\n\n");
        }
        else{
            array_push($newVar,json_encode($results));
        }
        
    }
    
    print_r(array_filter($newVar));
    echo json_encode($newVar);
?>
