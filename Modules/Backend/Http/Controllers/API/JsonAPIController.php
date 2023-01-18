<?php

namespace Modules\Backend\Http\Controllers\API;

use Modules\Backend\Http\Requests\API\CreateJsonAPIRequest;
use Modules\Backend\Http\Requests\API\UpdateJsonAPIRequest;
use Modules\Backend\Entities\Json;
use Modules\Backend\Repositories\JsonRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\Backend\Http\Resources\JsonResource;

/**
 * Class JsonAPIController
 */
class JsonAPIController extends AppBaseController
{
    /** @var  JsonRepository */
    private $jsonRepository;

    public function __construct(JsonRepository $jsonRepo)
    {
        $this->jsonRepository = $jsonRepo;
    }

    /**
     * Display a listing of the Jsons.
     * GET|HEAD /jsons
     */
    public function index(Request $request): JsonResponse
    {
        $jsons = $this->jsonRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(JsonResource::collection($jsons), 'Jsons retrieved successfully');
    }

    /**
     * Store a newly created Json in storage.
     * POST /jsons
     */
    public function store(CreateJsonAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $json = $this->jsonRepository->create($input);

        return $this->sendResponse(new JsonResource($json), 'Json saved successfully');
    }

    /**
     * Display the specified Json.
     * GET|HEAD /jsons/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Json $json */
        $json = $this->jsonRepository->find($id);

        if (empty($json)) {
            return $this->sendError('Json not found');
        }

        return $this->sendResponse(new JsonResource($json), 'Json retrieved successfully');
    }

    /**
     * Update the specified Json in storage.
     * PUT/PATCH /jsons/{id}
     */
    public function update($id, UpdateJsonAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Json $json */
        $json = $this->jsonRepository->find($id);

        if (empty($json)) {
            return $this->sendError('Json not found');
        }

        $json = $this->jsonRepository->update($input, $id);

        return $this->sendResponse(new JsonResource($json), 'Json updated successfully');
    }

    /**
     * Remove the specified Json from storage.
     * DELETE /jsons/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Json $json */
        $json = $this->jsonRepository->find($id);

        if (empty($json)) {
            return $this->sendError('Json not found');
        }

        $json->delete();

        return $this->sendSuccess('Json deleted successfully');
    }
}
