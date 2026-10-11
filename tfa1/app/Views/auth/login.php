<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= esc($title) ?></title>

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
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #172033;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            margin: 20px;
            padding: 32px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 8px;
        }

        .subtitle {
            margin-bottom: 24px;
            color: #64748b;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input {
            width: 100%;
            margin-bottom: 18px;
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #1e293b;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #334155;
        }

        .error-box {
            margin-bottom: 18px;
            padding: 12px;
            border-radius: 6px;
            background: #fee2e2;
            color: #991b1b;
        }

        .error-box ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>

<body>
    <main class="login-card">
        <h1>POS Login</h1>

        <p class="subtitle">
            Sign in to manage customer and user accounts.
        </p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="error-box">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <?php $errors = session()->getFlashdata('errors'); ?>

        <?php if (! empty($errors)): ?>
            <div class="error-box">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('login') ?>" method="post">
            <?= csrf_field() ?>

            <label for="username">Username</label>

            <input
                type="text"
                id="username"
                name="username"
                value="<?= old('username') ?>"
                autocomplete="username"
                required
            >

            <label for="password">Password</label>

            <input
                type="password"
                id="password"
                name="password"
                autocomplete="current-password"
                required
            >

            <button type="submit">Login</button>
        </form>
    </main>
</body>
</html>