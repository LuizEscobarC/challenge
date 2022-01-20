/**
 * ANO PARA SECULO
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
