<?php
    $text = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia adipisci quam illo eum impedit nulla sit quidem cum rem nam exercitationem maxime laborum minus voluptatem reiciendis sunt, in veritatis incidunt?';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head lang="it" xml:lang="it">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>PHP Bad Words</title>


<body>
    <h2>Paragrafo originale</h2>
    <p> <?php echo $text?> </p>
    <div>Il paragrafo originale contiene <?php echo strlen($text) ?> caratteri, spazi inclusi</div>
    <form action="index.php" method="GET">
        <label for="badword">Word to censor</label>
        <input type="text" id="badword" name="badword">
        <button>Send Value</button>
    </form>
    
    <?php

        $titleCensoredParagraph = '';

        $badWord = trim($_GET['badword']);

        $pattern = '/' . $badWord . '/i';

        if ($badWord && preg_match($pattern, $text)) {
            $titleCensoredParagraph = 'Paragrafo Censurato';
            $text = preg_replace($pattern, '***', $text);
        } else {
            $titleCensoredParagraph = 'Il paragrafo non contiene la parola inserita';
        }

    ?>

    <h2><?php echo $titleCensoredParagraph ?></h2>
    
    <p> <?php echo $text ?> </p>
    <div>Il paragrafo contiene <?php echo strlen($text) ?> caratteri, spazi inclusi</div>

</body>

</html>