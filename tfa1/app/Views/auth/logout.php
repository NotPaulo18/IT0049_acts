<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <!-- Backup redirect if JavaScript is unavailable -->
    <meta
        http-equiv="refresh"
        content="4;url=<?= esc(site_url('login'), 'attr') ?>"
    >

    <title>Logout | Simple POS</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            color: #172033;
            font-family: Arial, sans-serif;
        }

        .logout-card {
            width: 100%;
            max-width: 440px;
            margin: 20px;
            padding: 36px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgb(0 0 0 / 12%);
            text-align: center;
        }

        .success-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #dcfce7;
            color: #15803d;
            border-radius: 50%;
            font-size: 36px;
            font-weight: bold;
        }

        h1 {
            margin: 0 0 12px;
            color: #1f2937;
        }

        p {
            color: #64748b;
            line-height: 1.5;
        }

        a {
            color: #2563eb;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <main class="logout-card">
        <div class="success-icon">✓</div>

        <h1>Logout Successful</h1>

        <p>
            Your session has ended safely.
        </p>

        <p>
            Redirecting to the login page in
            <strong id="countdown">3</strong>
            seconds...
        </p>

        <p>
            <a href="<?= site_url('login') ?>">
                Return to Login now
            </a>
        </p>
    </main>

    <script>
        let seconds = 3;
        const countdown = document.getElementById('countdown');

        const timer = setInterval(function () {
            seconds--;
            countdown.textContent = seconds;

            if (seconds <= 0) {
                clearInterval(timer);
                window.location.href =
                    <?= json_encode(site_url('login')) ?>;
            }
        }, 1000);
    </script>
</body>
</html>