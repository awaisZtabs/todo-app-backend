<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF LPO</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            position: relative;
        }

        .container {
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            box-sizing: border-box;
            background: #fff;
            min-height: 100vh;
        }

        /* Header Section */
        .header img {
            width: 100%;
            max-height: 120px;
            margin-bottom: 20px;
        }

        /* Background Image Styling */
        .background-img {
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.1;
            width: 600px; /* Adjust width to match watermark size */
            height: auto;
        }

        /* Upper Section */
        .upper-section {
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .upper-section .row {
            margin-bottom: 20px;
        }

        .upper-section strong {
            display: inline-block;
            width: 80px;
            vertical-align: top;
        }

        .upper-section .value {
            display: inline-block;
            font-weight: bold;
        }

        /* To Section Styling */
        .to-box {
            text-align: center;
            width: calc(100% - 100px);
            padding: 5px 10px;
            font-weight: bold;
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
            background-color: #f9f9f9;
        }

        /* Subject Section Styling */
        .subject-box {
            display: inline-block;
            width: calc(100% - 100px);
            padding: 5px 10px;
            font-weight: bold;
            border: 1px solid #000;
            background-color: #f9f9f9;
            text-align: center;
        }

        /* Table Section */
        .table-container {
            margin-top: 20px;
            margin-bottom: 40px; /* Added space below the table */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th, table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            font-size: 14px;
        }

        table th {
            background-color: #d9eaf7; /* Light blue color */
        }

        /* Data Below Table */
        .below-table {
            margin-top: 50px; /* Increased space below the table */
            padding-top: 20px;
            border-top: 1px solid #000;
        }

        .below-table .row {
            margin-bottom: 15px;
        }

        .below-table .row strong {
            display: inline-block;
            width: 100px;
        }

        .below-table p {
            margin-top: 15px;
        }

        /* Footer Section (Stamp & Signature) */
        .footer {
            position: relative;
            margin-top: 40px;
            text-align: left;
        }

        .footer img {
            max-height: 100px;
            display: inline-block;
            margin-top: 20px;
        }

        .footer .footer-text {
            margin-top: 10px;
            font-size: 12px;
        }

        /* Footer Information */
        .footer-info {
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: #000;
            margin-top: 30px;
            padding-top: 10px;
            border-top: 1px solid #000;
        }
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    position: relative;
    width: 100%;
    max-width: 750px; /* Adjusted width to fit A4 */
    margin: 0 auto;
    padding: 20px 10px 20px 30px; /* Adjust left padding for alignment */
    box-sizing: border-box;
    background: #fff;
}

.header img {
    width: 100%;
    max-height: 120px;
}

/* Ensure everything is centered and aligned */
.upper-section {
    font-size: 14px;
    line-height: 1.8;
    margin-bottom: 20px;
    text-align: left; /* Adjust alignment */
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

table th, table td {
    border: 1px solid #000;
    padding: 8px;
    text-align: left;
    font-size: 14px;
}

table th {
    background-color: #d9eaf7; /* Light blue color */
}

/* Add spacing to ensure footer doesn't overlap */
.footer {
    position: relative;
    margin-top: 40px;
}
.footer .line {
            width: 200px;
            border-top: 1px solid #000;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
        <img src="{{ asset('images/header.png') }}" alt="Header Image">
    </div>
        <!-- Background Image -->
        <img src="{{ asset('images/bg-image.png') }}" class="background-img" alt="Watermark">

        <!-- Upper Section -->
        <div class="upper-section">
            <!-- Date -->
            <div class="row">
                <strong>Date:</strong> <span class="value">{{ $record->date }}</span>
            </div>

            <!-- Reference -->
            <div class="row">
                <strong>Ref:</strong> <span class="value" style="color: red;">{{ \Carbon\Carbon::parse($record->date)->format('Y') }}/{{ $record->id }}</span>
            </div>

            <!-- To Section -->
            <div class="row">
                <strong>To:</strong>
                <span class="to-box">{{ $record->supplier->name }}</span>
            </div>

            <!-- Subject Section -->
            <div class="row">
                <strong>Subject:</strong>
                <span class="to-box">LOCAL PURCHASE ORDER</span>
            </div>
        </div>

        <!-- Content Section -->
        <div class="content">
            <div class="section">
                <p>We are requesting you to provide us the car, as per the following detail:</p>
            </div>

            <!-- Table Section -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Vehicle Type</th>
                            <th>Color</th>
                            <th>Plate No</th>
                            <th>Rate</th>
                            <th>No of Days</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{ $record->vehicleType->name }}</td>
                            <td>{{ $record->color }}</td>
                            <td>{{ $record->plate_no }}</td>
                            <td>{{ $record->rate }} {{ $record->tax_type == "record->rate" ? "+VAT" : "Inclusive" }}</td>
                            <td>{{ $record->no_of_days  }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Data Below Table -->
            <div class="below-table">
                <div class="row">
                    <strong>Date:</strong> {{ \Carbon\Carbon::parse($record->date)->format('d/m/Y') }}
                </div>
                <div class="row">
                    <strong>Time:</strong> {{ str_replace(':00', '', $record->delivery_time) }}
                </div>
                <div class="row">
                    <strong>Delivery:</strong> PORT SAEED, DEIRA, DUBAI
                </div>
                <p>
                    THOMSON RENT A Car will be responsible for all the fines, salik, or any other dues
                    related to this contractual period.
                </p>
                <p>Thank you for your business cooperation with us.</p>
            </div>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <img src="{{ asset('images/stamp.png') }}" alt="Stamp">
            <img src="{{ asset('images/signature.png') }}" alt="Signature">
            <div class="line"></div>
            <div class="footer-text">For THOMSON RENT A CAR LLC</div>
        </div>

        <!-- Footer Information -->
        <div class="footer-info">
            MOB: +971 56 2900117, TEL: +971 4 2949677, P.O BOX: 81766, DUBAI, United Arab Emirates <br>
            Email: accounts@thomsonrac.ae, www.thomsoncarrental.com
        </div>
    </div>
</body>
</html>
