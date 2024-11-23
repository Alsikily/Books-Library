<?php

namespace App\Http\Controllers;

// Requests
use App\Http\Requests\addCategoryRequest;
use App\Http\Requests\updateCategoryRequest;

use App\Repository\Category\CategoryInterface;

class CategoryController extends Controller {

    private $CategoryRepo;

    public function __construct(CategoryInterface $CategoryRepo) {
        $this -> CategoryRepo = $CategoryRepo;
    }

    public function index() {
        return $this -> CategoryRepo -> getCategories();
    }

    public function store(addCategoryRequest $request) {
        return $this -> CategoryRepo -> addCategory($request);
    }

    public function show($CatID) {
        return $this -> CategoryRepo -> showCategory($CatID);
    }

    public function update(updateCategoryRequest $request, $CatID) {
        return $this -> CategoryRepo -> updateCategory($request, $CatID);
    }

    public function destroy($CatID) {
        return $this -> CategoryRepo -> deleteCategory($CatID);
    }

}
