<?php
namespace App\Interface;

use App\Helpers\ApiResource;

 


interface DataMangmentInterface
{

    public function index();

    public function store(array $data);

    public function show(string $id);

    public function update($id, array $data) ;

    public function destroy(string $id);

    public function restore($id);
    public function ShowDelete();
    public function force($id);

    public function restoreMultiple(array $ids);

    public function forceDeleteMultiple(array $ids);

}
