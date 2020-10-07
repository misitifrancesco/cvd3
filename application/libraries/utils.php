<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Utils {

    public function dataEn2It($data_en) {
        $timestamp = strtotime($data_en);
        $data_it = date('d/m/Y', $timestamp);
        return $data_it;
    }

}
