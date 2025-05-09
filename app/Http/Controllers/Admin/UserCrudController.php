<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Hash;

class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\User');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/user');
        $this->crud->setEntityNameStrings('user', 'users');
    }

    protected function setupListOperation()
    {
        CRUD::addColumn([
            'name'  => 'name',
            'label' => 'Nombre',
            'type'  => 'text',
        ]);

        CRUD::addColumn([
            'name'  => 'email',
            'label' => 'Correo',
            'type'  => 'email',
        ]);

        CRUD::addColumn([
            'name'     => 'roles',
            'type'     => 'select_multiple',
            'label'    => 'Roles',
            'entity'   => 'roles',
            'attribute'=> 'name',
            'model'    => "Spatie\Permission\Models\Role",
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);

        CRUD::addField([
            'name'  => 'name',
            'label' => 'Nombre',
            'type'  => 'text',
        ]);

        CRUD::addField([
            'name'  => 'email',
            'label' => 'Correo electrónico',
            'type'  => 'email',
        ]);

        CRUD::addField([
            'name'  => 'password',
            'label' => 'Contraseña',
            'type'  => 'password',
        ]);

        // Agregar campo de roles
        CRUD::addField([
            'label'     => 'Roles',
            'type'      => 'select2_multiple',
            'name'      => 'roles',
            'entity'    => 'roles',
            'model'     => "Spatie\Permission\Models\Role",
            'attribute' => 'name',
            'pivot'     => true,
        ]);

        // Agregar campo de permisos (opcional)
        CRUD::addField([
            'label'     => 'Permisos',
            'type'      => 'select2_multiple',
            'name'      => 'permissions',
            'entity'    => 'permissions',
            'model'     => "Spatie\Permission\Models\Permission",
            'attribute' => 'name',
            'pivot'     => true,
        ]);

        // Hook para encriptar la contraseña antes de guardar
        $this->crud->getRequest()->merge([
            'password' => Hash::make($this->crud->getRequest()->password),
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
