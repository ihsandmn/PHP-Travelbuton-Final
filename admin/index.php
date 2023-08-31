<!-- Import Header -->
<?php include "include/inc_header.php"; ?>

<!-- Tampilan Utama -->
<h1 style="text-align:center; margin-top:5rem">Hi, Halo</h1>
<p style="text-align:center; font-size:1.5rem; margin-top:1.4rem">
    Selamat datang <b>
        <?php echo $_SESSION[
            "admin_username"
        ]; ?>
    </b> di halaman AdminCuy.
</p>

<!-- Footer -->
</main>
<footer class="bg-light">
    <div class="text-center p-5 fixed-bottom" style="background:#42b883;">
        Muhammad Ihsan Daimun &copy; 2023
    </div>
</footer>