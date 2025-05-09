<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReservationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReservationsExport;



/**
 * Class ReservationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ReservationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Reservation');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/reservation');
        $this->crud->setEntityNameStrings('reservation', 'reservations');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->addColumn([
            'name' => 'user.name',
            'label' => 'Usuario',
            'type' => 'text',
        ]);
    
        $this->crud->addColumn([
            'name' => 'space.name',
            'label' => 'Espacio',
            'type' => 'text',
        ]);
    
        $this->crud->addColumn([
            'name' => 'start_time',
            'label' => 'Inicio',
            'type' => 'datetime',
        ]);
    
        $this->crud->addColumn([
            'name' => 'end_time',
            'label' => 'Fin',
            'type' => 'datetime',
        ]);
    
        $this->crud->addColumn([
            'name' => 'status',
            'label' => 'Estado',
            'type' => 'text',
        ]);
    
        // Botón de exportar
        $this->crud->addButtonFromModelFunction('top', 'export', 'exportExcelButton', 'beginning');

        
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ReservationRequest::class);

    $this->crud->addField([
        'label'     => 'Usuario',
        'type'      => 'select',
        'name'      => 'user_id',
        'entity'    => 'user',
        'model'     => 'App\Models\User',
        'attribute' => 'name', // usa 'email' si tu modelo User no tiene 'name'
    ]);

    $this->crud->addField([
        'label'     => 'Espacio',
        'type'      => 'select',
        'name'      => 'space_id',
        'entity'    => 'space',
        'model'     => 'App\Models\Space',
        'attribute' => 'name',
    ]);

    $this->crud->addField([
        'name'  => 'start_time',
        'label' => 'Fecha y hora de inicio',
        'type'  => 'datetime_picker',
        'datetime_picker_options' => [
            'format' => 'YYYY-MM-DD HH:mm:ss',
        ],
    ]);

    $this->crud->addField([
        'name'  => 'end_time',
        'label' => 'Fecha y hora de fin',
        'type'  => 'datetime_picker',
        'datetime_picker_options' => [
            'format' => 'YYYY-MM-DD HH:mm:ss',
        ],
    ]);

    $this->crud->addField([
        'name'    => 'status',
        'label'   => 'Estado',
        'type'    => 'select_from_array',
        'options' => [
            'pendiente'   => 'Pendiente',
            'confirmada'  => 'Confirmada',
            'cancelada'   => 'Cancelada',
        ],
        'default' => 'pendiente',
    ]);
    $this->crud->addButton('top', 'export', 'link', url('admin/reservation/export'));
    }
   
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function export()
    {
        return Excel::download(new ReservationsExport, 'reservas.xlsx');
    }
}
