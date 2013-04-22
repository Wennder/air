                                
<form action="" method="GET" id="idForm">
    <input type="hidden" id="newId" value="<?php echo site_url('air/qwerty')?>">
    <select name="myIdVoyage">
<?php
//                                    страница выбора РЕЙСА для 1 задания
            foreach($voyageSelect as $row){
                echo "<option value='{$row->id}'>{$row->number}</option>";
            }
?>
    </select>
    <input type="submit" value="show" id="button">
    <p><a href="index.php">На главную</a></p>
</form>

<table>
    
</table>