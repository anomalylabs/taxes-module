<?php

return [
    'admin/taxes/states/{country}'           => 'Anomaly\TaxesModule\Http\Controller\Admin\StatesController@index',
    'admin/taxes/states/{country}/create'    => 'Anomaly\TaxesModule\Http\Controller\Admin\StatesController@create',
    'admin/taxes/states/{country}/edit/{id}' => 'Anomaly\TaxesModule\Http\Controller\Admin\StatesController@edit'
];
