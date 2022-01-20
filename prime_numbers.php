/**
 * NUMEROS PRIMOS
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
