<?php 
// Jika sesi belum mulai, mulai sesi (penting buat login nanti)
if( !session_id() ) session_start();

// Panggil file init (Bootstrapper)
require_once '../app/init.php';

// Jalankan Class App
$app = new App;