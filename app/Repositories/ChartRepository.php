<?php

namespace App\Repositories;

use App\Models\Chart;
use App\Mail\MailContact;
use App\Events\NotificationEvent;
use App\Interface\ChartInterface;
use Illuminate\Support\Facades\Mail;

class ChartRepository implements ChartInterface
{
     public function index()
    {
        $data = Chart::all();
        
        return $data;
    }


    public function store(array $data)
    {
        $charts = [];
        foreach ($data['charts'] as $chart) {

            if (isset($chart['series']) && is_string($chart['series'])) {
                $chart['series'] = json_decode($chart['series'], JSON_UNESCAPED_SLASHES);
            }
            if (isset($chart['categories']) && is_string($chart['categories'])) {
                $chart['categories'] = json_decode($chart['categories'], JSON_UNESCAPED_SLASHES);
            }

            $charts[] = Chart::create($chart);
        }
        return $charts;
    }




    public function show(string $id)
    {
        return Chart::findOrFail($id);
    }


    public function update($id, array $data)
    {
        $charts = [];
    foreach ($data['charts'] as $chart) {
        if (isset($chart['series']) && is_string($chart['series'])) {
            $chart['series'] = json_decode($chart['series'], JSON_UNESCAPED_SLASHES);
        }
        if (isset($chart['categories']) && is_string($chart['categories'])) {
            $chart['categories'] = json_decode($chart['categories'], JSON_UNESCAPED_SLASHES);
        }

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

    return $charts;
    }



    public function destroy(string $id)
    {
        $RealTime = Chart::findOrFail($id);


        $RealTime->delete();

        return response()->json(['success' => true, 'message' => 'Chart item and its image deleted successfully.']);
    }
}
