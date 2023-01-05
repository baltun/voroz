<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Frontend\DTO\JsonDTO;
use Modules\Frontend\DTO\MetricsDTO;
use Modules\Frontend\Repositories\JsonRepository;
use Modules\Frontend\Services\MetricsService;

class JsonCreationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('frontend::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('frontend::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $jsonApiRequest
     * @return Renderable
     */
    public function store(Request $jsonApiRequest, MetricsService $metricsService, JsonRepository $jsonRepository, JsonDTO $jsonDTO)
    {
        $metrics = $metricsService->startCheckpoint();

        $jsonDTO->fromJsonApiRequest($jsonApiRequest);
        $jsonDTO = $jsonRepository->create($jsonDTO);

        $metrics = $metricsService->endCheckpoint($metrics);

        $responseJsonApiObject = [
            'data' => [
                'newRecordId' => $jsonDTO->id,
            ],
            'meta' => $metrics
        ];

        return $responseJsonApiObject;
    }



    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('frontend::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('frontend::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
