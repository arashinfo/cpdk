<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Arashinfo\Cpdk;

/**
 * Description of Request
 *
 * @author gurjeet
 */
class Request {

    //put your code here
    private $post;
    private $get;
    private $request;

    public function __construct() {
        if (isset($_POST)) {
            $this->post = (object) $_POST;
        } else {
            $this->post = NULL;
        }
        if (isset($_GET)) {
            $this->get = (object) $_GET;
        } else {
            $this->get = NULL;
        }
        if (isset($_REQUEST)) {
            $this->request = (object) $_REQUEST;
        } else {
            $this->request = NULL;
        }
    }

    public function getPost() {
        return $this->post;
    }

    public function getGet() {
        return $this->get;
    }

    public function getRequest() {
        return $this->request;
    }

}
