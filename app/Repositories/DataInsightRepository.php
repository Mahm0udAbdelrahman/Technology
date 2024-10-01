<?php

namespace App\Repositories;

use App\Models\Chart;
use App\Models\DataInsight;
use App\Mail\MailDataInsight;
use App\Events\NotificationEvent;
use App\Models\InsightTechnology;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Interface\DataInsightInterface;

class DataInsightRepository implements DataInsightInterface
{
     public function index()
    {
        $data = DataInsight::all();
        
        return $data;
    }


    public function store($data)
    {
         $dataInsight = DataInsight::create($data);
     
         if (isset($data['technology_id']) && is_array($data['technology_id'])) {
            foreach ($data['technology_id'] as $techId) {
                 $dataInsight->technologies()->syncWithoutDetaching($techId);
            }
        }
         
    
         $charts = [];
        if (isset($data['charts']) && is_array($data['charts'])) {
            foreach ($data['charts'] as $chart) {
                if (isset($chart['series']) && is_array($chart['series'])) {
                    foreach ($chart['series'] as $data) {
                        $datas[] = [
                            'name' => $data['name'],
                            'data' => $data['data'],
                        ];
                    }
                }

                if (isset($chart['categories']) && is_array($chart['categories'])) {
                    $datas = [];  
                    foreach ($chart['categories'] as $data) {
                        $datas[] = $data;  
                    }
                }
     
                 $chart['data_insight_id'] = $dataInsight->id;
                $charts[] = Chart::create($chart);
            }
        }
             
        return $dataInsight;
    }
    



    public function show(string $id)
    {
        return DataInsight::findOrFail($id);
    }


    public function update($id, $data)
    {
        // Find the existing DataInsight record
        $dataInsight = DataInsight::findOrFail($id);
    
        // Update the DataInsight record with new data
        $dataInsight->update($data);
    
        // Update technologies relationship
        if (isset($data['technology_id']) && is_array($data['technology_id'])) {
            $dataInsight->technologies()->sync($data['technology_id']);
        }
    
        // Update charts relationship
        $charts = [];
        if (isset($data['charts']) && is_array($data['charts'])) {
            foreach ($data['charts'] as $chart) {
                if (isset($chart['series']) && is_array($chart['series'])) {
                    $datas = [];
                    foreach ($chart['series'] as $series) {
                        $datas[] = [
                            'name' => $series['name'],
                            'data' => $series['data'],
                        ];
                    }
                    $chart['series'] = $datas;
                }
    
                if (isset($chart['categories']) && is_array($chart['categories'])) {
                    $datas = [];
                    foreach ($chart['categories'] as $category) {
                        $datas[] = $category;
                    }
                    $chart['categories'] = $datas;
                }
    
                $chart['data_insight_id'] = $dataInsight->id;
    
                // Find existing chart or create a new one
                if (isset($chart['id'])) {
                    $existingChart = Chart::find($chart['id']);
                    if ($existingChart) {
                        $existingChart->update($chart);
                        $charts[] = $existingChart;
                    } else {
                        $charts[] = Chart::create($chart);
                    }
                } else {
                    $charts[] = Chart::create($chart);
                }
            }
        }
    
        return $dataInsight;
    }
    
    


   
    
    

    public function destroy($id)
    {
            $dataInsight = DataInsight::find($id);

            if ($dataInsight) {
                $dataInsight->technologies()->detach();

                Chart::where('data_insight_id', $dataInsight->id)->delete();

                $dataInsight->delete();

                return response()->json(['message' => 'DataInsight deleted successfully.'], 200);
            } else {
                return response()->json(['message' => 'DataInsight not found.'], 404);
            }
    }

    
}
