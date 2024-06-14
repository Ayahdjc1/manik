<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prices = file_get_contents('php://input');
    file_put_contents('prices.json', $prices);
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
