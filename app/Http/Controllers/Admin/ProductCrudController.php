<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Product');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product');
        $this->crud->setEntityNameStrings('product', 'products');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn(['name' => 'name', 'label' => 'Nombre']);
        $this->crud->addColumn(['name' => 'price', 'label' => 'Precio']);

        $this->crud->addColumn([
            'name' => 'image',
            'label' => 'Imagen',
            'type' => 'image',
            'prefix' => 'storage/',
            'height' => '60px',
            'width' => '60px',
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ProductRequest::class);

        $this->crud->addField([
            'name' => 'name',
            'label' => 'Nombre',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'description',
            'label' => 'Descripción',
            'type' => 'textarea',
        ]);

        $this->crud->addField([
            'name' => 'price',
            'label' => 'Precio',
            'type' => 'number',
            'attributes' => ["step" => "0.01"],
            'prefix' => '$',
        ]);

        $this->crud->addField([
            'name' => 'image',
            'label' => 'Imagen',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public', // usa el disco 'public'
        ]);
    }


    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->crud->addColumn([
            'name' => 'image',
            'type' => 'image',
            'label' => 'Image',
            'prefix' => 'storage/', // para que cargue desde /storage/
            'height' => '100px',
            'width' => '100px',
        ]);

        // Opcional: mostrar las otras columnas también
        $this->crud->addColumn(['name' => 'name', 'type' => 'text']);
        $this->crud->addColumn(['name' => 'description', 'type' => 'text']);
        $this->crud->addColumn(['name' => 'price', 'type' => 'number']);
    }



}
