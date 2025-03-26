<style>
    body {
        font-family: 'Helvetica', sans-serif;
        color: #333;
        line-height: 1.5;
        margin: 0;
        padding: 20px;
    }
    .container {
        max-width: 800px;
        margin: 0 auto;
    }
    .header {
        text-align: center;
        margin-bottom: 30px;
        padding-bottom: 10px;
        border-bottom: 1px solid #ddd;
    }
    .order-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 30px;
    }
    .info-block {
        margin-bottom: 20px;
    }
    .info-block-title {
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 5px;
    }
    .status {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 4px;
        font-weight: 500;
    }
    .status-cancelled {
        background-color: #ffdddd;
        color: #d32f2f;
    }
    .status-completed {
        background-color: #ddffdd;
        color: #388e3c;
    }
    .status-pending {
        background-color: #fff9c4;
        color: #ffa000;
    }
    .price {
        font-size: 18px;
        font-weight: bold;
    }
    .items-section {
        margin-top: 30px;
        margin-bottom: 40px;
    }
    .items-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 15px;
    }
    .items-table {
        width: 100%;
        border-collapse: collapse;
    }
    .items-table th {
        background-color: #f5f5f5;
        padding: 10px;
        text-align: left;
        border-bottom: 2px solid #ddd;
    }
    .items-table td {
        padding: 10px;
        border-bottom: 1px solid #eee;
    }
    .items-table .quantity-price {
        text-align: right;
    }
    .footer {
        margin-top: 40px;
        text-align: center;
        font-size: 14px;
        color: #666;
        padding-top: 20px;
        border-top: 1px solid #ddd;
    }
</style>