<?php

namespace Source\App;

use Composer\Package\Loader\ValidatingArrayLoader;
use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\User;
use Source\Support\Message;
use Source\Support\Pager;

/**
 * Class App
 * @package Source\App
 */
class App extends Controller
{
    /** @var User */
    private $user;

    /**
     * App constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_APP . "/");

    }

    /**
     * APP HOME
     */
    public function home(): void
    {
        $head = $this->seo->render(
            "Olá Visitante. Vamos algoritmar? - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("home", [
            "head" => $head
        ]);
    }


    /**
     * APP LOGOUT
     */
    public function logout(): void
    {
        redirect("/");
    }

    /**
     * @param array|null $data
     * @return void
     */
    public function centuryYear(?array $data): void
    {
        $head = $this->seo->render(
            "Seculo Ano - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        $data = filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (!empty($data['year'])) {
            $json['result'] = year_to_century($data['year']);
            echo json_encode($json);
            return;
        }

        echo $this->view->render("seculo-ano", [
            "head" => $head,
            'data' => $data
        ]);
    }

    /**
     * @param array|null $data
     * @return void
     */
    public function primeNumbers(?array $data): void
    {
        $head = $this->seo->render(
            "Seculo Ano - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        $data = filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (!empty($data['first']) && !empty($data['last'])) {
            $json['result'] = prime_numbers($data['first'], $data['last']);
            echo json_encode($json);
            return;
        }

        echo $this->view->render("numeros-primos", [
            "head" => $head,
            'data' => $data
        ]);
    }

    /**
     * @param array|null $data
     * @return void
     */
    public function dontRepeat(?array $data): void
    {
        $head = $this->seo->render(
            "Gera array - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        $data = filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (!empty($data['generate'])) {
            $json['result'] = dont_repeat();
            echo json_encode($json);
            return;
        }

        echo $this->view->render("nao-repetidos", [
            "head" => $head,
            'data' => $data
        ]);
    }

    /**
     * @param array|null $data
     * @return void
     */
    public function increasingSequence(?array $data): void
    {
        $head = $this->seo->render(
            "Gera array - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        $data = filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (!empty($data['generate'])) {

            $string = '';
            for ($i = 1; $i < rand(1, 10); $i++) {
                $string .= rand() . ", ";
            }

            $array = explode(', ', $string);

            $json['result'] = increasing_sequence($array);
            echo json_encode($json);
            return;
        }

        echo $this->view->render("sequencia-crescente", [
            "head" => $head,
            'data' => $data
        ]);
    }


}