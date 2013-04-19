    <h2>Страница управления Рейсами</h2>                              
    <table border='1'>
    <?php
        foreach($voyageView as $row){
            echo "<tr><td>{$row->id}</td><td>{$row->date}</td><td>{$row->time}</td><td>{$row->destination}</td><td>{$row->number}</td><td><input type='button' value='Отменить' onclick='removeVoyageFunc({$row->id})'></td></tr>";
        }
    ?>
    </table>
   
    <form action='index.php'>
        <input type='hidden' name='route' value='default'>
        <input type='hidden' name='task' value='addVoyage'>
        <input type='text' placeholder='Дата рейса' name='date'>
        <input type='text' placeholder='Время рейса' name='time'>
        <input type='text' placeholder='Место назначения' name='destination'>
        <input type='text' placeholder='Номер рейса' name='number'>
        <input type='submit' value='Добавить'>
    </form>
                                        
    <a href="http://kryvbas87.eu.pn/">На главную</a>
    
    <script>
         function removeVoyageFunc($a){
            window.location.href = "index.php?route=default&task=removeVoyage&voyage_id="+$a;
        }
    </script>