<h1>Выбор задания</h1>

<ul>
    <li><a href="/air/pass_to_voyage">все пассажиры, которые имеют билет на определенный рейс</a></li>
    <li><a href="index.php?task=voyage_to_airline">все рейсы определенной авиакомпании</a></li>
    <li><a href="index.php?task=airplane_to_airline">все самолеты определенной авиакомпании, что имеют количество мест более заданной</a></li>
    <li><a href="<?php echo site_url('air/airlineView');?>">Авиакомпании</a></li> <!--    пример, как добавить суфикс к url-->
    <li><a href="<?php echo site_url('air/airplaneView');?>">Самолеты</a></li>
    <li><a href="/air/voyageView">Рейсы</a></li>
    <li><a href="index.php?task=passenger">Пассажиры</a></li>
</ul>