/**
 * NÃO REPETIR
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
