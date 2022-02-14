<?php

use App\Http\Controllers\Admin\{
    AdminController,
    CatPostController,    
    PlanController,
    PostController,
    UserController
};
use App\Http\Controllers\Admin\ACL\{    
    PerfilController,
    PermissionController,
    PermissionPerfilController,
    PlanProfileController
};
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Web', 'as' => 'web.'], function () {

    Route::get('/', [WebController::class, 'home'])->name('home');

    Route::get('cliente/cadastro', [RegisterController::class, 'register'])->name('cadastro');

    //****************************** Blog ***********************************************/
    Route::get('/blog/artigo/{slug}', [WebController::class, 'artigo'])->name('blog.artigo');
    Route::get('/blog/categoria/{slug}', [WebController::class, 'categoria'])->name('blog.categoria');
    Route::get('/blog', [WebController::class, 'artigos'])->name('blog.artigos');
    Route::match(['get', 'post'],'/blog/pesquisar', [WebController::class, 'searchBlog'])->name('blog.searchBlog');
});

Route::prefix('admin')->middleware('auth')->group( function(){

    Route::get('/', [AdminController::class, 'home'])->name('home');

    //********************* Categorias para Posts *******************************/
    Route::get('categorias/delete', [CatPostController::class, 'delete'])->name('categorias.delete');
    Route::delete('categorias/deleteon', [CatPostController::class, 'deleteon'])->name('categorias.deleteon');
    Route::put('categorias/posts/{id}', [CatPostController::class, 'update'])->name('categorias.update');
    Route::get('categorias/{id}/edit', [CatPostController::class, 'edit'])->name('categorias.edit');
    Route::match(['post', 'get'],'posts/categorias/create/{catpai}', [CatPostController::class, 'create'])->name('categorias.create');
    Route::post('posts/categorias/store', [CatPostController::class, 'store'])->name('categorias.store');
    Route::get('posts/categorias', [CatPostController::class, 'index'])->name('categorias.index');

    //********************** Permissoes ************************************************/
    Route::put('permissoes/{id}', [PermissionController::class, 'update'])->name('permissoes.update');
    Route::get('permissoes/edit/{id}', [PermissionController::class, 'edit'])->name('permissoes.edit');
    Route::post('permissoes/store', [PermissionController::class, 'store'])->name('permissoes.store');
    Route::get('permissoes/create', [PermissionController::class, 'create'])->name('permissoes.create');
    Route::get('permissoes', [PermissionController::class, 'index'])->name('permissoes');

    //********************** Perfis ************************************************/
    Route::put('perfis/{id}', [PerfilController::class, 'update'])->name('perfis.update');
    Route::get('perfis/edit/{id}', [PerfilController::class, 'edit'])->name('perfis.edit');
    Route::post('perfis/store', [PerfilController::class, 'store'])->name('perfis.store');
    Route::get('perfis/create', [PerfilController::class, 'create'])->name('perfis.create');
    Route::get('perfis', [PerfilController::class, 'index'])->name('perfis');

    //********************** Permissoes X Perfis ************************************************/
    Route::get('perfil/{idPerfil}/permissoes/{idPermission}/desvincular', [PermissionPerfilController::class, 'desvincular'])->name('perfis.permissoes.desvincular');
    Route::post('perfil/{idPerfil}/permissoes/store', [PermissionPerfilController::class, 'store'])->name('perfis.permissoes.store');
    Route::get('perfil/{idPerfil}/permissoes/create', [PermissionPerfilController::class, 'create'])->name('perfis.permissoes.create');
    Route::get('perfil/{idPerfil}/permissoes', [PermissionPerfilController::class, 'permissions'])->name('perfis.permissoes');
    Route::get('permissoes/{idPermission}/perfis', [PermissionPerfilController::class, 'profiles'])->name('permissoes.perfis');

    //********************** Planos ************************************************/
    Route::put('planos/{id}', [PlanController::class, 'update'])->name('plans.update');
    Route::get('planos/edit/{id}', [PlanController::class, 'edit'])->name('plans.edit');
    Route::post('planos/store', [PlanController::class, 'store'])->name('plans.store');
    Route::get('planos/create', [PlanController::class, 'create'])->name('plans.create');
    Route::get('planos', [PlanController::class, 'index'])->name('plans');

    //********************** Planos X Perfis ************************************************/
    Route::get('planos/{idPlano}/perfis/{idPerfil}/desvincular', [PlanProfileController::class, 'desvincular'])->name('planos.perfis.desvincular');
    Route::post('planos/{idPlano}/perfis/store', [PlanProfileController::class, 'store'])->name('planos.perfis.store');
    Route::get('planos/{idPlano}/perfis/create', [PlanProfileController::class, 'create'])->name('planos.perfis.create');
    Route::get('planos/{idPlano}/perfis', [PlanProfileController::class, 'perfis'])->name('planos.perfis');
    Route::get('perfis/{idPerfil}/planos', [PlanProfileController::class, 'profiles'])->name('perfis.planos');

    //********************** Blog ************************************************/
    Route::get('posts/set-status', [PostController::class, 'postSetStatus'])->name('posts.postSetStatus');
    Route::get('posts/delete', [PostController::class, 'delete'])->name('posts.delete');
    Route::delete('posts/deleteon', [PostController::class, 'deleteon'])->name('posts.deleteon');
    Route::post('posts/image-set-cover', [PostController::class, 'imageSetCover'])->name('posts.imageSetCover');
    Route::delete('posts/image-remove', [PostController::class, 'imageRemove'])->name('posts.imageRemove');
    Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::post('posts/categoriaList', [PostController::class, 'categoriaList'])->name('posts.categoriaList');
    Route::get('posts/artigos', [PostController::class, 'index'])->name('posts.artigos');
    Route::get('posts/noticias', [PostController::class, 'index'])->name('posts.noticias');
    Route::get('posts/paginas', [PostController::class, 'index'])->name('posts.paginas');

    //*********************** Usuários *******************************************/
    Route::match(['get', 'post'], 'usuarios/pesquisa', [UserController::class, 'search'])->name('users.search');
    Route::match(['post', 'get'], 'usuarios/fetchCity', [UserController::class, 'fetchCity'])->name('users.fetchCity');
    Route::delete('usuarios/deleteon', [UserController::class, 'deleteon'])->name('users.deleteon');
    Route::get('usuarios/set-status', [UserController::class, 'userSetStatus'])->name('users.userSetStatus');
    Route::get('usuarios/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::get('usuarios/time', [UserController::class, 'team'])->name('users.team');
    Route::get('usuarios/view/{id}', [UserController::class, 'show'])->name('users.view');
    Route::put('usuarios/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('usuarios/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('usuarios/create', [UserController::class, 'create'])->name('users.create');
    Route::post('usuarios/store', [UserController::class, 'store'])->name('users.store');
    Route::get('usuarios', [UserController::class, 'index'])->name('users.index');

    //*********************** Email **********************************************/
    Route::get('email/suporte', [EmailController::class, 'suporte'])->name('email.suporte');
    Route::match(['post', 'get'], 'email/enviar-email', [EmailController::class, 'send'])->name('email.send');
    Route::post('email/sendEmail', [EmailController::class, 'sendEmail'])->name('email.sendEmail');
    Route::match(['post', 'get'], 'email/success', [EmailController::class, 'success'])->name('email.success');

});

Auth::routes();