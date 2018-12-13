<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use \Firebase\JWT\JWT;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!isset($_POST['name'])) 
        {
            return $this->error(401, 'Debes rellenar todos los campos');
        }
        $name = $_POST['name'];
        if ($this->isUserLogged)
        {
            try
            {
                $categories = new Category();
                $categories->name = $name;
                $categories->save();
            }
            catch(Exception $e)
            {
                return $this->error(402, $e->getMessage());
            }
            
            return $this->error(200, 'Categoria creada');
        }
            
        else
        {
            return $this->error(401, 'Debes rellenar todos los campos');
        }
       // if ($this->isUserLogged) 
       //  {
       //      $userLogged = $this->isUserLogged();
       //      $category = new Category();
       //      $category->CategoryName = $request->CategoryName;
       //      $category->user_id = $userLogged->id;
       //      $category->save();
       //      $data = ['category' => $category->CategoryName];
       //      return $this->succes('Categoría creada', $data);
       //  }
       //  else
       //  {
       //      return $this->error(401, "No tienes permisos");
       //  }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
