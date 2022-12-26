<?php session_start();


$products = array();
$amounts = array();


define('ROOT_PATH', dirname(__FILE__));
$data = fopen(ROOT_PATH . DIRECTORY_SEPARATOR . "files" . DIRECTORY_SEPARATOR . "cardList.txt", "a+") or die("failed to open file");
$cards = [];
while (!feof($data)) {
    array_push($cards, fgets($data));
}
foreach ($cards as $key => $value) {
    $array = explode(" ", $value);
    array_push($products, $array[0]);
    array_push($amounts, $array[1]);
}

if (!isset($_SESSION["total"])) {
    $_SESSION["total"] = 0;
    for ($i = 0; $i < count($products); $i++) {
        $_SESSION["quantity"][$i] = 0;
        $_SESSION["amounts"][$i] = 0;
    }
}

//---------------------------
//Сброс
if (isset($_GET['reset'])) {
    if ($_GET["reset"] == 'true') {
        unset($_SESSION["quantity"]);
        unset($_SESSION["amounts"]);
        unset($_SESSION["total"]);
        unset($_SESSION["cart"]);
    }
}

//---------------------------
//Добавить
if (isset($_GET["add"])) {
    $i = $_GET["add"];
    $quantity = $_SESSION["quantity"][$i] + 1;
    $_SESSION["amounts"][$i] = $amounts[$i] * $quantity;
    $_SESSION["cart"][$i] = $i;
    $_SESSION["quantity"][$i] = $quantity;
}


//Убрать товар с корзины
if (isset($_GET["delete"])) {
    $i = $_GET["delete"];
    $quantity = $_SESSION["quantity"][$i];
    $quantity--;
    $_SESSION["quantity"][$i] = $quantity;
    //удаляем если кол/ равно 0
    if ($quantity == 0) {
        $_SESSION["amounts"][$i] = 0;
        unset($_SESSION["cart"][$i]);
    } else {
        $_SESSION["amounts"][$i] = $amounts[$i] * $quantity;
    }
}
?>
<h2>Товары</h2>
<table>
    <tr>
        <th>Продукт</th>
        <th width="10px">&nbsp;</th>
        <th>Цена</th>
        <th width="10px">&nbsp;</th>
    </tr>
    <?php
    for ($i = 0; $i < count($products); $i++) {
    ?>
        <tr>
            <td><?php echo ($products[$i]); ?></td>
            <td width="10px">&nbsp;</td>
            <td><?php echo ($amounts[$i]); ?></td>
            <td width="10px">&nbsp;</td>
            <td><a href="?add=<?php echo ($i); ?>">В корзину</a></td>
        </tr>
    <?php
    }
    ?>
    <tr>
        <td colspan="5"></td>
    </tr>
    <tr>
        <td colspan="5"><a href="?reset=true">Очистить корзину</a></td>
    </tr>
</table>
<?php
include("./basket.php");