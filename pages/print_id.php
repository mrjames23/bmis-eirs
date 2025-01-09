<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }

        .id-card {
            width: 2.125in;
            /* Width of ID card */
            height: 3.37in;
            /* Height of ID card */
            background-color: white;
            border: 2px solid #4CAF50;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            margin: 10px;
        }

        .front,
        .back {
            width: 100%;
            height: 100%;
            position: absolute;
            /* transition: transform 0.6s; */
            /* backface-visibility: hidden; */
        }

        .front {
            background-color: #e0f7fa;
            display: absolute;
            flex-direction: column;
            padding: 10px;
        }

        .back {
            background-color: #ffe0b2;
            /* transform: rotateY(180deg); */
            display: absolute;
            flex-direction: column;
            padding: 10px;
        }

        /* .id-card:hover .front {
            transform: rotateY(180deg);
        }

        .id-card:hover .back {
            transform: rotateY(0);
        } */

        .logo {
            width: 50px;
            height: 50px;
            background-color: #ccc;
            position: absolute;
        }

        .logo.left {
            top: 10px;
            left: 10px;
        }

        .logo.right {
            top: 10px;
            right: 10px;
        }

        .photo {
            width: 80px;
            height: 80px;
            background-color: #ccc;
            margin: 20px auto;
        }

        .details {
            text-align: center;
            margin-top: 10px;
        }

        .barcode {
            width: 100px;
            height: 40px;
            background-color: #000;
            margin: 10px auto;
        }

        .signature {
            width: 150px;
            height: 50px;
            background-color: #ccc;
            margin-top: auto;
            margin-bottom: 10px;
        }

        h2 {
            margin: 10px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="id-card">
        <div class="front">
            <div class="logo left"></div>
            <div class="logo right"></div>
            <h2>SAMPLE ID</h2>
            <div class="photo"></div>
            <div class="details">
                <p>[Name]</p>
                <p>[Address]</p>
                <p>Control ID No: [ID Number]</p>
            </div>
            <div class="barcode"></div>
            <div class="signature"></div>
        </div>
        <div class="back">
            <h2>[Title Header]</h2>
            <div class="details">
                <p>[Address]</p>
                <p>[Name]</p>
            </div>
            <div class="signature"></div>
        </div>
    </div>
</body>

</html>