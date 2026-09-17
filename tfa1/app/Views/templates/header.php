<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= esc($title) ?> | Simple POS</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f6f8;
            color: #222;
            font-family: Arial, sans-serif;
        }

        header {
            background: #1f2937;
            padding: 20px;
        }

        nav {
            margin: auto;
            max-width: 1000px;
        }

        nav a {
            display: inline-block;
            margin-right: 20px;
            color: white;
            font-weight: bold;
            text-decoration: none;
        }

        nav a:hover {
            color: #60a5fa;
        }

        main {
            margin: 30px auto;
            max-width: 1000px;
            min-height: 500px;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 3px 12px rgb(0 0 0 / 10%);
        }

        h1 {
            color: #1f2937;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #2563eb;
            color: white;
        }

        tbody tr:nth-child(even) {
            background: #f2f2f2;
        }

        footer {
            padding: 20px;
            color: #666;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <a href="<?= site_url('/') ?>">Home</a>
            <a href="<?= site_url('about') ?>">About</a>
            <a href="<?= site_url('customers') ?>">Customer Accounts</a>
            <a href="<?= site_url('users') ?>">User Accounts</a>
        </nav>
    </header>

    <main>