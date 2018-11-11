<?php
    include('global_variables.php');
    $query = 'create database if not exists ' . $db_name;
    $conn->select_db($db_name);
    $conn->query($query);
    $query = 'create table if not exists clients(
        client_id int auto_increment,
        client_name varchar(255),
        client_email varchar(255),
        client_number varchar(255),
        client_lead varchar(1),
        client_options varchar(255),
        client_notes text,
        client_prestosite int,
        client_sitetonego int,
        client_negotoclos int,
        client_numCalls int,
        client_taken varchar(1),
        client_seller int,
        client_price int,
        primary key (client_id)
    )';
    $conn->query($query);
    $query = 'create table if not exists ad(
        admin_id int auto_increment,
        admin_username varchar(255),
        admin_password varchar(255),
        primary key (admin_id)
    )';
    $conn->query($query);
    $query = 'create table if not exists lo(
        log_id int auto_increment,
        user_id int,
        log_action text,
        log_date datetime,
        primary key (log_id)
    )';
    $conn->query($query);
    $query = 'create table if not exists sellers(
        seller_id int auto_increment,
        seller_name varchar(255),
        seller_number varchar(255),
        seller_password varchar(255),
        primary key (seller_id)
    )';
    $conn->query($query);
    $query = 'select count(admin_id) as count from ad where admin_username = "' . $default_username . '"';
    $result = $conn->query($query);
    $row = $result->fetch_object();
    if($row->count < 1){
        $stmt = $conn->prepare('insert into ad(admin_username, admin_password) values (?, ?)');
        $stmt->bind_param('ss', $default_username, $default_password);
        $stmt->execute();
        $stmt->close();
    }
?>