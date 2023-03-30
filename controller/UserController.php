<?php

require_once('../model/user.php');
require_once('../model/userService.php');
require_once('../phpconnectmongodb.php');




class userController
{
    private $userService;
    public function __construct()
    {
        $this->userService = new userService();
    }
    public function getAllProductIndex()
    {
        return $this->userService->getAll();
    }
    public function getById($id)
    {

        return $this->userService->findOneId($id);
    }
    public function countById()
    {

        $total = $this->userService->countuser();

        return $total;
    }
}
