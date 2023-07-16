<?php
// Mengatur koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'siakad';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// API endpoint untuk mendapatkan daftar nilai dengan fitur filter, sort, dan pagination
$app = new \Slim\Slim();

$app->get('/api/nilai', function () use ($app, $conn) {
    // Mendapatkan parameter query untuk filter, sort, dan pagination
    $page = $app->request()->get('page');
    $limit = $app->request()->get('limit');
    $sort = $app->request()->get('sort');
    $filterNama = $app->request()->get('filterNama');

    // Query awal untuk mendapatkan semua nilai
    $query = "SELECT * FROM nilai";

    // Menerapkan filter berdasarkan nama jika filterNama diberikan
    if ($filterNama) {
        $query .= " WHERE nama LIKE '%$filterNama%'";
    }

    // Menerapkan sort jika sort diberikan
    if ($sort) {
        $query .= " ORDER BY nilai_angka $sort";
    }

    // Menentukan jumlah total data
    $totalDataResult = mysqli_query($conn, $query);
    $totalData = mysqli_num_rows($totalDataResult);

    // Menentukan jumlah halaman berdasarkan limit
    $totalPage = ceil($totalData / $limit);

    // Menerapkan pagination
    $start = ($page - 1) * $limit;
    $query .= " LIMIT $start, $limit";

    // Mendapatkan data nilai berdasarkan query yang telah diterapkan
    $result = mysqli_query($conn, $query);
    $nilaiData = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $nilaiData[] = $row;
    }

    // Menyusun respons dengan data nilai, total halaman, dan total data
    $response = array(
        'data' => $nilaiData,
        'currentPage' => $page,
        'totalPages' => $totalPage,
        'totalData' => $totalData
    );

    // Mengirim respons dalam format JSON
    $app->response()->header('Content-Type', 'application/json');
    echo json_encode($response);
});

$app->run();