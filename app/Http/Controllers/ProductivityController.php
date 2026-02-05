<?php

namespace App\Http\Controllers;

use App\Application\UseCases\ListProductivitiesUseCase\ListProductivitiesUseCase;
use Illuminate\Http\Request;

class ProductivityController extends Controller {
    private ListProductivitiesUseCase $listProductivitiesUseCase;

    public function __construct(ListProductivitiesUseCase $listProductivitiesUseCase) {
        $this->listProductivitiesUseCase = $listProductivitiesUseCase;
    }

    public function index(Request $request) {
        $page = $request->query('page', 1);

        $limit = $request->query('limit', 10);

        $productivities = $this->listProductivitiesUseCase->execute($page, $limit);

        return view('productivities.index')->with('productivities', $productivities);
    }
}