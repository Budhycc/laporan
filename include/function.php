<?php
function generate_string($input, $strength = 16)
{
    $input_length = strlen($input);
    $random_string = '';
    for ($i = 0; $strength > $i; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}

function konversiNomorHP($nomor_hp) {
    // Cek apakah nomor_hp diawali dengan '0'
    if (substr($nomor_hp, 0, 1) === '0') {
        // Ganti '0' di paling depan dengan '+62'
        return preg_replace('/^0/', '+62', $nomor_hp);
    } else {
        // Jika sudah dalam format internasional, kembalikan nomor_hp tanpa perubahan
        return $nomor_hp;
    }
}

// function sanitize_input($data)
// {
//     return htmlspecialchars(stripslashes(trim($data)));
// }

function sanitize_filename($filename)
{
    // Replace spaces with underscores
    $filename = str_replace(' ', '_', $filename);
    // Remove special characters
    $filename = preg_replace('/[^A-Za-z0-9_\-\.]/', '', $filename);
    return $filename;
}
?>