    <h2>Страница управления Авиакомпаниями</h2>  
    <table border='1'>
        <tr><th>Id</th><th>Название</th><th>Действие</th></tr> 
    <?php
        foreach($airlineView as $row){
            echo "<tr><td>{$row->id}</td><td>{$row->name}</td><td><input type='button' value='Удалить' onclick='removeAirlineFunc({$row->id})'></td></tr>";
        }
     ?>   
    </table>

    <form action='<?php echo site_url('air/addAirline');?>'>
        <input type='text' placeholder='Название' name='name'>
        <input type='submit' value='Добавить'>
    </form>

    <a href='http://kryvbas87.eu.pn/'>На главную</a>


    <script>
         function removeAirlineFunc($a){
            window.location.href = "/air/removeAirline/"+$a;
        }
    </script>