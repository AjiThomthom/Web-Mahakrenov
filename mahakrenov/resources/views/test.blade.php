<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Page</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #0f172a; /* Warna dark background */
            font-family: system-ui, -apple-system, sans-serif;
            overflow: hidden;
        }

        .hello-container {
            text-align: center;
        }

        .hello-text {
            font-size: 5rem;
            font-weight: 800;
            background: linear-gradient(to right, #38bdf8, #818cf8, #c084fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            /* Animasi naik turun (floating) */
            animation: float 3s ease-in-out infinite;
        }

        .subtitle {
            color: #94a3b8;
            font-size: 1.2rem;
            margin-top: 10px;
            /* Animasi fade in */
            opacity: 0;
            animation: fadeIn 2s ease-in forwards 1s;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="hello-container">
        <div class="hello-text">Hello World</div>
        <div class="subtitle">Laravel using Docker</div>
    </div>
</body>
</html>
