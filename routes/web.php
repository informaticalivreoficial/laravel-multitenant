<?php

use App\Http\Controllers\Admin\{
    AdminController,
    CatPostController,
    EmailController,
    ImovelController,
    PlanController,
    PostController,
    SitemapController,
    SlideController,
    TenantClientConfigController,
    TenantController,
    UserController
};
use App\Http\Controllers\Admin\ACL\{    
    PerfilController,
    PermissionController,
    PermissionPerfilController,
    PermissionRoleController,
    PlanProfileController,
    RoleController,
    RoleUserController
};
use App\Http\Controllers\Api\StripeController;
use App\Http\Controllers\Assinaturas\AssinaturaController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Web\ClienteController;
use App\Http\Controllers\Web\Site\{
    FilterController,
    RssFeedController,
    SendEmailController,
    SiteController
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('404.error', function(){
    return 'Endereço Inválido';
})->name('404.error');

// Route::group([
//     'prefix' => 'gerenciador'
// ], function () {   
   
//     Route::get('/', [AdminController::class, 'home'])->name('home');
    
// });

Route::group([
    'namespace' => 'Web', 
    'as' => 'web.'
], function () {

    /** FILTRO */
    Route::match(['post', 'get'], '/filtro', [SiteController::class, 'filter'])->name('filter');

    //FILTROS
    Route::post('main-filter/search', [FilterController::class, 'search'])->name('main-filter.search');
    Route::post('main-filter/categoria', [FilterController::class, 'categoria'])->name('main-filter.categoria');
    Route::post('main-filter/tipo', [FilterController::class, 'tipo'])->name('main-filter.tipo');
    Route::post('main-filter/bairro', [FilterController::class, 'bairro'])->name('main-filter.bairro');
    Route::post('main-filter/dormitorios', [FilterController::class, 'dormitorios'])->name('main-filter.dormitorios');
    Route::post('main-filter/suites', [FilterController::class, 'suites'])->name('main-filter.suites');
    Route::post('main-filter/banheiros', [FilterController::class, 'banheiros'])->name('main-filter.banheiros');
    Route::post('main-filter/garagem', [FilterController::class, 'garagem'])->name('main-filter.garagem');
    Route::post('main-filter/price-base', [FilterController::class, 'priceBase'])->name('main-filter.priceBase');
    Route::post('main-filter/price-limit', [FilterController::class, 'priceLimit'])->name('main-filter.priceLimit');
    
    //CLIENTE
    Route::get('/', [SiteController::class, 'home'])->name('home');
    Route::get('/atendimento', [SiteController::class, 'atendimento'])->name('atendimento');
    Route::get('/sendEmail', [SendEmailController::class, 'sendEmail'])->name('sendEmail');

    //FINANCIAMENTO
    Route::get('/simulador-financiamento-imovel', [SiteController::class, 'financiamento'])->name('financiamento');


    //****************************** Imoveis ************************************/
    Route::get('/imoveis/categoria/{categoria}', [SiteController::class, 'categoriasImovel'])->name('imoveis.categoria');
    

    //****************************** Planos ************************************/
    Route::get('/planos', [ClienteController::class, 'planos'])->name('planos');
    Route::get('/plano/{slug}', [ClienteController::class, 'plano'])->name('plano');
    Route::get('/plano/{slug}/assinar', [ClienteController::class, 'assinar'])->name('assinar');    

    /** Página de Locaçãp - Específica de um imóvel */
    Route::get('/quero-alugar/{slug}', [SiteController::class, 'rentProperty'])->name('rentProperty');    

    /** Lista todos os imóveis */
    Route::get('/imoveis/{type}', [SiteController::class, 'imoveisList'])->name('imoveisList');

    /** Lista todos os imóveis por categoria */
    Route::get('/imoveis/categoria/{categoria}', [SiteController::class, 'imoveisCategoria'])->name('imoveisCategoria');

    /** Página de Compra - Específica de um imóvel */
    Route::match(['get', 'post'],'/imoveis/quero-comprar/{slug}', [SiteController::class, 'buyProperty'])->name('buyProperty');  
    
    /** Página de Experiências */
    Route::get('/experiencias', 'WebController@experience')->name('experience');

    //** FEED */    
    Route::get('/feed', [RssFeedController::class, 'feed'])->name('feed');
    Route::get('/politica-de-privacidade', [SiteController::class, 'politica'])->name('politica');

    //****************************** Notícias ***********************************************/
    Route::get('/noticia/{slug}', [SiteController::class, 'noticia'])->name('noticia');
    Route::get('/noticias/categoria/{slug}', [SiteController::class, 'categoria'])->name('noticia.categoria');
    Route::get('/noticias', [SiteController::class, 'noticias'])->name('noticias'); 

    //****************************** Páginas ***********************************************/
    Route::get('/pagina/{slug}', [SiteController::class, 'pagina'])->name('pagina'); 

    //****************************** Blog ***********************************************/
    Route::get('/blog/artigo/{slug}', [SiteController::class, 'artigo'])->name('blog.artigo');
    Route::get('/blog/categoria/{slug}', [SiteController::class, 'categoria'])->name('blog.categoria');
    Route::get('/blog/artigos', [SiteController::class, 'artigos'])->name('blog.artigos');    
    Route::match(['get', 'post'],'/blog/pesquisar', [WebController::class, 'searchBlog'])->name('blog.searchBlog');
});


Route::prefix('admin')->middleware('auth')->group( function(){

    Route::get('/', [AdminController::class, 'home'])->name('home');

    //******************************* Sitemap *********************************************/
    Route::get('gerarxml', [SitemapController::class, 'gerarxml'])->name('admin.gerarxml');

    //******************************* Assinatura *********************************************/
    Route::get('assinar-plano/reativar', [AssinaturaController::class, 'resume'])->name('assinatura.resume');
    Route::get('assinar-plano/cancela', [AssinaturaController::class, 'cancel'])->name('assinatura.cancel');
    Route::get('assinar-plano/invoice/{invoice}', [AssinaturaController::class, 'downloadInvoice'])->name('assinatura.downloadInvoice');
    Route::post('assinar-plano/store', [AssinaturaController::class, 'store'])->name('assinatura.store');
    Route::get('assinar-plano/checkout', [AssinaturaController::class, 'index'])->name('assinatura.index');
    Route::get('assinatura', [AssinaturaController::class, 'assinatura'])->name('assinatura')->middleware(['subscribed']);

    //****************************** Configurações ***************************************/
    Route::match(['post', 'get'], 'configuracoes/fetchCity', [TenantClientConfigController::class, 'fetchCity'])->name('configuracoes.fetchCity');
    Route::put('configuracoes/{config}', [TenantClientConfigController::class, 'update'])->name('configuracoes.update');
    Route::get('configuracoes', [TenantClientConfigController::class, 'editar'])->name('configuracoes.editar');

    //******************* Tenants ************************************************/
    Route::match(['post', 'get'], 'tenants/fetchCity', [TenantController::class, 'fetchCity'])->name('tenant.fetchCity');
    Route::put('tenants/{tenant}', [TenantController::class, 'update'])->name('tenant.update');
    Route::get('tenants/{tenant}/edit', [TenantController::class, 'edit'])->name('tenant.edit');
    Route::get('tenants', [TenantController::class, 'index'])->name('tenant.index');

    //******************* Slides ************************************************/
    Route::get('slides/set-status', [SlideController::class, 'slideSetStatus'])->name('slides.slideSetStatus');
    Route::get('slides/delete', [SlideController::class, 'delete'])->name('slides.delete');
    Route::delete('slides/deleteon', [SlideController::class, 'deleteon'])->name('slides.deleteon');
    Route::put('slides/{slide}', [SlideController::class, 'update'])->name('slides.update');
    Route::get('slides/{slide}/edit', [SlideController::class, 'edit'])->name('slides.edit');
    Route::get('slides/create', [SlideController::class, 'create'])->name('slides.create');
    Route::post('slides/store', [SlideController::class, 'store'])->name('slides.store');
    Route::get('slides', [SlideController::class, 'index'])->name('slides.index');

    /** Imóveis */
    Route::match(['post', 'get'], 'imoveis/destaque', [ImovelController::class, 'destaqueMark'])->name('imoveis.destaque');
    Route::get('imoveis/marcadagua', [ImovelController::class, 'imageWatermark'])->name('imoveis.marcadagua');
    Route::match(['post', 'get'], 'imoveis/fetchCity', [ImovelController::class, 'fetchCity'])->name('imoveis.fetchCity');
    Route::get('imoveis/delete', [ImovelController::class, 'delete'])->name('imoveis.delete');
    Route::delete('imoveis/deleteon', [ImovelController::class, 'deleteon'])->name('imoveis.deleteon');
    Route::post('imoveis/image-set-cover', [ImovelController::class, 'imageSetCover'])->name('imoveis.imageSetCover');
    Route::get('imoveis/set-status', [ImovelController::class, 'imovelSetStatus'])->name('imoveis.imovelSetStatus');
    Route::delete('imoveis/image-remove', [ImovelController::class, 'imageRemove'])->name('imoveis.imageRemove');
    Route::put('imoveis/{imovel}', [ImovelController::class, 'update'])->name('imoveis.update');
    Route::get('imoveis/{imovel}/edit', [ImovelController::class, 'edit'])->name('imoveis.edit');
    Route::get('imoveis/create', [ImovelController::class, 'create'])->name('imoveis.create');
    Route::post('imoveis/store', [ImovelController::class, 'store'])->name('imoveis.store');
    Route::get('imoveis', [ImovelController::class, 'index'])->name('imoveis.index');

    //********************* Categorias para Posts *******************************/
    Route::get('categorias/delete', [CatPostController::class, 'delete'])->name('categorias.delete');
    Route::delete('categorias/deleteon', [CatPostController::class, 'deleteon'])->name('categorias.deleteon');
    Route::put('categorias/posts/{id}', [CatPostController::class, 'update'])->name('categorias.update');
    Route::get('categorias/{id}/edit', [CatPostController::class, 'edit'])->name('categorias.edit');
    Route::match(['post', 'get'],'posts/categorias/create/{catpai}', [CatPostController::class, 'create'])->name('categorias.create');
    Route::post('posts/categorias/store', [CatPostController::class, 'store'])->name('categorias.store');
    Route::get('posts/categorias', [CatPostController::class, 'index'])->name('categorias.index');

    //***************************** Cargos ******************************************************/
    Route::put('cargos/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::get('cargos/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('cargos/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('cargos/create', [RoleController::class, 'create'])->name('roles.create');
    Route::get('cargos', [RoleController::class, 'index'])->name('roles');

    //********************** Permissoes X Cargos ************************************************/
    Route::get('cargo/{idRole}/permissoes/{idPermission}/desvincular', [PermissionRoleController::class, 'desvincular'])->name('role.permissoes.desvincular');
    Route::post('cargo/{idRole}/permissoes/store', [PermissionRoleController::class, 'store'])->name('role.permissoes.store');
    Route::get('cargo/{idRole}/permissoes/create', [PermissionRoleController::class, 'create'])->name('role.permissoes.create');
    Route::get('cargo/{idRole}/permissoes', [PermissionRoleController::class, 'permissions'])->name('role.permissoes');
    Route::get('permissoes/{idPermission}/cargos', [PermissionRoleController::class, 'roles'])->name('permissoes.roles');

    //********************** Cargos X User ************************************************/
    Route::get('users/{idUser}/roles/{idRole}/desvincular', [RoleUserController::class, 'desvincular'])->name('users.roles.desvincular');
    Route::post('users/{idUser}/roles/store', [RoleUserController::class, 'store'])->name('users.roles.store');
    Route::get('users/{idUser}/roles/create', [RoleUserController::class, 'create'])->name('users.roles.create');
    Route::get('users/{idUser}/roles', [RoleUserController::class, 'roles'])->name('users.roles');
    //Route::get('perfis/{idPlano}/perfis', [PlanProfileController::class, 'profiles'])->name('perfis.planos');

    //****************************** Permissoes ************************************************/
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
    Route::get('planos/set-status', [PlanController::class, 'planSetStatus'])->name('plans.planSetStatus');
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
    //Route::get('perfis/{idPlano}/perfis', [PlanProfileController::class, 'profiles'])->name('perfis.planos');

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
    Route::get('clientes', [UserController::class, 'index'])->name('users.index');

    //*********************** Email **********************************************/
    Route::get('email/suporte', [EmailController::class, 'suporte'])->name('email.suporte');
    Route::match(['post', 'get'], 'email/enviar-email', [EmailController::class, 'send'])->name('email.send');
    Route::post('email/sendEmail', [EmailController::class, 'sendEmail'])->name('email.sendEmail');
    Route::match(['post', 'get'], 'email/success', [EmailController::class, 'success'])->name('email.success');

});

// Registration Routes...
Route::get('cadastro', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('cadastro', [RegisterController::class, 'register']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset']);

//Auth::routes();