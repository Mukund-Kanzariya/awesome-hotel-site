<?php

define("BASE_DIR", $_SERVER['DOCUMENT_ROOT'] . "/hotel/admin");
define("BASE_URL", "/hotel/admin");

date_default_timezone_set('Asia/Kolkata');

$conn = new PDO("mysql:host=localhost;port=3306;dbname=stayComfort", "root", "");

function pathOf($path)
{
    return BASE_DIR . "/" . $path;
}

function urlOf($path)
{
    return BASE_URL . '/' . $path;
}

function execute($query, $params = null)
{
    global $conn;

    $statement = $conn->prepare($query);
    return $statement->execute($params);
}

function selectOne($query, $params = null)
{
    global $conn;

    $statement = $conn->prepare($query);
    $statement->execute($params);

    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function select($query, $params = null)
{
    global $conn;

    $statement = $conn->prepare($query);
    $statement->execute($params);

    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function lastInsertId()
{
    global $conn;
    return $conn->lastInsertId();
}

function getLastError()
{
    global $conn;
    return $conn->errorInfo();
}


function authenticate($moduleName, $userId)
{
    global $conn;
    $statement = $conn->prepare("SELECT permissions.AddPermission, permissions.EditPermission, permissions.DeletePermission, permissions.ViewPermission FROM permissions INNER JOIN users ON users.Id = permissions.UserId INNER JOIN modules ON modules.Id = permissions.ModuleId WHERE modules.Name = ? AND users.Id = ?");
    $statement->execute([$moduleName, $userId]);
    
    $rows = $statement->fetch(PDO::FETCH_ASSOC);
    return $rows;
}
