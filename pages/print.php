<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/icon.ico" type="image/ico">
    <title>Print Certificate</title>

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .certificate {
            border: 5px solid #4CAF50;
            padding: 20px;
            background-color: white;
            width: 600px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #4CAF50;
        }

        .recipient {
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
        }

        .details {
            margin: 20px 0;
        }

        .date {
            margin-top: 40px;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="certificate">
        <h1 id="title">Certificate of</h1>
        <p class="recipient">This certifies that</p>
        <h2 id="name">[Recipient Name]</h2>
        <p class="details">This certification is being used upon the request of the above mentioned for whatever it may serve.</p>
        <p class="details">Issued this <b><?= date('F d, Y') ?></b></p>
        <div class="date" id="brgy_head">Punong Barangay: BARANGAY HEAD</div>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'ajax',
                method: 'post',
                data: {
                    id: "<?= $_GET['data'] ?>",
                    fetch: "print_certificate"
                },
                dataType: 'json',
                success: function(response) {
                    $('#title').html(response.title);
                    $('#name').html(response.name);
                    setTimeout(function() {
                        window.addEventListener("load", window.print())
                    }, 1000);
                }
            });
        });
    </script>
</body>

</html>