<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Absensi</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen font-sans relative bg-white overflow-hidden">

  <!-- Background -->
  <div class="absolute inset-0 z-0">
    <!-- Bagian kiri putih penuh -->
    <div class="absolute left-0 top-0 w-full h-full bg-white"></div>
    
    <!-- Bagian kanan biru dengan bentuk diagonal -->
    <div class="absolute top-0 right-0 w-[60%] h-full bg-blue-500 origin-top-left transform -skew-x-12"></div>
    
    <!-- Garis-garis diagonal di bagian kiri -->
    <div class="absolute left-0 top-0 w-1/2 h-full overflow-hidden">
      <svg class="absolute -left-32 -top-16 w-[800px] h-[120%] opacity-20" xmlns="http://www.w3.org/2000/svg">
        <g transform="rotate(25)">
          <line x1="100" y1="0" x2="100" y2="1200" stroke="#3b82f6" stroke-width="24"/>
          <line x1="180" y1="0" x2="180" y2="1200" stroke="#60a5fa" stroke-width="20"/>
          <line x1="260" y1="0" x2="260" y2="1200" stroke="#93c5fd" stroke-width="16"/>
          <line x1="340" y1="0" x2="340" y2="1200" stroke="#bfdbfe" stroke-width="12"/>
          <line x1="420" y1="0" x2="420" y2="1200" stroke="#dbeafe" stroke-width="8"/>
        </g>
      </svg>
    </div>
  </div>

  <!-- Brand Logo/Text -->
  <div class="absolute top-6 left-6 z-20">
    <h1 class="text-2xl font-bold text-black">ABSENSI</h1>
  </div>

  <!-- Container untuk centering -->
  <div class="min-h-screen flex items-center justify-center relative z-10">
    <!-- Login Box -->
    <div class="bg-gray-100/95 backdrop-blur-sm p-6 rounded-xl shadow-lg w-full max-w-xs text-center">
      @yield('content')
    </div>
  </div>

  <!-- Footer -->
  <footer class="absolute bottom-4 w-full text-center text-xs text-gray-700 z-10">
    2025 Developed By <span class="text-blue-600 font-medium">TheMans and Team</span> Theme By <span class="text-blue-600 font-medium">TheMans</span>
  </footer>
</body>
</html>