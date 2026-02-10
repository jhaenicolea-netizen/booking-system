<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking System - Documentation</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --bg: #f8fafc;
            --text: #334155;
            --heading: #0f172a;
            --code-bg: #1e293b;
            --code-text: #e2e8f0;
            --accent: #38bdf8;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text);
            background: var(--bg);
            margin: 0;
            padding: 0;
        }

        /* Layout */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* Header */
        header {
            text-align: center;
            padding-bottom: 40px;
            border-bottom: 1px solid #e2e8f0;
            margin-bottom: 40px;
        }

        .badge {
            background: #dbeafe;
            color: var(--primary);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        h1 {
            font-size: 2.5rem;
            color: var(--heading);
            margin: 15px 0;
        }

        .subtitle {
            font-size: 1.1rem;
            color: #64748b;
        }

        /* Typography */
        h2 {
            font-size: 1.5rem;
            color: var(--heading);
            margin-top: 50px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        h3 {
            font-size: 1.1rem;
            color: var(--heading);
            margin-top: 30px;
        }

        p { margin-bottom: 15px; }

        /* Code Blocks */
        .code-block {
            background: var(--code-bg);
            color: var(--code-text);
            padding: 20px;
            border-radius: 8px;
            font-family: 'Fira Code', monospace;
            font-size: 0.9rem;
            overflow-x: auto;
            position: relative;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
        }

        .code-block::before {
            content: "SHELL";
            position: absolute;
            top: 0;
            right: 0;
            background: #334155;
            color: #94a3b8;
            font-size: 0.7rem;
            padding: 4px 8px;
            border-bottom-left-radius: 8px;
        }
        
        .code-block.sql::before { content: "SQL"; }
        .code-block.php::before { content: "PHP"; }

        .cmd { color: var(--accent); }
        .flag { color: #f472b6; }
        .string { color: #a5f3fc; }
        .comment { color: #64748b; font-style: italic; }

        /* Feature Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .feature-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border: 1px solid #e2e8f0;
        }

        .feature-icon {
            font-size: 1.5rem;
            margin-bottom: 10px;
            display: block;
        }

        /* Credentials Box */
        .alert-box {
            background: #fff1f2;
            border-left: 4px solid #f43f5e;
            padding: 15px 20px;
            border-radius: 4px;
            color: #881337;
            margin: 30px 0;
        }

        /* Footer */
        footer {
            text-align: center;
            margin-top: 80px;
            color: #94a3b8;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <div class="container">
        
        <header>
            <span class="badge">Version 1.0</span>
            <h1>Booking System Pro</h1>
            <p class="subtitle">A complete PHP & MySQL solution for managing reservations, customers, and schedules.</p>
        </header>

        <section>
            <h2>🚀 Quick Start (GitHub Codespaces)</h2>
            <p>If you are running this in the cloud, follow these steps to set up the environment instantly.</p>

            <h3>1. Install Dependencies</h3>
            <div class="code-block">
                <span class="cmd">sudo apt-get</span> update && <span class="cmd">sudo apt-get</span> install <span class="flag">-y</span> mariadb-server php-mysql php8.3-cli
            </div>

            <h3>2. Setup Database</h3>
            <p>Run this single command to create the database and tables:</p>
            <div class="code-block sql">
                <span class="cmd">sudo mariadb -e</span> <span class="string">"CREATE DATABASE booking_db; USE booking_db; ..."</span>
            </div>

            <h3>3. Start Server</h3>
            <div class="code-block">
                <span class="cmd">/usr/bin/php8.3</span> <span class="flag">-S</span> 0.0.0.0:8000
            </div>
        </section>

        <section>
            <h2>💻 Local Installation (XAMPP)</h2>
            <p>For Windows users running XAMPP, follow these steps:</p>
            <ol>
                <li>Start <strong>Apache</strong> and <strong>MySQL</strong> in XAMPP Control Panel.</li>
                <li>Go to <code>http://localhost/phpmyadmin</code>.</li>
                <li>Create a database named <code>booking_db</code>.</li>
                <li>Import the SQL provided in the setup guide.</li>
                <li>Move project files to <code>C:/xampp/htdocs/booking-system</code>.</li>
            </ol>
        </section>

        <div class="alert-box">
            <strong>🔑 Default Login Credentials:</strong><br>
            Username: <code>admin</code><br>
            Password: <code>1234</code>
        </div>

        <section>
            <h2>✨ Key Features</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <span class="feature-icon">📊</span>
                    <strong>Dashboard Analytics</strong>
                    <p class="small text-muted">Real-time stats for confirmed and pending bookings.</p>
                </div>
                <div class="feature-card">
                    <span class="feature-icon">🔍</span>
                    <strong>Smart Search</strong>
                    <p class="small text-muted">Find customers by name, email, or phone instantly.</p>
                </div>
                <div class="feature-card">
                    <span class="feature-icon">🎨</span>
                    <strong>Modern UI</strong>
                    <p class="small text-muted">Glassmorphism design with responsive Bootstrap layout.</p>
                </div>
                <div class="feature-card">
                    <span class="feature-icon">🛠️</span>
                    <strong>Full CRUD</strong>
                    <p class="small text-muted">Create, Read, Update, and Delete reservations easily.</p>
                </div>
            </div>
        </section>

        <footer>
            <p>Created with ❤️ by <strong>Jhaenicole</strong> & AI Assistant</p>
        </footer>

    </div>

</body>
</html>
