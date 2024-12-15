<?php
$input_file = 'unsorted_words.txt';
$sorted_file = 'sorted_words.txt';

if (file_exists($input_file)) {
    $words = str_word_count(file_get_contents($input_file), 1);
    sort($words);
    file_put_contents($sorted_file, implode("\n", $words));
    echo "<p>Слова були відсортовані та збережені у $sorted_file.</p>";
}
