<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= esc($title) ?> | Tasks for Today</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f1f5f9;
            color: #1e293b;
            font-family: Arial, sans-serif;
        }

        header {
            background: #172554;
            color: white;
        }

        .navigation {
            max-width: 1050px;
            margin: auto;
            padding: 20px 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .brand {
            font-size: 21px;
            font-weight: bold;
        }

        nav a {
            margin-left: 20px;
            color: white;
            font-weight: bold;
            text-decoration: none;
        }

        nav a:hover {
            color: #93c5fd;
        }

        main {
            max-width: 1050px;
            min-height: 540px;
            margin: 32px auto;
            padding: 32px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 18px rgb(0 0 0 / 10%);
        }

        h1 {
            margin-top: 0;
            color: #172554;
        }

        h2 {
            color: #1e3a8a;
        }

        .subtitle {
            margin-bottom: 25px;
            color: #64748b;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 13px;
            border: 1px solid #dbe3ee;
            text-align: left;
        }

        th {
            background: #2563eb;
            color: white;
        }

        tbody tr:nth-child(even) {
            background: #f8fafc;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .status.pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status.in_progress {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .status.completed {
            background: #dcfce7;
            color: #15803d;
        }

        .empty-message {
            margin-top: 20px;
            padding: 18px;
            background: #f8fafc;
            border-left: 5px solid #2563eb;
        }

        .profile-card {
            max-width: 600px;
            margin-top: 25px;
            padding: 25px;
            background: #f8fafc;
            border: 1px solid #dbe3ee;
            border-radius: 10px;
        }

        .profile-row {
            padding: 12px 0;
            border-bottom: 1px solid #dbe3ee;
        }

        .profile-row:last-child {
            border-bottom: none;
        }

        .profile-label {
            display: inline-block;
            width: 140px;
            font-weight: bold;
        }

        .about-section {
            max-width: 760px;
            line-height: 1.7;
        }

        footer {
            padding: 24px;
            color: #64748b;
            text-align: center;
        }

        @media (max-width: 760px) {
            .navigation {
                align-items: flex-start;
                flex-direction: column;
            }

            nav a {
                display: block;
                margin: 10px 0 0;
            }

            main {
                margin: 20px 12px;
                padding: 20px;
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="navigation">
            <div class="brand">Tasks for Today</div>

            <nav>
                <a href="<?= site_url('/') ?>">Welcome</a>
                <a href="<?= site_url('tasks') ?>">Task List</a>
                <a href="<?= site_url('profile') ?>">Profile</a>
                <a href="<?= site_url('about') ?>">About</a>
            </nav>
        </div>
    </header>

    <main>