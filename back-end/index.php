<?php

    // traduco in un file json
    header('Content-Type: application/json');
    // serve per comunicare con un altro server
    header("Access-Control-Allow-Headers: X-Requested-With");
    //blocco le cross-policy indicando il server con il quale andiamo a comunicare
    header("Access-Control-Allow-Origin: http://localhost:5173");

    $todos = [
        [
            "text" => "Fare la spesa",
            "completed:" => false
        ],
        [
            "text" => "Chiamare il dottore",
            "completed:" => false
        ],
        [
            "text" => "Studiare per l'esame",
            "completed:" => false
        ],
        [
            "text" => "Far uscire il cane",
            "completed:" => true
        ],
    ];

    // Gestisco la creazione di un nuovo todo
    $newTodoText = $_POST['text'];
    $newTodo = [
        "text" => $newTodoText,
        "completed" => false
    ];
    
    // Aggiungo il nuovo todo all'array
    $todos[] = $newTodo;
   
    
    $jsonTodo = json_encode($todos);
    echo $jsonTodo;
    ?>