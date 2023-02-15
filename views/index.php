<h1>
    Тестовое задание
</h1>
<h2>
    Таблица средней температуры за день
</h2>
<table>
    <tr>
        <th>
            День
        </th>
        <th>
            Средняя температура за день
        </th>
    </tr>
    <?php
        foreach ($data['averageTemperatureByDay'] as $key => $value)
        {
            include 'views/weather_table.php';
        }
    ?>
</table>
<h2>
    Таблица средней температуры за месяц
</h2>
<table>
    <tr>
        <th>
            Месяц
        </th>
        <th>
            Средняя температура за месяц
        </th>
    </tr>
    <?php
        foreach ($data['averageTemperatureByMonths'] as $key => $value)
        {
            include 'views/weather_table.php';
        }
    ?>
</table>
<h2>
    Таблица средней температуры за неделю
</h2>
<table>
    <tr>
        <th>
            Неделя
        </th>
        <th>
            Средняя температура за неделю
        </th>
    </tr>
    <?php
        foreach ($data['averageTemperatureByWeeks'] as $key => $value)
        {
            include 'views/weather_table.php';
        }
    ?>
</table>