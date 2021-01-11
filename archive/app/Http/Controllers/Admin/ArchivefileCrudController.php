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
            // [
            //     'name' => 'file_name',
            //     'label' => 'Upload File',
            //     'type' => 'text',
            // ],
            [
                'name' => 'event_id',
                'label' => 'Event',
                'type' => 'number',
            ],
            [   // Upload
                'name'      => 'file_name',
                'label'     => 'Files',
                'type'      => 'upload_multiple',
                'upload'    => true,
                'disk'      => 'uploads', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
                // // optional:
                // 'temporary' => 10 // if using a service, such as S3, that requires you to make temporary URLs this will make a URL that is valid for the number of minutes specified
            ]
//             [    // Select2Multiple = n-n relationship (with pivot table)
//                 'label'     => "Event",
//                 'type'      => ($show ? "select": 'select2_multiple'),
//                 'name'      => 'event', // the method that defines the relationship in your Model
// // optional
//                 'entity'    => 'event', // the method that defines the relationship in your Model
//                 'model'     => "App\Models\Event", // foreign key model
//                 'attribute' => 'event_name', // foreign key attribute that is shown to user
//             ]
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
        // by default the Show operation will try to show all columns in the db table,
        // but we can easily take over, and have full control of what columns are shown,
        // by changing this config for the Show operation
        $this->crud->set('show.setFromDb', false);
        $this->crud->addColumns($this->getFieldsData(TRUE));
    }
}
