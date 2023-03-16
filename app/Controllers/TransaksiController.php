<?php

require_once 'app/Models/TransaksiModel.php';

class TransaksiController
{
    private $transaksiModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
    }

    public function createTransaksi()
    {
        header('Content-Type: application/json');

        list($input, $errors) = $this->validateInput($_POST);

        if ($errors) {
            $response = [
                'status' => false,
                'message' => "Gagal, transaksi gagal dibuat",
                'data' => null,
                'error' => $errors
            ];

            echo json_encode($response);
            exit;
        }

        $input['number_va'] = $input['payment_type'] == 'virtual_account' ? rand(100000, 999999) : null;

        $references_id = $this->transaksiModel->createTransaksi($input);

        if (!empty($references_id)) {
            $data = [
                'references_id' => $references_id,
                'number_va' => $input['number_va'],
                'status' => 'pending'
            ];
        }

        $response = [
            'status' => $data ? true : false,
            'message' => !empty($data) ? "Berhasil, data transaksi berhasil dibuat" : "Gagal, transaksi gagal dibuat",
            'data' => $data,
        ];

        echo json_encode($response);
    }


    public function updateTransaksiCli($params)
    {

        $reference_id = isset($params[1]) ? $params[1] : '';
        $status = isset($params[2]) ? $params[2] : '';

        // Validate arguments
        if (empty($reference_id) || empty($status)) {
            echo "Usage: php transaction-cli.php <reference_id> <status>\n";
            exit(1);
        }

        // check data 
        $checkdata = $this->transaksiModel->getDataByReference($reference_id);

        if (empty($checkdata)) {

            echo "Gagal ubah status transaksi, data tidak ditemukan";
            exit;
        }

        $update = $this->transaksiModel->updateStatusByReferenceId($reference_id, $status);

        echo "Berhasil ubah status";
    }

    public function getStatusTransaksi()
    {
        $input = $_GET;
        $result = $this->transaksiModel->getStatusByRefAndMerchant($input['references_id'], $input['merchant_id']);

        if (!empty($result)) {
            $data = [
                'references_id' => $result['references_id'],
                'invoice_id' => $result['invoice_id'],
                'status' => $result['status']
            ];
        }

        $response = [
            'status' => isset($data) ? true : false,
            'message' => !empty($data) ? "Berhasil, data status transaksi" : "Transaksi tidak ditemukan",
            'data' => $data ?? null

        ];


        header('Content-Type: application/json');
        echo json_encode($response);
    }

    private function validateInput($input)
    {
        $requiredFields = ['invoice_id', 'item_name', 'amount', 'payment_type', 'customer_name', 'merchant_id'];
        $errors = [];
        foreach ($requiredFields as $field) {

            if (!isset($input[$field]) || empty($input[$field])) {
                $errors[] = $field . ' is required';
            }
        }

        if (count($errors) > 0) {

            $responseError = array(
                'message' => 'Invalid input: ' . implode('; ', $errors)
            );

            return array(null, $responseError);
        }

        return array($input, null);
    }
}
