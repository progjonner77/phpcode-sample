<?php
require_once __DIR__ . '/../vendor/phpqrcode/qrlib.php';

// outputs image as PNG that can be refer to a HTML image 'src'
QRcode::png('PHP QR Code :)');
?>