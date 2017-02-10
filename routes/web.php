<?php

Auth::routes();

//CLIENTES---------------------------------------------------
Route::get('/cliente', ['uses'=>'ClienteController@index','as'=>'cliente.index']);
Route::get('/cliente/adicionar', ['uses'=>'ClienteController@adicionar','as'=>'cliente.adicionar']);
Route::post('/cliente/salvar', ['uses'=>'ClienteController@salvar','as'=>'cliente.salvar']);
Route::get('/cliente/editar/{id}', ['uses'=>'ClienteController@editar','as'=>'cliente.editar']);
Route::put('/cliente/atualizar/{id}', ['uses'=>'ClienteController@atualizar','as'=>'cliente.atualizar']);
Route::get('/cliente/deletar/{id}', ['uses'=>'ClienteController@deletar','as'=>'cliente.deletar']);
Route::get('cliente/detalhe/{id}', ['uses'=>'ClienteController@detalhe', 'as'=>'cliente.detalhe']);


//TELEFONES---------------------------------------------------
Route::get('telefone/adicionar/{id}', ['uses'=>'TelefoneController@adicionar','as'=>'telefone.adicionar']);
Route::post('telefone/salvar/{id}', ['uses'=>'TelefoneController@salvar','as'=>'telefone.salvar']);
Route::get('/telefone/editar/{id}', ['uses'=>'TelefoneController@editar','as'=>'telefone.editar']);
Route::put('/telefone/atualizar/{id}', ['uses'=>'TelefoneController@atualizar','as'=>'telefone.atualizar']);
Route::get('/telefone/deletar/{id}', ['uses'=>'TelefoneController@deletar','as'=>'telefone.deletar']);



//PERFIL
Route::get('painel/', ['uses'=>'PerfilController@index', 'as'=>'perfil.index']);
Route::get('painel/perfil/email/editar/', ['uses'=>'PerfilController@editaremail', 'as'=>'perfil.editaremail']);
Route::put('painel/perfil/email/atualizar/{id}', ['uses'=>'PerfilController@atualizaremail', 'as'=>'perfil.atualizaremail']);
Route::get('painel/perfil/senha/editar', ['uses'=>'PerfilController@editarsenha', 'as'=>'perfil.editarsenha']);
Route::put('painel/perfil/senha/atualizar/{id}', ['uses'=>'PerfilController@atualizarsenha', 'as'=>'perfil.atualizarsenha']);
Route::post('/painel/perfil/avatar/atualizar', ['uses'=>'PerfilController@atualizaravatar','as'=>'perfil.atualizaravatar']);




//PAINEL
Route::get('painel/registro', ['uses'=>'UsuarioController@registro', 'as'=>'perfil.registro']);
Route::post('painel/registro/salvar', ['uses'=>'UsuarioController@salvar', 'as'=>'perfil.registro.salvar']);
Route::get('painel/usuario/editar/{id}', ['uses'=>'UsuarioController@editar', 'as'=>'usuario.editar']);
Route::put('painel/usuario/atualizar/{id}', ['uses'=>'UsuarioController@atualizar', 'as'=>'usuario.atualizar']);
Route::get('painel/usuario/senha/editar/{id}', ['uses'=>'UsuarioController@editarsenha', 'as'=>'usuario.editarsenha']);
Route::put('painel/usuario/senha/atualizar/{id}', ['uses'=>'UsuarioController@atualizarsenha', 'as'=>'usuario.atualizarsenha']);
Route::get('painel/usuario/deletar/{id}', ['uses'=>'UsuarioController@deletar','as'=>'usuario.deletar']);


//ACESSOS DE USUARIOS----------------------------------------------
Route::get('painel/usuario/editar/acesso/{id}', ['uses'=>'UsuarioController@editaracesso', 'as'=>'usuario.acesso']);
Route::put('painel/usuario/atualizar/acesso/{id}', ['uses'=>'UsuarioController@atualizaacesso', 'as'=>'usuario.atualizaacesso']);
Route::get('painel/usuario/atualizar/deletar/{id}/{role_id}', ['uses'=>'UsuarioController@deletaracesso', 'as'=>'usuario.deletaracesso']);
Route::get('painel/usuarios/', ['uses'=>'UsuarioController@index', 'as'=>'usuario.index']);


