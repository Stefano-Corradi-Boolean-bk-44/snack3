<?php
/*
Attraverso un parametro GET da inserire direttamente nell’url (uno alla volta), filtrare gli hotel che hanno un parcheggio, numero minimo di stelle o massima lontananza dal centro.
Se non c’è un filtro, visualizzare tutti gli hotel

*/
?>

<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

$filteredHotels = [];

if(isset($_GET['parking'])){
    // se ho inserito in GET parking filtro l'array hotels solo se parking == true
    foreach($hotels as $hotel){
        if($hotel['parking']){
            $filteredHotels[] = $hotel;
        }
    }
}elseif(isset($_GET['vote'])){
    // se ho inserito in GET vote filtrare solo gli hotel con voto uguale o superiore
    foreach($hotels as $hotel){
        if($hotel['vote'] >= $_GET['vote']){
            $filteredHotels[] = $hotel;
        }
    }
}elseif(isset($_GET['distance_to_center'])){
    // se ho inserito in GET distance_to_center filtrare solo gli hotel con distance_to_center <= al valore passato
    foreach($hotels as $hotel){
        if($hotel['distance_to_center'] <= $_GET['distance_to_center']){
            $filteredHotels[] = $hotel;
        }
    }
}else{
    // se nessuna condizione è vera stampo tutti gli hotel
    $filteredHotels = $hotels;
}



?>

<ul>

    <?php foreach ($filteredHotels as $hotel) { ?>
        <li>
            <?php echo $hotel['name']; ?> 
            <ul>
                <li><strong>Descrizione:</strong><?php echo $hotel['description']; ?></li>
                <li>
                    <strong>Parcheggio:</strong>
                    <?php echo ($hotel['parking']) ? 'Sì' : 'No'; ?>
                </li>
                <li><strong>Stelle:</strong><?php echo $hotel['vote']; ?> Stelle</li>
                <li><strong>Distanza dal centro:</strong><?php echo $hotel['distance_to_center']; ?> km</li>
            </ul>
        </li>
    <?php } ?>

</ul>