const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', name: 'home', component: () => import('pages/usuario/index.vue') },
    ]
  },
  {
    path: '/usuario',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', name: 'home', component: () => import('pages/usuario/index.vue') },
    ]
  },
  {
    path: '/usuario',
    component: () => import('layouts/CreateUsuario.vue'),
    children: [
      { path: 'create', name: 'create', component: () => import('pages/usuario/create.vue') },
      { path: 'update/:id', name: 'update', component: () => import('pages/usuario/update.vue') },
    ]
  },
  {
    path: '/exemplo',
    component: () => import('layouts/CreateUsuario.vue'),
    children: [
      { path: 'computed', name: 'computed', component: () => import('pages/exemplo/Computed.vue') },
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
