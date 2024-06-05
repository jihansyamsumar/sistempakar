<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>
    <section id="nav-bar">

    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <a class="navbar-brand" href="#"><img src="image/logo.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" 
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                aria-expanded="false" aria-label="Toggle navigation">
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
            <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="login.php">Login</a>
            </li>
            
        </ul>
        </div>
    </nav>
    </section>

    <!-- about section -->
    <section id="about">
        <div class="container text-center">
            <h2 class="judul">About</h2>
            <div class="row justify-content-center">
            <div class="col-md-8 about">
                <p>Penyakit Pneumonia adalah infeksi pada salah satu atau kedua paru-paru yang disebabkan oleh bakteri, virus, atau jamur. 
                Pneumonia bisa terjadi pada siapa saja, tetapi sering kali paling berisiko terutama pada anak-anak kecil dengan sistem kekebalan tubuh yang lemah.
                Sebagian besar pneumonia disebabkan oleh mikroorganisme (virus/bakteri) dan sebagian kecil disebabkan
                oleh hal lain (aspirasi, radiasi, dan lain-lain).</p>
            </div>
            </div>
        </div>
    </section>

    <!-- about prevention section -->
    <section id="about-prev">
      <div class="container text-center">
        <h2 class="title">Tindakan Pencegahan</h2>
        <div class="row text-center">
          <div class="col-md-4 about-prev">
            <img src="image/about.png" class="about-prev-img">
            <h4>Berjemur</h4>
            <p>Untuk meningkatkan dan menguatkan sistem imun atau kekebalan tubuh.
            </p>
          </div>
          <div class="col-md-4 about-prev">
            <img src="image/wash.png" class="about-prev-img">
            <h4>Rajin mencuci tangan</h4>
            <p>Menghilangkan kotoran dan debu secara mekanis dari permukaan kulit serta 
              mengurangi jumlah mikroorganisme.</p>
          </div>
          <div class="col-md-4 about-prev">
            <img src="image/face.png" class="about-prev-img">
            <h4>Menghindari menyentuh bagian wajah</h4>
            <p>Menghindari menyentuh wajah, terutama mulut, hidung, dan mata dengan 
              tangan pada saat bermain agar terhindar dari penyebaran 
              virus dan bakteri.</p>
          </div>
          <div class="col-md-4 about-prev">
            <img src="image/smoking.png" class="about-prev-img">
            <h4>Menghindari asap rokok</h4>
            <p>Tidak mendekati orang yang sedang merokok agar asapnya tidak terhisap 
              oleh balita.</p>
          </div>
          <div class="col-md-4 about-prev">
            <img src="image/eat.jpg" class="about-prev-img">
            <h4>Makan sehat dan cukup</h4>
            <p>Makan makanan sehat sesuai aturan perlu dibiasakan kepada anak balita.</p>
          </div>
          <div class="col-md-4 about-prev">
            <img src="image/sleep.png" class="about-prev-img">
            <h4>Istirahat cukup</h4>
            <p>Agar sel imun di dalam tubuh dapat bekerja dengan 
              baik untuk melawan racun dan penyakit di dalam tubuh. </p>
          </div>
        </div>
      </div> 
      <div>
        <hr>
        <p class="copyright">&copy; 2024 Jihan Syamsumar</p>
      </div>
    </section> 

    <!-----------js smooth scroll----------->
    <script src="smooth-scroll.js"></script>
    <script>
      var scroll = new SmoothScroll('a[href*="#"]');
    </script>

</body>
</html>