<?php


Route::get('/', function () {
    return view('home');
});

Route::get('/getLogin', function () {
    return view('Auth/formLogin');
});
Route::get('/getLogout', 'VisiteurController@signOut');
Route::post('/login', 'VisiteurController@signIn');

Route::get('/ListeMedicaments', 'MedicamentController@ListerMedicaments')->name('ListerMedicaments');
Route::get('/ListeInteractions', 'InteractionController@ListerInteractions')->name('ListeInteractions');

Route::get('/getAjoutInteraction', 'InteractionController@ajoutInteraction');
Route::post('/postAjoutInteraction', ['as' => 'postAjoutInteraction', 'uses' => 'InteractionController@postAjoutInteraction']);

Route::get('/getModifInteraction/{idM}/{idP}', 'InteractionController@modificationInteraction');
Route::post('/postModifInteraction', ['as' => 'postModifInteraction', 'uses' => 'InteractionController@postModifierInteraction']);

Route::get('/SupprimInteraction/{idM}/{idP}', 'InteractionController@suppressionInteractions');

Route::get('/getInteractionsMed/{idM}', 'MedicamentController@getInteractionsMed');
Route::post('/postRechercheMed', ['as' => 'postRechercheMed', 'uses' => 'MedicamentController@postRechercheMed']);

Route::get('/ListeComposants', 'MedicamentController@ListerComposants');
Route::post('/postListerComposants', ['as' => 'postListerComposants', 'uses' => 'MedicamentController@postListerComposants']);

Route::get('/ListeMedNonPresc', 'MedicamentController@ListerMedNonPresc');
