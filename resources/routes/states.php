<?php

return [
    'admin/taxes/states'           => 'Anomaly\TaxesModule\Http\Controller\Admin\StatesController@index',
    'admin/taxes/states/choose'    => 'Anomaly\TaxesModule\Http\Controller\Admin\StatesController@choose',
    'admin/taxes/states/create'    => 'Anomaly\TaxesModule\Http\Controller\Admin\StatesController@create',
    'admin/taxes/states/edit/{id}' => 'Anomaly\TaxesModule\Http\Controller\Admin\StatesController@edit'
];
