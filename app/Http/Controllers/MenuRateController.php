<?php

namespace App\Http\Controllers;

use App\DataTables\MenuRateDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMenuRateRequest;
use App\Http\Requests\UpdateMenuRateRequest;
use App\Repositories\MenuRateRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MenuRateController extends AppBaseController
{
    /** @var  MenuRateRepository */
    private $menuRateRepository;

    public function __construct(MenuRateRepository $menuRateRepo)
    {
        $this->menuRateRepository = $menuRateRepo;
    }

    /**
     * Display a listing of the MenuRate.
     *
     * @param MenuRateDataTable $menuRateDataTable
     * @return Response
     */
    public function index(MenuRateDataTable $menuRateDataTable)
    {
        return $menuRateDataTable->render('menu_rates.index');
    }

    /**
     * Show the form for creating a new MenuRate.
     *
     * @return Response
     */
    public function create()
    {
        return view('menu_rates.create');
    }

    /**
     * Store a newly created MenuRate in storage.
     *
     * @param CreateMenuRateRequest $request
     *
     * @return Response
     */
    public function store(CreateMenuRateRequest $request)
    {
        $input = $request->all();

        $menuRate = $this->menuRateRepository->create($input);

        Flash::success('Menu Rate saved successfully.');

        return redirect(route('menuRates.index'));
    }

    /**
     * Display the specified MenuRate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $menuRate = $this->menuRateRepository->findWithoutFail($id);

        if (empty($menuRate)) {
            Flash::error('Menu Rate not found');

            return redirect(route('menuRates.index'));
        }

        return view('menu_rates.show')->with('menuRate', $menuRate);
    }

    /**
     * Show the form for editing the specified MenuRate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $menuRate = $this->menuRateRepository->findWithoutFail($id);

        if (empty($menuRate)) {
            Flash::error('Menu Rate not found');

            return redirect(route('menuRates.index'));
        }

        return view('menu_rates.edit')->with('menuRate', $menuRate);
    }

    /**
     * Update the specified MenuRate in storage.
     *
     * @param  int              $id
     * @param UpdateMenuRateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMenuRateRequest $request)
    {
        $menuRate = $this->menuRateRepository->findWithoutFail($id);

        if (empty($menuRate)) {
            Flash::error('Menu Rate not found');

            return redirect(route('menuRates.index'));
        }

        $menuRate = $this->menuRateRepository->update($request->all(), $id);

        Flash::success('Menu Rate updated successfully.');

        return redirect(route('menuRates.index'));
    }

    /**
     * Remove the specified MenuRate from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $menuRate = $this->menuRateRepository->findWithoutFail($id);

        if (empty($menuRate)) {
            Flash::error('Menu Rate not found');

            return redirect(route('menuRates.index'));
        }

        $this->menuRateRepository->delete($id);

        Flash::success('Menu Rate deleted successfully.');

        return redirect(route('menuRates.index'));
    }
}
