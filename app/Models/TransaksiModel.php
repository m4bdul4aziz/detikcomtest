<?php

require_once 'app/Models/Model.php';

class TransaksiModel extends Model
{

    public function createTransaksi($input)
    {
        $references_id = uniqid();
        $status = 'pending';

        $data = array(
            'references_id' => $references_id,
            'invoice_id' => $input['invoice_id'],
            'item_name' => $input['item_name'],
            'amount' => $input['amount'],
            'payment_type' => $input['payment_type'],
            'customer_name' => $input['customer_name'],
            'merchant_id' => $input['merchant_id'],
            'number_va' => $input['number_va'],
            'status' => $status
        );

        $this->create('transaksi', $data);

        return $references_id;
    }

    public function updateStatusByReferenceId($references_id, $status)
    {

        $where = [
            'references_id' => $references_id,
        ];

        $data = array(
            'references_id' => $references_id,
            'status' => $status
        );

        return $this->update('transaksi', $data, $where);
    }

    public function getStatusByRefAndMerchant($references_id, $merchant_id)
    {
        $where = [
            'references_id' => $references_id,
            'merchant_id' => $merchant_id,
        ];

        return $this->selectWhere('transaksi', $where);
    }

    public function getDataByReference($references_id)
    {
        $where = [
            'references_id' => $references_id,
        ];

        return $this->selectWhere('transaksi', $where);
    }
}
