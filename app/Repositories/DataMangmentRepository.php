<?php

namespace App\Repositories;

use App\Models\Report;
use Illuminate\Support\Facades\Request;
  use App\Interface\DataMangmentInterface;
 
class DataMangmentRepository implements DataMangmentInterface
{
     public function index()
    {
        $data = Report::all();
        
        return $data;
    }


    public function store(array $data)
    {


        $Report = Report::create($data);

         
        return $Report;
    }



    public function show(string $id)
    {
        return Report::findOrFail($id);
    }


    public function update($id, array $data)
    {
        $Report = $this->show($id);
        $Report->update($data);
        return $Report;
    }



    public function destroy(string $id)
    {
        $Report = $this->show($id);


        $Report->delete();

        return response()->json(['success' => true, 'message' => 'Report item and its image deleted successfully.']);
    }

    public function restore($id){
         $Report = Report::withTrashed()->findOrFail($id);
        $Report->restore();
    }

    public function ShowDelete(){
         $deletedReports = Report::onlyTrashed()->get();
        
        return  $deletedReports;
         
    }
    public function force($id)
    {
         $Report = Report::withTrashed()->findOrFail($id);
           $Report->forceDelete();
    }
     
    public function restoreMultiple(array $ids)
    {
        Report::withTrashed()->whereIn('id', $ids)->restore();
        return response()->json(['message' => 'Records restored successfully.']);
    }

    public function forceDeleteMultiple(array $ids)
    {
        Report::withTrashed()->whereIn('id', $ids)->forceDelete();
        return response()->json(['message' => 'Records permanently deleted.']);
    }



  




     
}
