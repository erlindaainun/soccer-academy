<?php

function index()
{
    include '../connection.php';

    $sql = 'SELECT * FROM `matches`';
    $result = $conn->query($sql);

    $data = $result->fetch_all();

    return json_encode(['data' => $data]);
}

function getMatchByLeagueId()
{
    include '../connection.php';

    $id = $_POST['id'];

    $sql = 'SELECT * FROM `matches` WHERE `league_id` = ' . $id;
    $result = $conn->query($sql);

    // Get results from league_id
    $sql_league = 'SELECT `results` FROM `leagues` WHERE `id` = ' . $id;
    $result_league = $conn->query($sql_league);

    // print_r($result_league->fetch_all());

    echo json_encode(['teams' => $result->fetch_all(), 'results' => $result_league->fetch_all()]);
}


if (isset($_POST['tipe'])) {
    if ($_POST['tipe'] == 'getMatchByLeagueId')
        echo getMatchByLeagueId();
} else
    echo index();
