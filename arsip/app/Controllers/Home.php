<?php

namespace App\Controllers;

use App\Models\Model_home;


class Home extends BaseController
{

    public function __construct()
    {
        $this->Model_home = new Model_home();
    }

    public function index()
    {
        $data = array(
            'title' => 'Home',
            'tot_suratmasuk' => $this->Model_home->tot_suratmasuk(),
            'tot_suratkeluar' => $this->Model_home->tot_suratkeluar(),
            'tot_kategori' => $this->Model_home->tot_kategori(),
            'tot_user' => $this->Model_home->tot_user(),
            'isi'   => 'v_home'

        );

        return view('layout/v_wrapper', $data);
    }
}
