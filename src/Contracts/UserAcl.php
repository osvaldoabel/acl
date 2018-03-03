<?php 

namespace YaniPHP\Acl\Contracts;

interface UserAcl
{
    public function getId() : int;
    public function getRole() : string;
}