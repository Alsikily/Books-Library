<?php

namespace App\Repository\Category;

interface CategoryInterface {

    public function getCategories();
    public function addCategory($request);
    public function showCategory($CatID);
    public function updateCategory($request, $CatID);
    public function deleteCategory($CatID);

}
