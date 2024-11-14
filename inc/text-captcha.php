<?php

/**
 *
 * Text Captcha
 * @package bb
 */

defined('ABSPATH') || die('No script kiddies please!');

function bbo_captcha_question()
{
    $qas = carbon_get_theme_option('bbo_custom_text_captcha');
    if ($qas) {
        // Pilih satu pairing question dan answer secara acak
        $random_qa = $qas[array_rand($qas)];
        $q = $random_qa['bbo_captcha_question'];
        $a = $random_qa['bbo_captcha_answer'];

        // Return dalam bentuk array agar mudah digunakan
        return array('question' => $q, 'answer' => $a);
    }
    return false; // Kembalikan false jika tidak ada captcha
}

// Menambahkan field captcha ke form komentar
function mm_add_captcha_to_comment_form($fields)
{
    $captcha = bbo_captcha_question();
    if ($captcha) {
        $fields['captcha'] = '<p class="comment-form-captcha">' .
            '<label for="captcha">' . esc_html($captcha['question']) . '</label>' .
            '<input type="text" name="captcha_answer" id="captcha" required />' .
            '<input type="hidden" name="captcha_key" value="' . esc_attr($captcha['answer']) . '" />' .
            '</p>';
    }
    return $fields;
}
add_filter('comment_form_default_fields', 'mm_add_captcha_to_comment_form');

// Fungsi untuk validasi captcha sebelum komentar disimpan
function mm_validate_captcha($commentdata)
{
    // Hanya jalankan validasi jika captcha diisi
    if (isset($_POST['captcha_answer']) && isset($_POST['captcha_key'])) {
        $captcha_answer = sanitize_text_field($_POST['captcha_answer']);
        $captcha_key = sanitize_text_field($_POST['captcha_key']);

        // Jika jawaban tidak sesuai, tampilkan pesan error
        if (strcasecmp($captcha_answer, $captcha_key) !== 0) {
            wp_die('Jawaban captcha salah. Silakan coba lagi.');
        }
    }
    return $commentdata;
}
add_filter('preprocess_comment', 'mm_validate_captcha');
