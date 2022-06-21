<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    @include('partials.navbar')
    <div class="container mt-4">
        @yield('container')
    </div>
</body>
</html>

{{-- 
    
ini adalah halaman yang akan saya gunakan untuk membuat layouting pada halaman
sehingga untuk setiap berkas yang sama, tidak perlu menulis kembali kode yang sama
hanya perlu untuk meng 'extends' layoutnya.    

--- ingat ---
- untuk setiap direktori extend itu relatif dengan folder layouts. sehingga cek ulang untuk menyesuaikan direktori
- setiap pemanggilan (entah itu body maupun, layout, atau componets[ada pada pembahasan nanti]) itu menggunakan `.` untuk pengarah 
    cth  : (dir/home/nav.blade.php)  ----> (dir.home.nav) //hanya perlu huruf sebelum titik

-- penggunaan --
untuk penggunaan bisa dilihat pada berkas masing2
untuk memanggil itu menggunakan extend(),
untuk menginisialisasi body menggunakan section("nama_section") dan diakhiri dg endsection()
untuk menentukan tempat untuk body menggunakan yeild("nama_section")
    
--}}

{{-- 
--- components ---
bahkan dengan templating engine ini pada project ini kita dapat memisah navbar menjadi sebuh components
yang biasanya disebut sebagai partial,
cara pemanggilanya yaitu dengan include('components_yang_akan_dipanggil')
ini adalah cara peng "component" an oleh taemplating engine
untuk pengompnenan yang lebih komples ada pada project berikutnya
    
--}}