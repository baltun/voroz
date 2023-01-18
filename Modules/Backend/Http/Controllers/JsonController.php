<?php

namespace Modules\Backend\Http\Controllers;

use Modules\Backend\Http\Requests\CreateJsonRequest;
use Modules\Backend\Http\Requests\UpdateJsonRequest;
use App\Http\Controllers\AppBaseController;
use Modules\Backend\Repositories\JsonRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class JsonController extends AppBaseController
{
    /** @var JsonRepository $jsonRepository*/
    private $jsonRepository;

    public function __construct(JsonRepository $jsonRepo)
    {
        $this->jsonRepository = $jsonRepo;
    }

    /**
     * Display a listing of the Json.
     */
    public function index(Request $request)
    {
        $jsons = $this->jsonRepository->paginate(10);

        return view('backend::jsons.index')
            ->with('jsons', $jsons);
    }

    /**
     * Show the form for creating a new Json.
     */
    public function create()
    {
        return view('backend::jsons.create');
    }

    /**
     * Store a newly created Json in storage.
     */
    public function store(CreateJsonRequest $request)
    {
        $input = $request->all();

        $json = $this->jsonRepository->create($input);

        Flash::success('Json saved successfully.');

        return redirect(route('jsons.index'));
    }

    /**
     * Display the specified Json.
     */
    public function show($id)
    {
        $json = $this->jsonRepository->find($id);

        if (empty($json)) {
            Flash::error('Json not found');

            return redirect(route('jsons.index'));
        }

        return view('backend::jsons.show')->with('json', $json);
    }

    /**
     * Show the form for editing the specified Json.
     */
    public function edit($id)
    {
        $json = $this->jsonRepository->find($id);

        if (empty($json)) {
            Flash::error('Json not found');

            return redirect(route('jsons.index'));
        }

        return view('backend::jsons.edit')->with('json', $json);
    }

    /**
     * Update the specified Json in storage.
     */
    public function update($id, UpdateJsonRequest $request)
    {
        $json = $this->jsonRepository->find($id);

        if (empty($json)) {
            Flash::error('Json not found');

            return redirect(route('jsons.index'));
        }

        $json = $this->jsonRepository->update($request->all(), $id);

        Flash::success('Json updated successfully.');

        return redirect(route('jsons.index'));
    }

    /**
     * Remove the specified Json from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $json = $this->jsonRepository->find($id);

        if (empty($json)) {
            Flash::error('Json not found');

            return redirect(route('jsons.index'));
        }

        $this->jsonRepository->delete($id);

        Flash::success('Json deleted successfully.');

        return redirect(route('jsons.index'));
    }
}
