<tr>
    <td>
        <?php
            echo($key)
        ?>
    </td>
    <td>
        <?php
            echo($value['average'])
        ?>
    </td>
    <td>
        <?php
            echo($value['movingAverage'] ?? '-')
        ?>
    </td>
</tr>