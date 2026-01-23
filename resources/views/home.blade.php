<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Newworld Cargo | Console</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f5f5f5;
      font-family: 'Poppins', sans-serif;
    }

    .spinner-container {
      position: relative;
      width: 80px;
      height: 80px;
    }

    .spinner {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      border: 3px solid transparent;
      border-top-color: #3498db;
      animation: spin 1.2s cubic-bezier(0.68, -0.55, 0.27, 1.55) infinite;
    }

    .spinner:before {
      content: "";
      position: absolute;
      top: 5px;
      left: 5px;
      right: 5px;
      bottom: 5px;
      border-radius: 50%;
      border: 3px solid transparent;
      border-top-color: #e74c3c;
      animation: spin 1.8s cubic-bezier(0.68, -0.55, 0.27, 1.55) infinite reverse;
    }

    .spinner:after {
      content: "";
      position: absolute;
      top: 15px;
      left: 15px;
      right: 15px;
      bottom: 15px;
      border-radius: 50%;
      border: 3px solid transparent;
      border-top-color: #f1c40f;
      animation: spin 1.5s cubic-bezier(0.68, -0.55, 0.27, 1.55) infinite;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }

    .pulse {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 20px;
      height: 20px;
      background-color: rgba(52, 152, 219, 0.8);
      border-radius: 50%;
      animation: pulse 1.5s ease-in-out infinite;
    }

    @keyframes pulse {
      0% {
        transform: translate(-50%, -50%) scale(0.6);
        opacity: 1;
      }
      50% {
        transform: translate(-50%, -50%) scale(1);
        opacity: 0.3;
      }
      100% {
        transform: translate(-50%, -50%) scale(0.6);
        opacity: 1;
      }
    }

    .loading-text {
      position: absolute;
      bottom: -30px;
      width: 100%;
      text-align: center;
      font-size: 14px;
      font-weight: 500;
      color: #555;
      letter-spacing: 1px;
    }
  </style>
</head>
<body>
  <div class="spinner-container">
    <div class="spinner"></div>
    <div class="pulse"></div>
    <div class="loading-text">LOADING</div>
  </div>
</body>
<script>
    window.addEventListener('load', function () {
        setTimeout(function () {
            window.location.href = '/signin';
        }, 1000);
    });
</script>

</html>
