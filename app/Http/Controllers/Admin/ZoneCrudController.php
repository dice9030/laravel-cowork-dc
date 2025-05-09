<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ZoneRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ZoneCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ZoneCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Zone');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/zone');
        $this->crud->setEntityNameStrings('zone', 'zones');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->setFromDb();

        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Nombre de la Zona',
            'type' => 'text',
        ]);
        
        $this->crud->addColumn([
            'name' => 'type',
            'label' => 'Tipo de Zona',
            'type' => 'text',
        ]);
        
        $this->crud->addColumn([
            'name' => 'description',
            'label' => 'Descripción',
            'type' => 'text',
        ]);
        
       $this->crud->addColumn([
            'name' => 'img',
            'type' => 'image',
            'label' => 'Imagen',
            'prefix' => 'storage/',
            'height' => '100px',
            'width' => '100px',
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(ZoneRequest::class);

        CRUD::addField([
            'name' => 'name',
            'label' => 'Nombre de la Zona',
            'type' => 'text',
        ]);
    
        CRUD::addField([
            'name' => 'type',
            'label' => 'Tipo de Zona',
            'type' => 'select_from_array',
            'options' => [
                'individual' => 'Individual',
                'compartida' => 'Compartida',
                'reunion' => 'Reunión',
                'descanso' => 'Descanso',
                'comedor' => 'Comedor',
                'exterior' => 'Exterior',
            ],
            'allows_null' => false,
            'default' => 'individual',
        ]);
    
        CRUD::addField([
            'name' => 'description',
            'label' => 'Descripción',
            'type' => 'textarea',
        ]);

      CRUD::addField([
            'name' => 'img',
            'label' => 'Imagen',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public',
        ]);

        
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Nombre de la Zona',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'type',
            'label' => 'Tipo de Zona',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'description',
            'label' => 'Descripción',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'img',
            'label' => 'Imagen',
            'type' => 'image',
            'prefix' => 'storage/',
            'height' => '200px',
            'width' => 'auto',
        ]);
    }
    
}