//POSTAGENS
Route::get('painel/postagens', ['uses'=>'PostController@index', 'as'=>'postagens.index']);
Route::get('painel/postagens/adicionar', ['uses'=>'PostController@adicionar','as'=>'postagem.adicionar']);
Route::post('painel/postagens/salvar/{id}', ['uses'=>'PostController@salvar','as'=>'postagem.salvar']);
Route::get('painel/postagens/editar/{id}', ['uses'=>'PostController@editar', 'as'=>'postagem.editar']);
Route::put('painel/postagens/atualizar/{id}', ['uses'=>'PostController@atualizar', 'as'=>'postagem.atualizar']);
Route::get('painel/postagens/deletar/{id}', ['uses'=>'PostController@deletar','as'=>'postagem.deletar']);

//POSTAGENS PRINCIPAIS
Route::get('painel/postagens/principal', ['uses'=>'PostController@indexprincipal', 'as'=>'postagemprincipal.index']);
Route::get('painel/postagens/principal/adicionar', ['uses'=>'PostController@adicionarprincipal','as'=>'postagemprincipal.adicionar']);
Route::post('painel/postagens/principal/salvar', ['uses'=>'PostController@salvarprincipal', 'as'=>'postagemprincipal.salvar']);
Route::get('painel/postagens/principal/editar/{id}', ['uses'=>'PostController@editarprincipal', 'as'=>'postagemprincipal.editar']);
Route::get('painel/postagens/principal/deletar/{id}', ['uses'=>'PostController@deletarprincipal','as'=>'postagemprincipal.deletar']);
Route::put('painel/postagens/principal/atualizar/{id}', ['uses'=>'PostController@atualizarprincipal', 'as'=>'postagemprincipal.atualizar']);


//OCORRENCIAS DE PONTO
Route::get('painel/ocorrencias', ['uses'=>'OcorrenciasController@index', 'as'=>'ocorrencias.index']);


//CONTRACHEQUES
Route::get('painel/contracheques/usuarios', ['uses'=>'ContrachequeController@index', 'as'=>'contracheque.index']);
Route::post('painel/contracheques/salva', ['uses'=>'ContrachequeController@salva', 'as'=>'contracheque.salva']);
Route::get('painel/contracheques/lista', ['uses'=>'ContrachequeController@lista', 'as'=>'contracheque.lista']);
Route::get('painel/contracheques/download/{id}', ['uses'=>'ContrachequeController@download', 'as'=>'contracheque.download']);
Route::get('painel/contracheques/lista/envios/{id}', ['uses'=>'ContrachequeController@envios', 'as'=>'contracheque.envios']);
Route::get('painel/contracheques/lista/delete/{id}', ['uses'=>'ContrachequeController@delete', 'as'=>'contracheque.delete']);


//FORMULARIOS E ENQUETES
Route::get('painel/forms/', ['uses'=>'FormController@index', 'as'=>'form.index']);
Route::get('painel/forms/detalhes/{id}', ['uses'=>'FormController@detalhes', 'as'=>'form.detalhes']);
Route::get('painel/enquetes/', ['uses'=>'FormController@enqueteindex', 'as'=>'enquete.index']);
Route::get('painel/enquetes/detalhes/{id}', ['uses'=>'FormController@enquetedetalhes', 'as'=>'enquete.detalhes']);





//HOME--------------------------------------------------------------
Route::get('/', ['uses' => 'HomeController@index', 'as'=>'home.index']);
Route::get('/postagem/{id}', ['uses' => 'HomeController@postagem', 'as'=>'home.postagem']);
Route::get('/permissoes', ['uses' => 'HomeController@permissoes', 'as'=>'home.permissoes']);
Route::post('/enquete/salvar/{id}', ['uses' => 'HomeController@salvarenquete', 'as'=>'enquete.salvar']);
Route::post('/formulario/salvar/{id}', ['uses' => 'HomeController@salvarformulario', 'as'=>'formulario.salvar']);


