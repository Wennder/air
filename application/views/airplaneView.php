    <h2>Страница управления Самолетами</h2>  
    <table border='1'>
        <tr><th>Id</th><th>Модель</th><th>Мест</th><th>Принадлежит авиакомпании</th><th>Действие</th></tr> 
    <?php
        foreach($airplane as $row){
            echo "<tr><td>{$row->id}</td><td>{$row->type}</td><td>{$row->seats}</td><td>{$row->name}</td><td><input type='button' value='Удалить' onclick='removeAirplane({$row->id},this)'></td></tr>"; 
        }
     ?>   
        
    </table>
    
    <input type="hidden" id="add_airplane_path" value="<?php echo site_url('air/addAirplaneAjax')?>">
    <input type="hidden" id="remove_airplane_path" value="<?php echo site_url('air/removeAirplaneAjax')?>">
    
    <form action='<?php echo site_url('air/addAirplane');?>' id="airplanesForm">
        <input type='text' placeholder='Тип самолета' name='type'>
        <input type='text' placeholder='Количество мест' name='seats'>
        <select name="myIdAirplane">
                <?php
                    foreach($airline as $row){
                        echo "<option value='{$row->id}'>{$row->name}</option>";
                    }
                ?>
        </select>
        <input type='submit' value='Добавить' id="addMyAirplane">
    </form>

    <a href='http://kryvbas87.eu.pn/'>На главную</a>


    <script>
         function removeAirplaneFunc($a){
            window.location.href = "/air/removeAirplane/"+$a;
        }
    </script> 