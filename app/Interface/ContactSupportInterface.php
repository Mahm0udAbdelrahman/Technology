<?php

namespace App\Interface;

interface ContactSupportInterface
{
    public function getAll();

    public function store(array $data);
}