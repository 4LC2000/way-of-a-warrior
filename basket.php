<?php
if (isset($_SESSION["cart"])) {
?>
    <br /><br /><br />
    <h2>Корзина</h2>
    <table>
        <tr>
            <th>Продукт</th>
            <th width="10px">&nbsp;</th>
            <th>Количество</th>
            <th width="10px">&nbsp;</th>
            <th>Цена</th>
            <th width="10px">&nbsp;</th>
        </tr>
        <?php
        $total = 0;
        foreach ($_SESSION["cart"] as $i) {
        ?>
            <tr>
                <td><?php echo ($products[$_SESSION["cart"][$i]]); ?></td>
                <td width="10px">&nbsp;</td>
                <td><?php echo ($_SESSION["quantity"][$i]); ?></td>
                <td width="10px">&nbsp;</td>
                <td><?php echo ($_SESSION["amounts"][$i]); ?></td>
                <td width="10px">&nbsp;</td>
                <td><a href="?delete=<?php echo ($i); ?>">Удалить с корзины</a></td>
            </tr>
        <?php
            $total = $total + $_SESSION["amounts"][$i];
        }
        $_SESSION["total"] = $total;
        ?>
        <tr>
            <td colspan="7">Total : <?php echo ($total); ?></td>
        </tr>
    </table>
<?php

}
?>