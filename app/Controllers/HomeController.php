<?php
class HomeController
{

    public function index()
    {
        $response = [
            'data' => null,
            'message' => "API Service payment",
            'status' => true
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
