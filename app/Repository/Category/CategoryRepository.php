<?php

namespace App\Repository\Category;

use App\Repository\Category\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface {

    public function getCategories() {

        return response() -> json([
            'status' => 'success',
            'categories' => Category::all()
        ], 200);

    }

    public function addCategory($request) {

        $category = Category::create($request -> only('name'));
        return response() -> json([
            'status' => 'success',
            'message' => 'Category created successfully',
            'category' => $category
        ], 201);

    }

    public function showCategory($CatID) {

        $category = Category::find($CatID);

        if ($category) {

            return response() -> json([
                'status' => 'success',
                'category' => $category
            ], 200);

        }

        return response() -> json([
            'status' => 'error',
            'message' => 'Category not found'
        ], 404);

    }

    public function updateCategory($request, $CatID) {

        $category = Category::find($CatID);

        if ($category) {

            $category -> update($request -> only('name'));
            return response() -> json([
                'status' => 'success',
                'message' => 'Category info updated successfully'
            ], 200);

        }

        return response() -> json([
            'status' => 'error',
            'message' => 'Category not found'
        ], 404);

    }

    public function deleteCategory($CatID) {

        $category = Category::find($CatID);

        if ($category) {

            $category -> delete();
            return response() -> noContent();

        }

        return response() -> json([
            'status' => 'error',
            'message' => 'Category not found'
        ], 404);

    }

}
