<?php
include_once "includes/header.php";


// Alla delar som skall in i Table.
$allDogs = getFile("db.json")["dogs"];
$links = [
    'name'=>[
        'page'=>'/show', 
        'param'=>'id'
    ], 
    'breed'=>[
        'page'=>'/list', 
        'param'=>'breed'
        ]
    ];
$headers = ['name', 'breed', 'age', 'notes', 'owner'];

// Kollar om det finns en breed eller inte.
if( isset($_GET['breed']) ){
    if($_GET['breed']){
        $breed = URLToParam($_GET['breed']);
        $allDogs = filterData($allDogs, "breed", $breed );
        $info = "<span class='alert'>Filtered by $breed || <a href='/list.php'>Show all doggos</a></span>";
    }
}

?>
<section>
    <h1>Doggos</h1>
    <?php
        if(isset($_GET['breed'])) echo $info;
     echo createTable($allDogs, $headers, $links, false) ?>
</section>
<?php
include_once "includes/footer.php";
?>