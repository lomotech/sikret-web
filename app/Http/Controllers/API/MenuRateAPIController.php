<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMenuRateAPIRequest;
use App\Http\Requests\API\UpdateMenuRateAPIRequest;
use App\Models\MenuRate;
use App\Repositories\MenuRateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MenuRateController
 * @package App\Http\Controllers\API
 */

class MenuRateAPIController extends AppBaseController
{
    /** @var  MenuRateRepository */
    private $menuRateRepository;

    public function __construct(MenuRateRepository $menuRateRepo)
    {
        $this->menuRateRepository = $menuRateRepo;
    }

    /**
     * Display a listing of the MenuRate.
     * GET|HEAD /menuRates
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->menuRateRepository->pushCriteria(new RequestCriteria($request));
        $this->menuRateRepository->pushCriteria(new LimitOffsetCriteria($request));
        $menuRates = $this->menuRateRepository->all();

        return $this->sendResponse($menuRates->toArray(), 'Menu Rates retrieved successfully');
    }

    /**
     * Store a newly created MenuRate in storage.
     * POST /menuRates
     *
     * @param CreateMenuRateAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMenuRateAPIRequest $request)
    {
        $input = $request->all();

        $menuRates = $this->menuRateRepository->create($input);

        return $this->sendResponse($menuRates->toArray(), 'Menu Rate saved successfully');
    }

    /**
     * Display the specified MenuRate.
     * GET|HEAD /menuRates/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MenuRate $menuRate */
        $menuRate = $this->menuRateRepository->findWithoutFail($id);

        if (empty($menuRate)) {
            return $this->sendError('Menu Rate not found');
        }

        return $this->sendResponse($menuRate->toArray(), 'Menu Rate retrieved successfully');
    }

    /**
     * Update the specified MenuRate in storage.
     * PUT/PATCH /menuRates/{id}
     *
     * @param  int $id
     * @param UpdateMenuRateAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMenuRateAPIRequest $request)
    {
        $input = $request->all();

        /** @var MenuRate $menuRate */
        $menuRate = $this->menuRateRepository->findWithoutFail($id);

        if (empty($menuRate)) {
            return $this->sendError('Menu Rate not found');
        }

        $menuRate = $this->menuRateRepository->update($input, $id);

        return $this->sendResponse($menuRate->toArray(), 'MenuRate updated successfully');
    }

    /**
     * Remove the specified MenuRate from storage.
     * DELETE /menuRates/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MenuRate $menuRate */
        $menuRate = $this->menuRateRepository->findWithoutFail($id);

        if (empty($menuRate)) {
            return $this->sendError('Menu Rate not found');
        }

        $menuRate->delete();

        return $this->sendResponse($id, 'Menu Rate deleted successfully');
    }
}
