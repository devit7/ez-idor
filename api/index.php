<?php
session_start();
$_SESSION['product1'] = 100000;
$_SESSION['product2'] = 98789200001;

if (!isset($_SESSION['saldo'])) {
  $_SESSION['saldo'] = 100000;
}

$notification = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['p-1'])) {
    if ($_SESSION['saldo'] >= $_SESSION['product1']) {
      $_SESSION['saldo'] -= $_SESSION['product1'];
      $notification = 'Produk 1 berhasil dibeli!';
    } else {
      $notification = 'Saldo tidak cukup untuk membeli Ayang.';
    }
  }

  if (isset($_POST['p-2'])) {
    if ($_SESSION['saldo'] >= $_POST['p-2']) {
      $_SESSION['saldo'] -= $_POST['p-2'];
      $notification = 'Produk 2 berhasil dibeli!  CODER25{v3ry_34sy_4nd_5impl3} BY: Mpiie :]';
    } else {
      $notification = 'Saldo tidak cukup untuk membeli Produk 2.';
    }
  }
}
?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(255, 255, 255, 0);
      /* Transparan */
      z-index: 9999;
      pointer-events: none;
      /* Tetap bisa berinteraksi */
    }
  </style>
</head>

<body>
  <div class="w-full bg-blue-500">
    <div class="flex justify-between text-white max-w-6xl mx-auto p-4 font-semibold">
      <div>Saldo Anda adalah Rp. <?php echo number_format($_SESSION['saldo'], 0, ',', '.'); ?></div>
      <div>User</div>
    </div>
  </div>

  <?php if ($notification): ?>
    <div id="notification" class="max-w-6xl mx-auto p-4 text-center <?php echo strpos($notification, 'berhasil') !== false ? 'bg-green-500' : 'bg-red-500'; ?> text-white rounded-md">
      <?php echo $notification; ?>
    </div>
    <script>
      setTimeout(() => document.getElementById('notification').remove(), 3000);
    </script>
  <?php endif; ?>

  <div class="max-w-6xl mx-auto grid grid-cols-3 gap-4 p-4" id="overlay">
    <form class="bg-white p-4 shadow-md rounded-md" action="index.php" method="post">
      <div class="text-center">
        <img src="http://img-host-by-dev.vercel.app/img/anime/lupanamanya.jpg" alt="product" class="w-32 h-32 mx-auto object-cover">
      </div>
      <div class="text-center mt-4">
        <h1 class="text-lg font-semibold">Nakano Nino Sekolah :]</h1>
        <div class="flex justify-center items-center text-sm text-gray-500 text-center">
          <p>Rp. </p>
          <input readonly name="p-1" value="<?php echo $_SESSION['product1']; ?>" class="outline-none border-none bg-transparent" />
        </div>
      </div>
      <div class="mt-4">
        <button type="submit" class="bg-blue-500 text-white w-full p-2 rounded-md">Beli</button>
      </div>
    </form>

    <form class="bg-white p-4 shadow-md rounded-md" action="index.php" method="post">
      <div class="text-center">
        <img src="http://img-host-by-dev.vercel.app/img/k4ctf/jhvk.png" alt="product" class="w-32 h-32 mx-auto">
      </div>
      <div class="text-center mt-4">
        <h1 class="text-lg font-semibold">Plag hehe</h1>
        <div class="flex justify-center items-center text-sm text-gray-500 text-center">
          <p>Rp. </p>
          <input readonly name="p-2" value="<?php echo $_SESSION['product2']; ?>"
            class="outline-none border-none bg-transparent" />
        </div>
      </div>
      <div class="mt-4">
        <button type="submit" class="bg-blue-500 text-white w-full p-2 rounded-md">Beli</button>
      </div>
    </form>
  </div>

  <script>
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
      form.addEventListener('submit', (e) => {
        const input = form.querySelector('input');
        if (input.value != <?php echo $_SESSION['product1']; ?> && input.value != <?php echo $_SESSION['product2']; ?>) {
          e.preventDefault();
          alert('Harga produk telah diubah!');
        }
      });
    });
  </script>

  <script>
    (function() {
      const devtools = {
        isOpen: false
      };
      const threshold = 160;

      const checkDevTools = () => {
        const widthThreshold = window.outerWidth - window.innerWidth > threshold;
        const heightThreshold = window.outerHeight - window.innerHeight > threshold;

        if (widthThreshold || heightThreshold) {
          if (!devtools.isOpen) {
            alert('⚠️ DevTools terdeteksi! Akses tidak diperbolehkan.');
            window.location.href = 'https://google.com'; // Redirect ke halaman lain
          }
          devtools.isOpen = true;
        } else {
          devtools.isOpen = false;
        }
      };

      window.addEventListener('resize', checkDevTools);
      checkDevTools();
    })();
    // Disable klik kanan
    document.addEventListener('contextmenu', event => event.preventDefault());

    // Disable shortcut DevTools (F12, Ctrl+Shift+I, dll.)
    document.addEventListener('keydown', event => {
      if (
        event.key === "F12" ||
        (event.ctrlKey && event.shiftKey && event.key === "I") ||
        (event.ctrlKey && event.shiftKey && event.key === "J") ||
        (event.ctrlKey && event.key === "U")
      ) {
        event.preventDefault();
      }
    });
  </script>

</body>

</html>