<?php

/**
 * ####################
 * ###   VALIDATE   ###
 * ####################
 */

/**
 * @param string $email
 * @return bool
 */
function is_email(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * @param string $password
 * @return bool
 */
function is_passwd(string $password): bool
{
    if (password_get_info($password)['algo'] || (mb_strlen($password) >= CONF_PASSWD_MIN_LEN && mb_strlen($password) <= CONF_PASSWD_MAX_LEN)) {
        return true;
    }

    return false;
}

/**
 * ##################
 * ###   STRING   ###
 * ##################
 */

/**
 * @param string $string
 * @return string
 */
function str_slug(string $string): string
{
    $string = filter_var(mb_strtolower($string), FILTER_SANITIZE_STRIPPED);
    $formats = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
    $replace = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';

    $slug = str_replace(["-----", "----", "---", "--"], "-",
        str_replace(" ", "-",
            trim(strtr(utf8_decode($string), utf8_decode($formats), $replace))
        )
    );
    return $slug;
}

/**
 * @param string $string
 * @return string
 */
function str_studly_case(string $string): string
{
    $string = str_slug($string);
    $studlyCase = str_replace(" ", "",
        mb_convert_case(str_replace("-", " ", $string), MB_CASE_TITLE)
    );

    return $studlyCase;
}

/**
 * @param string $string
 * @return string
 */
function str_camel_case(string $string): string
{
    return lcfirst(str_studly_case($string));
}

/**
 * @param string $string
 * @return string
 */
function str_title(string $string): string
{
    return mb_convert_case(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS), MB_CASE_TITLE);
}

/**
 * @param string $string
 * @param int $limit
 * @param string $pointer
 * @return string
 */
function str_limit_words(string $string, int $limit, string $pointer = "..."): string
{
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
    $arrWords = explode(" ", $string);
    $numWords = count($arrWords);

    if ($numWords < $limit) {
        return $string;
    }

    $words = implode(" ", array_slice($arrWords, 0, $limit));
    return "{$words}{$pointer}";
}

/**
 * @param string $string
 * @param int $limit
 * @param string $pointer
 * @return string
 */
function str_limit_chars(string $string, int $limit, string $pointer = "..."): string
{
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
    if (mb_strlen($string) <= $limit) {
        return $string;
    }

    $chars = mb_substr($string, 0, mb_strrpos(mb_substr($string, 0, $limit), " "));
    return "{$chars}{$pointer}";
}

/**
 * ###############
 * ###   URL   ###
 * ###############
 */

/**
 * @param string $path
 * @return string
 */
function url(string $path = null): string
{
    if (strpos($_SERVER['HTTP_HOST'], "localhost")) {
        if ($path) {
            return CONF_URL_TEST . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }
        return CONF_URL_TEST;
    }

    if ($path) {
        return CONF_URL_BASE . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }

    return CONF_URL_BASE;
}

/**
 * @return string
 */
function url_back(): string
{
    return ($_SERVER['HTTP_REFERER'] ?? url());
}

/**
 * @param string $url
 */
function redirect(string $url): void
{
    header("HTTP/1.1 302 Redirect");
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        header("Location: {$url}");
        exit;
    }

    if (filter_input(INPUT_GET, "route", FILTER_DEFAULT) != $url) {
        $location = url($url);
        header("Location: {$location}");
        exit;
    }
}

/**
 * ##################
 * ###   ASSETS   ###
 * ##################
 */

/**
 * @param string|null $path
 * @return string
 */
