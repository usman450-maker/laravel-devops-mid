```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | DevOps Portal</title>

    <style>
        :root {
            --bg: #f4f7fb;
            --surface: #ffffff;
            --sidebar: #17243b;
            --primary: #4f46e5;
            --text: #182238;
            --muted: #78849a;
            --border: #e7ebf2;
            --green: #12805c;
            --red: #c43d4b;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: Inter, "Segoe UI", Arial, sans-serif;
        }

        button, input, select {
            font: inherit;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .app {
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: var(--sidebar);
            color: white;
            position: fixed;
            inset: 0 auto 0 0;
            padding: 28px 18px;
            display: flex;
            flex-direction: column;
        }

        .brand {
            font-size: 21px;
            font-weight: 800;
            padding: 0 12px 34px;
            letter-spacing: -0.5px;
        }

        .brand span {
            color: #a5a0ff;
        }

        .nav-label {
            color: #8996ad;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.4px;
            padding: 0 12px;
            margin-bottom: 12px;
        }

        .nav-link {
            padding: 13px 14px;
            display: block;
            border-radius: 10px;
            color: #bdc7d9;
            margin-bottom: 7px;
            font-size: 14px;
        }

        .nav-link.active,
        .nav-link:hover {
            background: #303d58;
            color: white;
        }

        .sidebar-bottom {
            margin-top: auto;
            background: #24324c;
            border-radius: 12px;
            padding: 16px;
            color: #dbe4f3;
            font-size: 12px;
            line-height: 1.7;
        }

        .main {
            margin-left: 250px;
            padding: 30px 36px;
            max-width: 1700px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 30px;
        }

        .eyebrow {
            color: var(--muted);
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        h1 {
            font-size: 28px;
            letter-spacing: -0.8px;
            margin: 7px 0;
        }

        .subtitle {
            color: var(--muted);
            font-size: 14px;
        }

        .user-chip {
            background: white;
            border: 1px solid var(--border);
            padding: 11px 15px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 26px;
        }

        .stat {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 5px 20px rgba(28, 42, 70, .025);
        }

        .stat-label {
            color: var(--muted);
            font-size: 13px;
        }

        .stat-value {
            font-size: 29px;
            font-weight: 800;
            margin: 13px 0 7px;
            letter-spacing: -1px;
            overflow-wrap: anywhere;
        }

        .stat-note {
            font-size: 12px;
            color: var(--green);
        }

        .panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 22px;
            box-shadow: 0 5px 20px rgba(28, 42, 70, .025);
        }

        .panel-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 22px;
        }

        h2 {
            margin: 0 0 6px;
            font-size: 18px;
        }

        .muted {
            color: var(--muted);
            font-size: 13px;
        }

        .btn {
            display: inline-block;
            border: 0;
            border-radius: 9px;
            padding: 11px 16px;
            background: var(--primary);
            color: white;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            text-align: center;
        }

        .btn:hover {
            opacity: .9;
        }

        .btn-secondary {
            background: #eef0ff;
            color: var(--primary);
        }

        .btn-danger {
            background: #fff0f1;
            color: var(--red);
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            min-width: 760px;
        }

        th {
            background: #f8f9fc;
            color: var(--muted);
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .6px;
            padding: 14px 12px;
        }

        td {
            padding: 16px 12px;
            border-bottom: 1px solid var(--border);
            font-size: 13px;
        }

        tbody tr:last-child td {
            border-bottom: 0;
        }

        .employee-name {
            font-weight: 700;
        }

        .employee-email {
            color: var(--muted);
            font-size: 12px;
            margin-top: 4px;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .badge-active {
            background: #e5f8ef;
            color: #12805c;
        }

        .badge-inactive {
            background: #fff0f1;
            color: #c43d4b;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .actions form {
            margin: 0;
        }

        .flash {
            padding: 14px 17px;
            margin-bottom: 20px;
            border-radius: 10px;
            background: #e5f8ef;
            color: #126746;
            font-size: 14px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .field label {
            font-size: 13px;
            font-weight: 700;
        }

        .field input,
        .field select {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #dce2ed;
            border-radius: 9px;
            background: white;
            color: var(--text);
        }

        .field input:focus,
        .field select:focus {
            outline: 2px solid #c7d2fe;
            border-color: var(--primary);
        }

        .error {
            color: var(--red);
            font-size: 12px;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 24px;
        }

        .empty {
            padding: 45px 20px;
            text-align: center;
            color: var(--muted);
        }

        .pagination {
            padding-top: 20px;
        }

        .pagination nav {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .pagination a,
        .pagination span {
            font-size: 13px;
        }

        .footer {
            color: var(--muted);
            font-size: 12px;
            padding: 10px 0 20px;
        }

        @media (max-width: 1100px) {
            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .main {
                padding: 25px 22px;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                position: static;
                width: 100%;
                padding: 18px;
            }

            .brand {
                padding-bottom: 18px;
            }

            .sidebar-bottom {
                display: none;
            }

            .main {
                margin-left: 0;
                padding: 22px 15px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .stats {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .stat {
                padding: 16px;
            }

            .stat-value {
                font-size: 23px;
            }

            .panel {
                padding: 16px;
            }

            .panel-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
<div class="app">
    <aside class="sidebar">
        <div class="brand">DevOps<span>Portal.</span></div>

        <div class="nav-label">Workspace</div>

        <a class="nav-link {{ request()->routeIs('employees.index') ? 'active' : '' }}"
           href="{{ route('employees.index') }}">
            ▦ &nbsp; Dashboard
        </a>

        <a class="nav-link {{ request()->routeIs('employees.create') ? 'active' : '' }}"
           href="{{ route('employees.create') }}">
            ＋ &nbsp; Add Employee
        </a>

        <div class="sidebar-bottom">
            <strong>Deployment Status</strong><br>
            Laravel Application<br>
            Docker · MySQL · Jenkins
        </div>
    </aside>

    <main class="main">
        <header class="topbar">
            <div>
                <div class="eyebrow">DevOps Company Portal</div>
                <h1>@yield('heading', 'Dashboard')</h1>
                <div class="subtitle">@yield('subtitle', 'Manage your company workforce')</div>
            </div>

            <div class="user-chip">MU &nbsp; Administrator</div>
        </header>

        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="flash" style="background:#fff0f1;color:#a12c3b">
                Please correct the errors in the form.
            </div>
        @endif

        @yield('content')

        <footer class="footer">
            DevOps Company Portal · Laravel + MySQL · Containerized with Docker
        </footer>
    </main>
</div>
</body>
</html>
```
