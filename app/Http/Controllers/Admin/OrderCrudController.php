<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderCrudRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Orderadmin::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order');
        CRUD::setEntityNameStrings('order', 'orders');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        CRUD::column('number');
        $this->crud->setColumnDetails('number', ['label' => 'ID Pesanan']);
        CRUD::column('customer_name');
        $this->crud->setColumnDetails('customer_name', ['label' => 'Pembeli']);
        CRUD::column('customer_email');
        $this->crud->setColumnDetails('customer_email', ['label' => 'Email']);
        CRUD::column('customer_phone');
        $this->crud->setColumnDetails('customer_phone', ['label' => 'HP']);
        CRUD::column('item_name');
        $this->crud->setColumnDetails('item_name', ['label' => 'Produk']);
        CRUD::column('item_price');
        $this->crud->setColumnDetails('item_price', ['label' => 'Harga satuan']);
        CRUD::column('payment_status');
        $this->crud->setColumnDetails('payment_status', ['label' => 'Status']);
        CRUD::column('quantity');
        $this->crud->setColumnDetails('quantity', ['label' => 'Jumlah']);
        CRUD::column('snap_token');
        $this->crud->setColumnDetails('snap_token', ['label' => 'Token']);
        CRUD::column('total_price');
        $this->crud->setColumnDetails('total_price', ['label' => 'Total harga']);
        CRUD::column('receipt');
        $this->crud->setColumnDetails('receipt', ['label' => 'Struk']);
        CRUD::column('created_at');
        $this->crud->setColumnDetails('created_at', ['label' => 'Dibuat']);
        CRUD::column('updated_at');
        $this->crud->setColumnDetails('updated_at', ['label' => 'Diupdate']);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
        //$this->crud->enableExportButtons();
        $this->crud->disableResponsiveTable();
        $this->crud->removeButton('create');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(OrderCrudRequest::class);

        CRUD::field('payment_status');
        $this->crud->addField([
         
            'name'        => 'payment_status',
            'label'       => "Status Pembayaran",
            'type'        => 'select_from_array',
            'options'     => ['1' => 'Menunggu Pembayaran', '2' => 'Sudah dibayar', '3' => 'Kadaluarsa'],
            'allows_null' => false,
            'default'     => '1',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
