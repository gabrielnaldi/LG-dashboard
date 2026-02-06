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

        $filter = $request->query('product', null);

        $output = $this->listProductivitiesUseCase->execute($page, $limit, $filter);

        return view('productivities.index', compact('output', 'filter'));
    }
}