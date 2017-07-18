<?php

function clearInt($data){
    return abs((int)$data);
}

function clearStr($data){
    global $link;
    return mysqli_real_escape_string($link,trim(strip_tags($data)));
}

function addItemToCatalog($title,$author,$pubyear,$price){
    global $link;
    $sql = "INSERT INTO catalog (title,author,pubyear,price) VALUES (?,?,?,?)";
    if  (!$stmt = mysqli_prepare($link, $sql)){
        return false;
    }
    mysqli_stmt_bind_param($stmt,"ssii",$title,$author,$pubyear,$price);
    mysqli_stmt_execute($stmt);
    return true;
}

function selectAllItems(){
    global $link;
    $sql = 'SELECT id, title, author, pubyear, price FROM catalog';
    if (!$result = mysqli_query($link, $sql)){
        return false;
    }
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    return $items;
}

function basketInit(){    global $basket, $count;
    if (!isset($_COOKIE['basket'])){
        $basket = array('orderid' => uniqid());
        saveBasket();
    }else{
        $basket = unserialize(base64_decode($_COOKIE['basket']));
        $count = count($basket) - 1;
    }
}

function saveBasket(){
    global $basket;
    $basket = base64_encode(serialize($basket));
    setcookie('basket',$basket, 0x7FFFFFFF);
}

function add2Basket($id, $q){
    global $basket;
    $basket[$id] = $q;
    saveBasket();
}

function myBasket(){
    global $link,$basket;
    $goods = array_keys($basket);
    array_shift($goods);
    $ids = implode(",",$goods);
    $sql = "SELECT id, author, title, pubyear, price FROM catalog WHERE id IN ($ids)";

    if (!$result = mysqli_query($link, $sql)){
        return false;
    }
    $items = result2Array($result);
    mysqli_free_result($result);
    return $items;
}

function result2Array($data){
    global $basket;
    $arr = array();
    while ($row = mysqli_fetch_assoc($data)){
        $row['quantity'] = $basket[$row['id']];
        $arr[] = $row;
    }
    return $arr;
}

function deleteItemFromBasket($id){
    global $basket;
    if (key_exists($id,$basket)){
        unset($basket[$id]);
    }
    saveBasket();
}

function saveOrder($datetime){
    global $link, $basket;
    $goods = myBasket();
    $stmt = mysqli_stmt_init($link);
    $sql = "INSERT INTO orders (title, author, pubyear, price, quantity, orderid, datetime) VALUES (?, ?, ?, ?, ?, ?, ?)";
    if (!mysqli_stmt_prepare($stmt,$sql)){
        return false;
    }
    foreach ($goods as $item){
        mysqli_stmt_bind_param($stmt,"ssiiisi", $item['title'], $item['author'], $item['pubyear'],
             $item['price'], $item['quantity'], $basket['orderid'],$datetime);
        mysqli_stmt_execute($stmt);
    }
//    mysqli_close($stmt);
    setcookie('basket',NULL);
    return true;
}

function getOrders(){
    global $link;
    if (!is_file(ORDERS_LOG)){
        return false;
    }
    $orders = file(ORDERS_LOG);
    $allorders = array();
    foreach ($orders as $order){
        list($name, $email, $phone, $address, $orderid, $dt) = explode('|',$order);
        $orderinfo = array();
        $orderinfo['name'] = $name;
        $orderinfo['email'] = $email;
        $orderinfo['phone'] = $phone;
        $orderinfo['address'] = $address;
        $orderinfo['orderid'] = $orderid;
        $orderinfo['dt'] = $dt;

        $sql = "SELECT title, author, pubyear, price, quantity FROM orders WHERE orderid = '$orderid'";
        if (!$result = mysqli_query($link, $sql)){
            return false;
        }
        $items = mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_free_result($result);

        $orderinfo["goods"] = $items;
        $allorders[] = $orderinfo;
    }
    return $allorders;
}


