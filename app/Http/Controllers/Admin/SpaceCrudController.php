<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SpaceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SpaceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SpaceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Space');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/space');
        $this->crud->setEntityNameStrings('space', 'spaces');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->addColumn([
            'name' => 'zone.name',
            'label' => 'Zona',
            'type' => 'text',
        ]);
    
        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Nombre',
            'type' => 'text',
        ]);
    
        $this->crud->addColumn([
            'name' => 'capacity',
            'label' => 'Capacidad',
            'type' => 'number',
        ]);
    
        $this->crud->addColumn([
            'name' => 'status',
            'label' => 'Estado',
            'type' => 'text',
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(SpaceRequest::class);

        $this->crud->addField([
            'label'     => 'Zona',
            'type'      => 'select',
            'name'      => 'zone_id', // clave foránea
            'entity'    => 'zone',    // nombre del método en el modelo Space
            'model'     => 'App\Models\Zone',
            'attribute' => 'name',
        ]);
    
        $this->crud->addField([
            'name'  => 'name',
            'label' => 'Nombre del Espacio',
            'type'  => 'text',
        ]);
    
        $this->crud->addField([
            'name'  => 'capacity',
            'label' => 'Capacidad',
            'type'  => 'number',
        ]);
    
        $this->crud->addField([
            'name' => 'status',
            'label' => 'Estado',
            'type' => 'select_from_array',
            'options' => [
                'available' => 'Disponible',
                'unavailable' => 'No disponible',
            ],
            'allows_null' => false,
            'default' => 'available',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