function theme(string $path = null, string $theme = CONF_VIEW_THEME): string
{
    if (strpos($_SERVER['HTTP_HOST'], "localhost")) {
        if ($path) {
            return CONF_URL_TEST . "/themes/{$theme}/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }

        return CONF_URL_TEST . "/themes/{$theme}";
    }

    if ($path) {
        return CONF_URL_BASE . "/themes/{$theme}/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }

    return CONF_URL_BASE . "/themes/{$theme}";
}

/**
 * @param string $image
 * @param int $width
 * @param int|null $height
 * @return string
 */
function image(string $image, int $width, int $height = null): string
{
    return url() . "/" . (new \Source\Support\Thumb())->make($image, $width, $height);
}

/**
 * ################
 * ###   DATE   ###
 * ################
 */

/**
 * @param string $date
 * @param string $format
 * @return string
 */
function date_fmt(string $date = "now", string $format = "d/m/Y H\hi"): string
{
    return (new DateTime($date))->format($format);
}

/**
 * @param string $date
 * @return string
 */
function date_fmt_br(string $date = "now"): string
{
    return (new DateTime($date))->format(CONF_DATE_BR);
}

/**
 * @param string $date
 * @return string
 */
function date_fmt_app(string $date = "now"): string
{
    return (new DateTime($date))->format(CONF_DATE_APP);
}

/**
 * ####################
 * ###   PASSWORD   ###
 * ####################
 */

/**
 * @param string $password
 * @return string
 */
function passwd(string $password): string
{
    if (!empty(password_get_info($password)['algo'])) {
        return $password;
    }

    return password_hash($password, CONF_PASSWD_ALGO, CONF_PASSWD_OPTION);
}

/**
 * @param string $password
 * @param string $hash
 * @return bool
 */
function passwd_verify(string $password, string $hash): bool
{
    return password_verify($password, $hash);
}

/**
 * @param string $hash
 * @return bool
 */
function passwd_rehash(string $hash): bool
{
    return password_needs_rehash($hash, CONF_PASSWD_ALGO, CONF_PASSWD_OPTION);
}

/**
 * ###################
 * ###   REQUEST   ###
 * ###################
 */

/**
 * @return string
 */
function csrf_input(): string
{
    $session = new \Source\Core\Session();
    $session->csrf();
    return "<input type='hidden' name='csrf' value='" . ($session->csrf_token ?? "") . "'/>";
}

/**
 * @param $request
 * @return bool
 */
function csrf_verify($request): bool
{
    $session = new \Source\Core\Session();
    if (empty($session->csrf_token) || empty($request['csrf']) || $request['csrf'] != $session->csrf_token) {
        return false;
    }
    return true;
}

/**
 * @return null|string
 */
function flash(): ?string
{
    $session = new \Source\Core\Session();
    if ($flash = $session->flash()) {
        echo $flash;
    }
    return null;
}

/**
 * YEAR TO CENTURY
 */
function year_to_century(int $year)
{
    $between = 1;
    $century = 100;
    $i = 1;

    while ($i) {
        if ($year >= $between && $year <= $century) {
            break;
        }
        $century += 100;
        $between += 100;
        $i++;
    }
    return $i;
}

/**
 * PRIME NUMBERS
 */
function prime_numbers(int $first, int $last): string
{
    for ($i = $first; $i < $last; $i++) {
        $number = 0;
        for ($j = 1; $j <= $i; $j++) {
            if ($i % $j == 0) {
                $number++;
            }
        }
        if ($number == 2) {
            $prime[] = $i;
        }
    }
    return implode(', ', $prime);
}

/**
 * DONT REPEAT
 */
function dont_repeat()
{
    for ($i = 1; $i <= 20; $i++) {
        $numbers[] = rand(1, 10);
    }
    /**
     * $numbers = [2,5,8,2,8,5,3,9,6,3,4,6,3,1,2,1,2,3,7,1];
     * Adendo : No exemplo da questão faltou o 9 que também não se repete.
     */

    for ($i = 0; $i < 20; $i++) {
        $count = 0;
        for ($j = $i; $j < 20; $j++) {
            if ($numbers[$i] == $numbers[$j]) {
                $count++;
            }
        }
        if ($count >= 2) {
            $repeaters[$i] = $numbers[$i];
        }
    }
    $dontRepeaters = $numbers;

    //tira a diferença
    $dontRepeaters = array_diff($dontRepeaters, $repeaters);

    return "Nos numeros gerados a seguir: " . implode(', ', $numbers) . " - os não repetidos são: " . implode(', ',
            $dontRepeaters) . ".";
}

function increasing_sequence(array $array)
{

    /**
     * No controller eu fiz essa geração de array randomica
     *
     * for ($i = 1; $i < rand(1, 10); $i++) {
     *     $string .= ", " . rand();
     * }
     * $array = explode(', ', $string);
     * $json['result'] = increasing_sequence($array);
     *
     * Tudo testado !
     *
     *  [1, 3, 2, 1]  false
        [1, 3, 2]  true
        [1, 2, 1, 2]  false
        [3, 6, 5, 8, 10, 20, 15] false
        [1, 1, 2, 3, 4, 4] false
        [1, 4, 10, 4, 2] false
        [10, 1, 2, 3, 4, 5] true
        [1, 1, 1, 2, 3] false
        [0, -2, 5, 6] true
        [1, 2, 3, 4, 5, 3, 5, 6] false
        [40, 50, 60, 10, 20, 30] false
        [1, 1] true
        [1, 2, 5, 3, 5] true
        [1, 2, 5, 5, 5] false
        [10, 1, 2, 3, 4, 5, 6, 1] false
        [1, 2, 3, 4, 3, 6] true
        [1, 2, 3, 4, 99, 5, 6] true
        [123, -17, -5, 1, 2, 3, 12, 43, 45] true
        [3, 5, 67, 98, 3] true
     *
     */


    // $array = [1, 3, 2, 1];


    $arrayCount = count($array);
    // Guarda os numeros que devem ser removidos
    $count = 0;

    // Guarda o index do elemento que deve ser removido
    $index = -1;

    for ($i = 1; $i < $arrayCount; $i++) {
        if ($array[$i - 1] >= $array[$i]) {
            $count++;
            $index = $i;
        }
    }

    if ($count > 1) {
        return '[' . implode(',', $array) . ']' . '  false</br>';
    }

    if ($count == 0) {
        return '[' . implode(',', $array) . ']' . '  true</br>';
    }

    if ($index == $arrayCount - 1 || $index == 1) {
        return '[' . implode(',', $array) . ']' . '  true</br>';
    }

    if ($array[$index - 1] < $array[$index + 1]) {
        return '[' . implode(',', $array) . ']' . '  true</br>';
    }

    if ($array[$index - 2] < $array[$index]) {
        return '[' . implode(',', $array) . ']' . '  true</br>';
    }

    return '[' . implode(',', $array) . ']' . '  false</br>';


}