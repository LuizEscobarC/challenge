/**
 * SEQUENCIA CRESCENTE
 * @param array $array
 * @return string
 */
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
