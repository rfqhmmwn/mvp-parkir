<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Detail Booking</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
        }

        .print-page {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .print-card {
            width: 100%;
            max-width: 700px;
            border: 2px solid #000;
            padding: 30px;
            background: #fff;
        }

        .print-title {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px dashed #000;
            padding-bottom: 15px;
        }

        .print-info h5 {
            margin-bottom: 15px;
        }

        /* Tombol kanan bawah */
        .action-buttons {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
        }

        /* Hilangkan tombol saat print */
        @media print {
            .action-buttons {
                display: none;
            }

            body {
                background: #fff;
            }
        }
    </style>
</head>

<body>

<div class="print-page">
    <div class="print-card">
        <div class="print-title">
            <h2>BUKTI BOOKING</h2>
        </div>

        <div class="print-info">
            <h5><strong>Slot ID :</strong> <?= $list_booking->slot_id ?></h5>
            <h5><strong>Plat Nomor :</strong> <?= $list_booking->plat ?></h5>
            <h5><strong>Jenis Kendaraan :</strong> <?= $list_booking->jenis ?></h5>
        </div>

        <hr>

        <p class="text-center mt-4">
            Simpan bukti booking ini sebagai tanda valid.
        </p>
    </div>
</div>

<!-- Tombol Aksi -->
<div class="action-buttons">
    <a href="<?= site_url('orders'); ?>" class="btn btn-secondary">
        Kembali
    </a>
    <button onclick="window.print()" class="btn btn-primary">
        Print
    </button>
</div>

</body>
</html>
