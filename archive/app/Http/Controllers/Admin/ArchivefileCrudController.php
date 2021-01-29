<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArchivefileRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ArchivefileCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ArchivefileCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    private function getFieldsData($show = FALSE) {
        return [
            [
                'name'=> 'archive_name',
                'label' => 'Name',
                'type'=> 'text'
            ],
            [
                'name' => 'description',
                'label' => 'Description',
                'type' => ($show ? "textarea": 'ckeditor'),
            ],
            [  // Select
                'label'     => "Event",
                'type'      => 'select',
                'name'      => 'event_id', // the db column for the foreign key
             
                // optional 
                // 'entity' should point to the method that defines the relationship in your Model
                // defining entity will make Backpack guess 'model' and 'attribute'
                'entity'    => 'event', 
             
                // optional - manually specify the related model and attribute
                'model'     => "App\Models\Event", // related model
                'attribute' => 'event_name', // foreign key attribute that is shown to user
             
                // optional - force the related options to be a custom query, instead of all();
                'options'   => (function ($query) {
                     return $query->orderBy('event_name', 'ASC')->get();
                 }), //  you can use this to filter the results show in the select
            ],
            [
                'label' => "File",
                'name' => "file_name",
                'type' => 'upload_multiple',
                'upload'    => true
            ]
        ];
    }
    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Archivefile::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/archivefile');
        CRUD::setEntityNameStrings('archivefile', 'archivefiles');

        $this->crud->addFields($this->getFieldsData());
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn(
            [
                'name' => 'id',
                'label' => 'ID',
                'type' => 'number'
            ]
        );
        CRUD::setFromDb(); // columns
        $this->crud->set('show.setFromDb', false);
        $this->crud->addColumns($this->getFieldsData(TRUE));
        CRUD::column('created_at');
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ArchivefileRequest::class);

        CRUD::setFromDb(); // fields

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

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);
        $this->crud->addColumns($this->getFieldsData(TRUE));
    }
}
