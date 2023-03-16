
# CRUD Application

This is a simple CRUD application that allows users to perform basic database operations. It is built using PHP and MySQL.


## Features

 - [Create new records]()
 - [Read existing records]()
 - [Update existing records]()
 


## Requirement

- PHP 7.4 or higher
- MySQL 5.7 or later
## Instalaltions

- Clone this repository to your local machine
- Import the database.sql file into your MySQL database
- Update the database credentials in the config/Config.php file
- Start the PHP server and navigate to the index.php file
## API Reference

#### Get status transaksi

```http
  GET /api/transaksi/status
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `references_id` | `string` | **Required**. Your API key |
| `merchant_id` | `numbers` | **Required**. Your API key |

#### Response
```http
  {
    "status": true,
    "message": "Berhasil, data status transaksi",
    "data": {
        "references_id": "6412630ed27d3",
        "invoice_id": "1",
        "status": "success"
    }
}
```

Takes two numbers and returns the sum.

#### Create Transaksi

```http
  POST /api/transaksi/add
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `invoice_id`      | `string` | **Required**. Invoice ID of item to fetch |
| `item_name`      | `string` | **Required**. Item Name of item to fetch |
| `amount`      | `numbers` | **Required**. Amount of item to fetch |
| `payment_type`      | `string` | **Required**. Payment Type of item to fetch |
| `customer_name`      | `string` | **Required**. Customer Name of item to fetch |
| `merchant_id`      | `numbers` | **Required**. Merchant ID of item to fetch |

#### Response Success
```http
  {
    "status": true,
    "message": "Berhasil, data transaksi berhasil dibuat",
    "data": {
        "references_id": "64127cc03b6f0",
        "number_va": 420557,
        "status": "pending"
    }
}
```

#### Response Error
```http
  {
    "status": false,
    "message": "Gagal, transaksi gagal dibuat",
    "data": null,
    "error": {
        "message": "Invalid input: customer_name is required"
    }
}
```


## Running PHP-CLI untuk merubah status Transaksi

```php CLI
php transaction-cli.php {references_id} {status}
```


## Authors

- This application was built by.
  [@m4bdul4aziz](https://github.com/m4bdul4aziz)

