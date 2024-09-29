<?php
namespace App\Interface;

 


interface ContactInterface
{

    public function index();

    public function store(array $data);

    public function show(string $id);

    public function update($id, array $data) ;

    public function destroy(string $id);
}
