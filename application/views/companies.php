    <h2>Страница управления Авиакомпаниями</h2>  
    <table border='1'>
    <?php
        foreach($companies as $row){
            echo "<tr><td>{$row->id}</td><td>{$row->name}</td><td><input type='button' value='Удалить' onclick='removeAirlineFunc({$row->id})'></td></tr>";
        }
     ?>   
    </table>

    <form action='index.php'>
        <input type='hidden' name='route' value='default'>
        <input type='hidden' name='task' value='addAirline'>
        <input type='text' placeholder='Название' name='name'>
        <input type='submit' value='Добавить'>
    </form>

    <a href='http://kryvbas87.eu.pn/'>На главную</a>


    <script>
         function removeAirlineFunc($a){
            window.location.href = "index.php?route=default&task=removeAirline&airline_id="+$a;
        }
    </script>