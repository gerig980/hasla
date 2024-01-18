<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/oauth/authorize' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.authorize',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.approve',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.deny',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/token' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/token/refresh' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token.refresh',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/clients' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/scopes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.scopes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/personal-access-tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/clear-cache' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8UrRJNzj8bVGO19U',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nefedfsrgw' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8HNDDlBrDaVI6Fwa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gM4Af2BApzhYGyGy',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/signup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BZTX7SCPlolNRZ88',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/forgot-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::y25LsVDyeaGsERWO',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/verify-code' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::privpdoDCAWjcMme',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FKWyRvn4zofrRMDa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::F61IdeYltagLN5aa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7YqFe1YJLAOrMv06',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/order-statistic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::foTIHnrzzRS68FcX',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::e80FvLQlE9qKNDWg',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/update-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ijgJXVyn8SIzxNe2',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/clear-cache' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eENo5T1qtyplCHrM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/admin-data/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::A6hZUxCiirdl9P2I',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/role/all-permissions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rUnWZlPLBfw59eRX',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/role/all-roles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::S9G6Jc5CF60D4z5K',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/role/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OdpaIn5lNbsTSkgA',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/category/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oDYOPZLNnDnc4iMx',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/category/all-categories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KRtRueErSRDkeT8e',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/subcategory/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8zVsB8fP7DoDglCb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/subcategory/all-subcategories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DqxAbS7SmoRfD6bF',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/brand/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OKfYTWuuVpsb0j1e',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/brand/all-brands' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::w7eCtR9ltacpD7Yw',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/product/all2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hFyiMgCi4ZvmrTsJ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/product/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::N4lwko2BmBDR2plI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/product/dropdown-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VR3ehutMpImiu3tX',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/tag/all2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8JSicOgQnQqGZzrY',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/tag/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FZejPOvv9kwOLkdI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/attribute/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yjgBAylJhwtTwOZx',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/attribute/all-attributes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9va1XVOhrPcqHxkx',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/attribute-value/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0DQh3h6eDa27haGq',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/inventory/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jf0G2WJLq8CEUzS0',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/setting/find' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FPSdaZYLnmeIFfra',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/setting/currency' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VqTYynjMxDg1bbRq',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/setting/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HeOQMgVgrQjkcUE7',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/setting/upload-logo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EpexiyFmhfGiiedh',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/vendor-store/find' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3gb98HtndGxu9DR6',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/vendor-store/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OCeHk1WLNALq2d3m',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/vendor-store/upload-logo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bTZ8H4uOo3HOiS6x',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/withdrawal-account/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QyVDnsPMwNrDrE6S',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/withdrawal-request/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UHPdKa4pruKbmUgz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/withdrawal-request/find' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::V9CJmYJoJyWswyRX',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/withdrawal-request/withdraw' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HNWXgnK7KjoJnEgn',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/withdrawal-request/cancel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XlGPAXbTnn89THbh',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/withdrawal-request/approve' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SoeUYAGOlSJj97XA',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/payment/find' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dQFIugRlCww2BASx',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/payment/save' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aHpWxBR1TlwjQcUk',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/user/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Xq8XZ84FoXDnFKuG',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/subscriber/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pSYUaycM2WdZVHSS',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/subscriber/all-subscribers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ej5RL8wfRX6M4yU5',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/subscriber/send-subscription-email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Mm1GHiH99chf2LWb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/subscription-email-format/all-subscription-email-formats' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uRF6S9u7awAYBRt7',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/subscription-email-format/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ttj7MVyDQVT1ts3S',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/user-message/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ko13mYlq4Ka9oHQf',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/page/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XMOy0xiNZ1xSqbjs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/page/all-pages' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::N264VoDXNLQnEEV4',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/footer-link/all2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::F8Gbcc1e2clecFvZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/footer-link/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4mPMoyWbpKk1mHss',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/footer-link/service-about-action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BSueW7Uo7bFqWHmb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/footer-image-link/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xX0hWa4wdbf9SQWu',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/home-slider-image/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZMqcFVTMEuFBAF6u',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/banner/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HWpdD4W76PTOnRiG',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/flash-sale/all2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5Pls1UnXeksiS1Bh',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/flash-sale/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::krXDkRsjnZnLC86n',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/tax-rule/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NDwWlYE3QmS7Znex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/tax-rule/all-tax-rules' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zjNn0HEWTEBYPhZ5',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/voucher/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::19I987OCDdcg1PJq',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/bundle-deal/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KEhxotJNJ8mczwKM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/bundle-deal/all-bundle-deals' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IkbWEoLSFgk8pvEj',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/shipping-rule/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3u3J8lDTmPIWmg5X',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/shipping-rule/all-shipping-rules' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KTdEyuu5S03WcPCJ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/wysiwyg-image/upload' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7Xj2v0ShXHNMU1so',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/page-wysiwyg-image/upload' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wz9RWXQUbolImc5V',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/product-collection/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MJCXbaGJw0dPbLCW',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/product-collection/all-product-collections' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5NN7YNtxhhfh3Ftb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/order/all2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lVD6q8sj4AZ46Xda',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/order/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YMogmtrxuruFzfb4',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/order/vendor-all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FCUud0yAWECgh4G0',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/order/update-status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QsieHSwiuCc9ESNs',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/rating-review/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9FugFJB6sOViOqoY',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/common' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::frw6RSKGWxt9d7Ot',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3yTnpWImroWF47kN',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/products' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aEWg61EWGDQsthZ2',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/categories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TblAPNjhYASWIJEs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/brands' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sRJEW9Gi5oXEV1Gj',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NvLOdMQxICyiRZN9',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/contact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Opb71ZgyRsUBvH5A',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/email-subscription' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hrUm21oJ194eQXC3',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/install/configured' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tROEILRNKLVUb7Dq',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/install/set-database' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tvfclVBlpeySz9lL',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/install/set-permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::w4eAarZNhgyENdZK',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/cart/by-user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::M5wU0pwfncEAYrie',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/cart/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fdBxD0ugLwx55hjV',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/cart/buy-now' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uEvkHuRlc7PJRDxB',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/cart/change' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hvvIqcDzU0ffwWxQ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/cart/update-shipping' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ywVt1WuPPR9HebGl',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/order/by-user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7n610O0yWsU2VJGe',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/order/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IN5AQnkRSDlCW8sI',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/order/payment-done' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qwnZZ1fOvJ7jJHqe',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/cancellation/cancel-order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RbJjItH9vFZiPYkJ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/voucher/validity' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kJDLQNAD8Sh6HKaS',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user/signin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ceF7a6pyZEGjF8fe',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user/signup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7VKhR0UCibnGh26N',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user/verify' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hvIjHmyiy3IQHwsg',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user/forgot-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::crfkzJ72ZEPhp4Qx',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user/update-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TzlrxQfmgIGdqx0J',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user/user-vouchers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jdk68Vtkrazb2lPh',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yS0FDuIbpxHD3E92',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fuadWxj104kORXS8',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user/update-profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JLb3CHjqX0nw8IX4',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user/update-user-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KURA4LUzSbyZn4gM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user/compare-list/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8Lu8GinAXAfO8CH3',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user/compare-list/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XHmHt8RBTARY8MNb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user/wishlist/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zOogDGVG3ZU3f7SH',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user/wishlist/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TRYtoRh2X6Litiwo',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user/address/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cO3KxHJrEqVtvQNz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user/address/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::q1tfbQSCxDMlfhpy',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/oauth/(?|tokens/([^/]++)(*:32)|clients/([^/]++)(?|(*:58))|personal\\-access\\-tokens/([^/]++)(*:99))|/api/(?|admin/(?|a(?|dmin\\-data/(?|find/([^/]++)(*:155)|action(?:/([^/]++))?(*:183)|delete/([^/]++)(*:206))|ttribute(?|/(?|find/([^/]++)(*:243)|action(?:/([^/]++))?(*:271)|delete/([^/]++)(*:294))|\\-value/(?|find/([^/]++)(*:327)|action(?:/([^/]++))?(*:355)|delete/([^/]++)(*:378))))|r(?|ole/(?|find/([^/]++)(*:413)|action(?:/([^/]++))?(*:441)|delete/([^/]++)(*:464))|ating\\-review/delete/([^/]++)(*:502))|ca(?|tegory/(?|find/([^/]++)(*:539)|action(?:/([^/]++))?(*:567)|delete/([^/]++)(*:590)|upload(?:/([^/]++))?(*:618))|ncellation/(?|find/([^/]++)(*:654)|refund/([^/]++)(*:677)))|s(?|ub(?|category/(?|find/([^/]++)(*:721)|action(?:/([^/]++))?(*:749)|delete/([^/]++)(*:772)|upload(?:/([^/]++))?(*:800))|scri(?|ber/delete/([^/]++)(*:835)|ption\\-email\\-format/(?|find/([^/]++)(*:880)|action(?:/([^/]++))?(*:908)|delete/([^/]++)(*:931))))|etting/convert\\-image/([^/]++)(*:972)|hipping\\-rule/(?|find/([^/]++)(*:1010)|action(?:/([^/]++))?(*:1039)|delete/([^/]++)(*:1063)))|b(?|rand/(?|find/([^/]++)(*:1099)|action(?:/([^/]++))?(*:1128)|delete/([^/]++)(*:1152)|upload(?:/([^/]++))?(*:1181))|anner/(?|find/([^/]++)(*:1213)|action(?:/([^/]++))?(*:1242)|image(?:/([^/]++))?(*:1270)|upload(?:/([^/]++))?(*:1299))|undle\\-deal/(?|find/([^/]++)(*:1337)|action(?:/([^/]++))?(*:1366)|delete/([^/]++)(*:1390)))|p(?|roduct(?|/(?|find(?|2/([^/]++)(*:1435)|/([^/]++)(*:1453))|a(?|ction(?|2(?:/([^/]++))?(*:1490)|(?:/([^/]++))?(*:1513))|ll\\-images/([^/]++)(*:1542))|delete(?|/([^/]++)(*:1570)|\\-image/([^/]++)(*:1595))|upload(?|(?:/([^/]++))?(*:1628)|\\-(?|video(?:/([^/]++))?(*:1661)|images/([^/]++)(*:1685))))|\\-collection/(?|find/([^/]++)(*:1726)|action(?:/([^/]++))?(*:1755)|delete/([^/]++)(*:1779)))|age(?|/(?|action(?:/([^/]++))?(*:1820)|delete/([^/]++)(*:1844)|find/([^/]++)(*:1866))|\\-wysiwyg\\-image/delete/([^/]++)(*:1908)))|ta(?|g/action(?:/([^/]++))?(*:1946)|x\\-rule/(?|find/([^/]++)(*:1979)|action(?:/([^/]++))?(*:2008)|delete/([^/]++)(*:2032)))|inventory/find/([^/]++)(*:2066)|u(?|pdated\\-inventory/(?|find/([^/]++)(*:2113)|action/([^/]++)(*:2137))|ser(?|/delete/([^/]++)(*:2169)|\\-message/(?|find/([^/]++)(*:2204)|action(?:/([^/]++))?(*:2233)|delete/([^/]++)(*:2257))))|w(?|ithdrawal\\-(?|account/(?|find/([^/]++)(*:2311)|action(?:/([^/]++))?(*:2340)|delete/([^/]++)(*:2364))|request/delete/([^/]++)(*:2397))|ysiwyg\\-image/delete/([^/]++)(*:2436))|f(?|ooter\\-(?|link/(?|payment\\-social\\-action(?:/([^/]++))?(*:2505)|delete/([^/]++)(*:2529))|image\\-link/(?|find/([^/]++)(*:2567)|action(?:/([^/]++))?(*:2596)|delete/([^/]++)(*:2620)|image(?:/([^/]++))?(*:2648)))|lash\\-sale/(?|action(?|2(?:/([^/]++))?(*:2697)|(?:/([^/]++))?(*:2720))|find(?|2/([^/]++)(*:2747)|/([^/]++)(*:2765)|\\-products/([^/]++)(*:2793))|delete/([^/]++)(*:2818)))|home\\-slider\\-image/(?|find/([^/]++)(*:2865)|action(?:/([^/]++))?(*:2894)|delete/([^/]++)(*:2918)|image(?:/([^/]++))?(*:2946)|upload(?:/([^/]++))?(*:2975))|voucher/(?|find/([^/]++)(*:3009)|action(?:/([^/]++))?(*:3038)|delete/([^/]++)(*:3062))|order/(?|find(?|/([^/]++)(*:3097)|2/([^/]++)(*:3116))|delete/([^/]++)(*:3141)|send\\-delivered\\-email/([^/]++)(*:3181)))|v1/(?|p(?|roduct/([^/]++)(*:3217)|age/([^/]++)(*:3238))|flash\\-sale(?:/([^/]++))?(*:3273)|r(?|eviews/([^/]++)(*:3301)|ating\\-review/(?|action(?:/([^/]++))?(*:3347)|find/([^/]++)(*:3369)))|suggested\\-products/([^/]++)(*:3408)|ca(?|rt/delete/([^/]++)(*:3440)|ncellation/find/([^/]++)(*:3473))|order/send\\-order\\-email/([^/]++)(*:3516)|user/(?|social\\-login/(?|redirect/([^/]++)(*:3567)|callback/([^/]++)(*:3593))|address/delete/([^/]++)(*:3626))))|/((?:.*))(*:3647))/?$}sDu',
    ),
    3 => 
    array (
      32 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      58 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.update',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.destroy',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      99 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      155 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::s9pkVYSTWC36GQGI',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      183 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TvRe2FkXjhrnSRH6',
            'admin' => NULL,
          ),
          1 => 
          array (
            0 => 'admin',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      206 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OIsTa8081doQk8FO',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      243 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BJ6qYNFFdfCLmNND',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      271 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0q9QUCq9JS85veNy',
            'attribute' => NULL,
          ),
          1 => 
          array (
            0 => 'attribute',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      294 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RXutr6BYAq6lCPf3',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      327 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mP33hCjxoEMeZjqG',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      355 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::velp6zND2QwUkoko',
            'attributeValue' => NULL,
          ),
          1 => 
          array (
            0 => 'attributeValue',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      378 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oOr6E2rbBHrVSUgh',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      413 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NOemFMiDSHjpawEZ',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      441 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RQ0IFsitqDKz3arS',
            'role' => NULL,
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      464 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::g3FcuMoa8JETlwqg',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      502 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NkRQqqiWgmBPQGBg',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      539 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6et4tZWncYJQXqiT',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      567 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::V7SVPzE6F5Lh4Axj',
            'category' => NULL,
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      590 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::a2wBNUi10afW1J5p',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      618 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WsmRSmZALLbfPOIl',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      654 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DC0VU7W40UhmaSjK',
          ),
          1 => 
          array (
            0 => 'orderId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      677 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XelLvepjecAiy2Ks',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      721 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kfTSmCJQMRGdnQqr',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      749 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BI1cyCuGkbo5aJEF',
            'subCategory' => NULL,
          ),
          1 => 
          array (
            0 => 'subCategory',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      772 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nQ11ZU93kI6UkdLI',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      800 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1UZMaCtbldnCxVct',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      835 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::698km2ovS95XcFzN',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      880 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Rv15Gt2k1M5aoXpv',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      908 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ckxseme8YhkVu1pn',
            'subscriptionEmailFormat' => NULL,
          ),
          1 => 
          array (
            0 => 'subscriptionEmailFormat',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      931 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::R9uTnJU3GWrb006T',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      972 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JLiBmMIz9NJ2uqrP',
          ),
          1 => 
          array (
            0 => 'imageName',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1010 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aGmBYDRl261OvJdM',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1039 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nys8nxJWSquGhNIE',
            'shippingRules' => NULL,
          ),
          1 => 
          array (
            0 => 'shippingRules',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1063 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2pksCkFSqmfmgAHK',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1099 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sHKYBvChTisJznoI',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1128 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5MgCuFKXpPHwmyCw',
            'brand' => NULL,
          ),
          1 => 
          array (
            0 => 'brand',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1152 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::P7FyQjlpxdaqVR3h',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1181 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KOHbJR3Nx5h4Aw6z',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1213 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XawQEvanOB9dXlIO',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1242 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zAoEeiqPwIhzjtVh',
            'banner' => NULL,
          ),
          1 => 
          array (
            0 => 'banner',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1270 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VmvvPTie4aEmCAtL',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1299 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aFlEw16Oqz6cwryG',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1337 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3aevd9jMDfF3cICk',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1366 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5EjM7Gt15dGyC0gg',
            'bundleDeal' => NULL,
          ),
          1 => 
          array (
            0 => 'bundleDeal',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1390 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bPa8TsYT3Uua9eCp',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1435 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jJzVBTQFfLhFgb7z',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1453 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::J10ITZybGVtIveOe',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1490 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uMgDauRs5AJE4x3p',
            'product' => NULL,
          ),
          1 => 
          array (
            0 => 'product',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1513 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::y2ZBzAyrTDEWJ1J9',
            'product' => NULL,
          ),
          1 => 
          array (
            0 => 'product',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1542 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CEDrTBdwULG6DZwk',
          ),
          1 => 
          array (
            0 => 'productId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1570 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hmDab1IYMpOIfsFW',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1595 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nQD972tlXUiqC6BX',
          ),
          1 => 
          array (
            0 => 'productImageId',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1628 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wsGkKgNV8AXCn60Q',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1661 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YhUON3bmrtgDU8uU',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1685 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yIUnuUISRYyiNl0M',
          ),
          1 => 
          array (
            0 => 'productId',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1726 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vi999vdZpJR6dyA6',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1755 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NQqdbeYdeJCcFTBy',
            'productCollection' => NULL,
          ),
          1 => 
          array (
            0 => 'productCollection',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1779 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::s2xOexwspFwGyfj1',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1820 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pSObeQLQ9auZS9cv',
            'page' => NULL,
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1844 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8HaD2DVB7Bda8c6M',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1866 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DoBNznppZ4SYIwZg',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1908 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UmZWZiexJyogfZVW',
          ),
          1 => 
          array (
            0 => 'image_name',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1946 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::J5sTs75bkIDxU8hv',
            'tag' => NULL,
          ),
          1 => 
          array (
            0 => 'tag',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1979 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CDXJzxxE8VNxOiqJ',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2008 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xPEdMQVb13e6OjhM',
            'taxRules' => NULL,
          ),
          1 => 
          array (
            0 => 'taxRules',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2032 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QSlQIPKFv9sIDkt1',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2066 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RS6pqITY85nMnw7T',
          ),
          1 => 
          array (
            0 => 'productId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2113 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PG5lYZNgYawZnVVh',
          ),
          1 => 
          array (
            0 => 'productId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2137 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KFAmg2oSiHHrlycY',
          ),
          1 => 
          array (
            0 => 'productId',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2169 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hazIuk4qHnsbA6Dp',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2204 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AvhFoSKW77nXHS8o',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2233 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OmoBC4GQW1ThPpMp',
            'contactUs' => NULL,
          ),
          1 => 
          array (
            0 => 'contactUs',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2257 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VAS0YnG6gpjenclb',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2311 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jJB0VqL7FeAEoQ71',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2340 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RRuZd7frfa0aRDnX',
            'withdrawalAccount' => NULL,
          ),
          1 => 
          array (
            0 => 'withdrawalAccount',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2364 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mKqpQU1VPbEr3bgb',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2397 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IdQbDneaeDn0uxhy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2436 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gf06iSVsIpzopuLv',
          ),
          1 => 
          array (
            0 => 'image_name',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2505 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DTk2ABd02q7RYqxO',
            'footerLink' => NULL,
          ),
          1 => 
          array (
            0 => 'footerLink',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2529 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4bQxTyMkZ6sN8Pz8',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2567 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4sbu1Jiglo0eNzAc',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2596 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::26oKRkCFtAiop6Yo',
            'footerImageLink' => NULL,
          ),
          1 => 
          array (
            0 => 'footerImageLink',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2620 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ozICd70NVsgmuZfc',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2648 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::e14otHR3fYj6zaLh',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2697 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZvhPCQyZvQTmGMoG',
            'flashSale' => NULL,
          ),
          1 => 
          array (
            0 => 'flashSale',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2720 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ArSVbrbiDllRu3NP',
            'flashSale' => NULL,
          ),
          1 => 
          array (
            0 => 'flashSale',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2747 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::M1vVGJ5lHkHh84Bx',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2765 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rEhmF6twVrVYNeto',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2793 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TNSW0YSUJ25cPU8d',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2818 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ahieIbFOjIwwuIwR',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2865 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VIisuf9XND3HUm7m',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2894 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uiUUbvcLpJn58pbf',
            'homeSlider' => NULL,
          ),
          1 => 
          array (
            0 => 'homeSlider',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2918 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::n3dO64B6VfVTPx9H',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2946 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yFBvtF1R8Ekndn6I',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2975 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RIpEJzYn1JG6UbPE',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3009 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::J0LKiIolXp8LLhLh',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3038 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HbaxKnB1ATzuhcWN',
            'voucher' => NULL,
          ),
          1 => 
          array (
            0 => 'voucher',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3062 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8X7s2flzqdhAsy09',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3097 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DjfQtZyiTmHNnwNZ',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3116 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZDTgT7SOvhH2krfv',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3141 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2IcNM5fYIwKqexin',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3181 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ayJKkeftCyixVBwp',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3217 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0iZm9ZCeYCt7kFGS',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3238 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vH4XP57Zl6l5ru4t',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3273 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XIh7Kprqg6owOxoZ',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3301 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tcjhkSQ5RAmUZnhP',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3347 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vN4Y7rwykDN8n8sW',
            'ratingReview' => NULL,
          ),
          1 => 
          array (
            0 => 'ratingReview',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3369 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rk6QtQ433qmiwlkD',
          ),
          1 => 
          array (
            0 => 'productId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3408 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yMuaTKJ4h28TuY7Z',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3440 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EDzLsGPvqoQzBA0Q',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3473 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jeT31hAed4FlUoju',
          ),
          1 => 
          array (
            0 => 'orderId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3516 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YqrUnUmqxU42yaUO',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3567 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::T4zbI6lfJugC8rv4',
          ),
          1 => 
          array (
            0 => 'service',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3593 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KaKqzj6VZiouErpp',
          ),
          1 => 
          array (
            0 => 'service',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3626 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FlJMoBxX8DhwZaZB',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3647 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6IlGIO8J4oL2dKKh',
          ),
          1 => 
          array (
            0 => 'any',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'passport.authorizations.authorize' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizationController@authorize',
        'as' => 'passport.authorizations.authorize',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizationController@authorize',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.authorizations.approve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ApproveAuthorizationController@approve',
        'as' => 'passport.authorizations.approve',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ApproveAuthorizationController@approve',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.authorizations.deny' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\DenyAuthorizationController@deny',
        'as' => 'passport.authorizations.deny',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\DenyAuthorizationController@deny',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.token' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/token',
      'action' => 
      array (
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
        'as' => 'passport.token',
        'middleware' => 'throttle',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.tokens.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@forUser',
        'as' => 'passport.tokens.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@forUser',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.tokens.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/tokens/{token_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@destroy',
        'as' => 'passport.tokens.destroy',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@destroy',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.token.refresh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/token/refresh',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\TransientTokenController@refresh',
        'as' => 'passport.token.refresh',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\TransientTokenController@refresh',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/clients',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@forUser',
        'as' => 'passport.clients.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@forUser',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/clients',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@store',
        'as' => 'passport.clients.store',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@store',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'oauth/clients/{client_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@update',
        'as' => 'passport.clients.update',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@update',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/clients/{client_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@destroy',
        'as' => 'passport.clients.destroy',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@destroy',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.scopes.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/scopes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ScopeController@all',
        'as' => 'passport.scopes.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ScopeController@all',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/personal-access-tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@forUser',
        'as' => 'passport.personal.tokens.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@forUser',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/personal-access-tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@store',
        'as' => 'passport.personal.tokens.store',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@store',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/personal-access-tokens/{token_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@destroy',
        'as' => 'passport.personal.tokens.destroy',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@destroy',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8UrRJNzj8bVGO19U' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/clear-cache',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:636:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:417:"function() {
    \\Illuminate\\Support\\Facades\\Artisan::call(\'config:cache\');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'config:clear\');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'route:cache\');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'route:clear \');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'cache:clear\');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'optimize\');
    return "Cache is cleared";
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000005521f697000000002a534f23";}";s:4:"hash";s:44:"tdVv2UZw4vo7ysjW080VZJsf72Xx4w81e+Z4waYInos=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::8UrRJNzj8bVGO19U',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8HNDDlBrDaVI6Fwa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/nefedfsrgw',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:540:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:321:"function (\\Illuminate\\Http\\Request $request) {
    $mailData = \\App\\Models\\Helper\\MailHelper::sendingOrderEmail($request, 8);
    if(\\is_null($mailData)){
        \\response()->json(\\App\\Models\\Helper\\Validation::error($request->token, \'Invalid.\'));
    }
    return \\view(\'mail_templates.package_delivered\', $mailData);
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000005521f695000000002a534f23";}";s:4:"hash";s:44:"SR/FzrEVqlI1lrKXZJ1mo6RoBpki9sAGCvbiaULhzjU=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::8HNDDlBrDaVI6Fwa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gM4Af2BApzhYGyGy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminsController@login',
        'controller' => 'App\\Http\\Controllers\\AdminsController@login',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::gM4Af2BApzhYGyGy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BZTX7SCPlolNRZ88' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/signup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminsController@signup',
        'controller' => 'App\\Http\\Controllers\\AdminsController@signup',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::BZTX7SCPlolNRZ88',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::y25LsVDyeaGsERWO' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminsController@forgotPassword',
        'controller' => 'App\\Http\\Controllers\\AdminsController@forgotPassword',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::y25LsVDyeaGsERWO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::privpdoDCAWjcMme' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/verify-code',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminsController@verifyCode',
        'controller' => 'App\\Http\\Controllers\\AdminsController@verifyCode',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::privpdoDCAWjcMme',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FKWyRvn4zofrRMDa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminsController@logout',
        'controller' => 'App\\Http\\Controllers\\AdminsController@logout',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::FKWyRvn4zofrRMDa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::F61IdeYltagLN5aa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminsController@profile',
        'controller' => 'App\\Http\\Controllers\\AdminsController@profile',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::F61IdeYltagLN5aa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7YqFe1YJLAOrMv06' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminsController@dashboard',
        'controller' => 'App\\Http\\Controllers\\AdminsController@dashboard',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::7YqFe1YJLAOrMv06',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::foTIHnrzzRS68FcX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/order-statistic',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminsController@statistic',
        'controller' => 'App\\Http\\Controllers\\AdminsController@statistic',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::foTIHnrzzRS68FcX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::e80FvLQlE9qKNDWg' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminsController@update',
        'controller' => 'App\\Http\\Controllers\\AdminsController@update',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::e80FvLQlE9qKNDWg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ijgJXVyn8SIzxNe2' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/update-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminsController@updatePassword',
        'controller' => 'App\\Http\\Controllers\\AdminsController@updatePassword',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::ijgJXVyn8SIzxNe2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eENo5T1qtyplCHrM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/clear-cache',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminsController@clearCache',
        'controller' => 'App\\Http\\Controllers\\AdminsController@clearCache',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::eENo5T1qtyplCHrM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::A6hZUxCiirdl9P2I' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/admin-data/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminsController@all',
        'controller' => 'App\\Http\\Controllers\\AdminsController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/admin-data',
        'where' => 
        array (
        ),
        'as' => 'generated::A6hZUxCiirdl9P2I',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::s9pkVYSTWC36GQGI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/admin-data/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminsController@find',
        'controller' => 'App\\Http\\Controllers\\AdminsController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/admin-data',
        'where' => 
        array (
        ),
        'as' => 'generated::s9pkVYSTWC36GQGI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TvRe2FkXjhrnSRH6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/admin-data/action/{admin?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminsController@action',
        'controller' => 'App\\Http\\Controllers\\AdminsController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/admin-data',
        'where' => 
        array (
        ),
        'as' => 'generated::TvRe2FkXjhrnSRH6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OIsTa8081doQk8FO' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/admin-data/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminsController@delete',
        'controller' => 'App\\Http\\Controllers\\AdminsController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/admin-data',
        'where' => 
        array (
        ),
        'as' => 'generated::OIsTa8081doQk8FO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rUnWZlPLBfw59eRX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/role/all-permissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\RolesController@allPermissions',
        'controller' => 'App\\Http\\Controllers\\RolesController@allPermissions',
        'namespace' => NULL,
        'prefix' => 'api/admin/role',
        'where' => 
        array (
        ),
        'as' => 'generated::rUnWZlPLBfw59eRX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::S9G6Jc5CF60D4z5K' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/role/all-roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\RolesController@allRoles',
        'controller' => 'App\\Http\\Controllers\\RolesController@allRoles',
        'namespace' => NULL,
        'prefix' => 'api/admin/role',
        'where' => 
        array (
        ),
        'as' => 'generated::S9G6Jc5CF60D4z5K',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OdpaIn5lNbsTSkgA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/role/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\RolesController@all',
        'controller' => 'App\\Http\\Controllers\\RolesController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/role',
        'where' => 
        array (
        ),
        'as' => 'generated::OdpaIn5lNbsTSkgA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NOemFMiDSHjpawEZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/role/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\RolesController@find',
        'controller' => 'App\\Http\\Controllers\\RolesController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/role',
        'where' => 
        array (
        ),
        'as' => 'generated::NOemFMiDSHjpawEZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RQ0IFsitqDKz3arS' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/role/action/{role?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\RolesController@action',
        'controller' => 'App\\Http\\Controllers\\RolesController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/role',
        'where' => 
        array (
        ),
        'as' => 'generated::RQ0IFsitqDKz3arS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::g3FcuMoa8JETlwqg' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/role/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\RolesController@delete',
        'controller' => 'App\\Http\\Controllers\\RolesController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/role',
        'where' => 
        array (
        ),
        'as' => 'generated::g3FcuMoa8JETlwqg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::oDYOPZLNnDnc4iMx' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/category/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\CategoriesController@all',
        'controller' => 'App\\Http\\Controllers\\CategoriesController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/category',
        'where' => 
        array (
        ),
        'as' => 'generated::oDYOPZLNnDnc4iMx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KRtRueErSRDkeT8e' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/category/all-categories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\CategoriesController@allCategories',
        'controller' => 'App\\Http\\Controllers\\CategoriesController@allCategories',
        'namespace' => NULL,
        'prefix' => 'api/admin/category',
        'where' => 
        array (
        ),
        'as' => 'generated::KRtRueErSRDkeT8e',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6et4tZWncYJQXqiT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/category/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\CategoriesController@find',
        'controller' => 'App\\Http\\Controllers\\CategoriesController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/category',
        'where' => 
        array (
        ),
        'as' => 'generated::6et4tZWncYJQXqiT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::V7SVPzE6F5Lh4Axj' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/category/action/{category?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\CategoriesController@action',
        'controller' => 'App\\Http\\Controllers\\CategoriesController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/category',
        'where' => 
        array (
        ),
        'as' => 'generated::V7SVPzE6F5Lh4Axj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::a2wBNUi10afW1J5p' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/category/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\CategoriesController@delete',
        'controller' => 'App\\Http\\Controllers\\CategoriesController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/category',
        'where' => 
        array (
        ),
        'as' => 'generated::a2wBNUi10afW1J5p',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WsmRSmZALLbfPOIl' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/category/upload/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\CategoriesController@upload',
        'controller' => 'App\\Http\\Controllers\\CategoriesController@upload',
        'namespace' => NULL,
        'prefix' => 'api/admin/category',
        'where' => 
        array (
        ),
        'as' => 'generated::WsmRSmZALLbfPOIl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8zVsB8fP7DoDglCb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/subcategory/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubCategoriesController@all',
        'controller' => 'App\\Http\\Controllers\\SubCategoriesController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/subcategory',
        'where' => 
        array (
        ),
        'as' => 'generated::8zVsB8fP7DoDglCb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DqxAbS7SmoRfD6bF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/subcategory/all-subcategories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubCategoriesController@allSubCategories',
        'controller' => 'App\\Http\\Controllers\\SubCategoriesController@allSubCategories',
        'namespace' => NULL,
        'prefix' => 'api/admin/subcategory',
        'where' => 
        array (
        ),
        'as' => 'generated::DqxAbS7SmoRfD6bF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kfTSmCJQMRGdnQqr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/subcategory/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubCategoriesController@find',
        'controller' => 'App\\Http\\Controllers\\SubCategoriesController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/subcategory',
        'where' => 
        array (
        ),
        'as' => 'generated::kfTSmCJQMRGdnQqr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BI1cyCuGkbo5aJEF' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/subcategory/action/{subCategory?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubCategoriesController@action',
        'controller' => 'App\\Http\\Controllers\\SubCategoriesController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/subcategory',
        'where' => 
        array (
        ),
        'as' => 'generated::BI1cyCuGkbo5aJEF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nQ11ZU93kI6UkdLI' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/subcategory/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubCategoriesController@delete',
        'controller' => 'App\\Http\\Controllers\\SubCategoriesController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/subcategory',
        'where' => 
        array (
        ),
        'as' => 'generated::nQ11ZU93kI6UkdLI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1UZMaCtbldnCxVct' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/subcategory/upload/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubCategoriesController@upload',
        'controller' => 'App\\Http\\Controllers\\SubCategoriesController@upload',
        'namespace' => NULL,
        'prefix' => 'api/admin/subcategory',
        'where' => 
        array (
        ),
        'as' => 'generated::1UZMaCtbldnCxVct',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OKfYTWuuVpsb0j1e' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/brand/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BrandsController@all',
        'controller' => 'App\\Http\\Controllers\\BrandsController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/brand',
        'where' => 
        array (
        ),
        'as' => 'generated::OKfYTWuuVpsb0j1e',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::w7eCtR9ltacpD7Yw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/brand/all-brands',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BrandsController@allBrands',
        'controller' => 'App\\Http\\Controllers\\BrandsController@allBrands',
        'namespace' => NULL,
        'prefix' => 'api/admin/brand',
        'where' => 
        array (
        ),
        'as' => 'generated::w7eCtR9ltacpD7Yw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sHKYBvChTisJznoI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/brand/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BrandsController@find',
        'controller' => 'App\\Http\\Controllers\\BrandsController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/brand',
        'where' => 
        array (
        ),
        'as' => 'generated::sHKYBvChTisJznoI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5MgCuFKXpPHwmyCw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/brand/action/{brand?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BrandsController@action',
        'controller' => 'App\\Http\\Controllers\\BrandsController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/brand',
        'where' => 
        array (
        ),
        'as' => 'generated::5MgCuFKXpPHwmyCw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::P7FyQjlpxdaqVR3h' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/brand/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BrandsController@delete',
        'controller' => 'App\\Http\\Controllers\\BrandsController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/brand',
        'where' => 
        array (
        ),
        'as' => 'generated::P7FyQjlpxdaqVR3h',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KOHbJR3Nx5h4Aw6z' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/brand/upload/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BrandsController@upload',
        'controller' => 'App\\Http\\Controllers\\BrandsController@upload',
        'namespace' => NULL,
        'prefix' => 'api/admin/brand',
        'where' => 
        array (
        ),
        'as' => 'generated::KOHbJR3Nx5h4Aw6z',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hFyiMgCi4ZvmrTsJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/product/all2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductsController@all',
        'controller' => 'App\\Http\\Controllers\\ProductsController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/product',
        'where' => 
        array (
        ),
        'as' => 'generated::hFyiMgCi4ZvmrTsJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::N4lwko2BmBDR2plI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/product/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductsController@all2',
        'controller' => 'App\\Http\\Controllers\\ProductsController@all2',
        'namespace' => NULL,
        'prefix' => 'api/admin/product',
        'where' => 
        array (
        ),
        'as' => 'generated::N4lwko2BmBDR2plI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jJzVBTQFfLhFgb7z' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/product/find2/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductsController@find',
        'controller' => 'App\\Http\\Controllers\\ProductsController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/product',
        'where' => 
        array (
        ),
        'as' => 'generated::jJzVBTQFfLhFgb7z',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::J10ITZybGVtIveOe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/product/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductsController@find2',
        'controller' => 'App\\Http\\Controllers\\ProductsController@find2',
        'namespace' => NULL,
        'prefix' => 'api/admin/product',
        'where' => 
        array (
        ),
        'as' => 'generated::J10ITZybGVtIveOe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VR3ehutMpImiu3tX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/product/dropdown-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductsController@dropDownData',
        'controller' => 'App\\Http\\Controllers\\ProductsController@dropDownData',
        'namespace' => NULL,
        'prefix' => 'api/admin/product',
        'where' => 
        array (
        ),
        'as' => 'generated::VR3ehutMpImiu3tX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uMgDauRs5AJE4x3p' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/product/action2/{product?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductsController@action',
        'controller' => 'App\\Http\\Controllers\\ProductsController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/product',
        'where' => 
        array (
        ),
        'as' => 'generated::uMgDauRs5AJE4x3p',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::y2ZBzAyrTDEWJ1J9' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/product/action/{product?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductsController@action2',
        'controller' => 'App\\Http\\Controllers\\ProductsController@action2',
        'namespace' => NULL,
        'prefix' => 'api/admin/product',
        'where' => 
        array (
        ),
        'as' => 'generated::y2ZBzAyrTDEWJ1J9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hmDab1IYMpOIfsFW' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/product/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductsController@delete',
        'controller' => 'App\\Http\\Controllers\\ProductsController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/product',
        'where' => 
        array (
        ),
        'as' => 'generated::hmDab1IYMpOIfsFW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wsGkKgNV8AXCn60Q' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/product/upload/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductsController@upload',
        'controller' => 'App\\Http\\Controllers\\ProductsController@upload',
        'namespace' => NULL,
        'prefix' => 'api/admin/product',
        'where' => 
        array (
        ),
        'as' => 'generated::wsGkKgNV8AXCn60Q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YhUON3bmrtgDU8uU' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/product/upload-video/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductsController@uploadVideo',
        'controller' => 'App\\Http\\Controllers\\ProductsController@uploadVideo',
        'namespace' => NULL,
        'prefix' => 'api/admin/product',
        'where' => 
        array (
        ),
        'as' => 'generated::YhUON3bmrtgDU8uU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CEDrTBdwULG6DZwk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/product/all-images/{productId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductsController@allImages',
        'controller' => 'App\\Http\\Controllers\\ProductsController@allImages',
        'namespace' => NULL,
        'prefix' => 'api/admin/product',
        'where' => 
        array (
        ),
        'as' => 'generated::CEDrTBdwULG6DZwk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yIUnuUISRYyiNl0M' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/product/upload-images/{productId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductsController@multipleImageUpload',
        'controller' => 'App\\Http\\Controllers\\ProductsController@multipleImageUpload',
        'namespace' => NULL,
        'prefix' => 'api/admin/product',
        'where' => 
        array (
        ),
        'as' => 'generated::yIUnuUISRYyiNl0M',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nQD972tlXUiqC6BX' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/product/delete-image/{productImageId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductsController@deleteProductImage',
        'controller' => 'App\\Http\\Controllers\\ProductsController@deleteProductImage',
        'namespace' => NULL,
        'prefix' => 'api/admin/product',
        'where' => 
        array (
        ),
        'as' => 'generated::nQD972tlXUiqC6BX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8JSicOgQnQqGZzrY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/tag/all2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TagsController@all',
        'controller' => 'App\\Http\\Controllers\\TagsController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/tag',
        'where' => 
        array (
        ),
        'as' => 'generated::8JSicOgQnQqGZzrY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FZejPOvv9kwOLkdI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/tag/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TagsController@all2',
        'controller' => 'App\\Http\\Controllers\\TagsController@all2',
        'namespace' => NULL,
        'prefix' => 'api/admin/tag',
        'where' => 
        array (
        ),
        'as' => 'generated::FZejPOvv9kwOLkdI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::J5sTs75bkIDxU8hv' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/tag/action/{tag?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TagsController@action',
        'controller' => 'App\\Http\\Controllers\\TagsController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/tag',
        'where' => 
        array (
        ),
        'as' => 'generated::J5sTs75bkIDxU8hv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yjgBAylJhwtTwOZx' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/attribute/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AttributesController@all',
        'controller' => 'App\\Http\\Controllers\\AttributesController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/attribute',
        'where' => 
        array (
        ),
        'as' => 'generated::yjgBAylJhwtTwOZx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9va1XVOhrPcqHxkx' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/attribute/all-attributes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AttributesController@allAttributes',
        'controller' => 'App\\Http\\Controllers\\AttributesController@allAttributes',
        'namespace' => NULL,
        'prefix' => 'api/admin/attribute',
        'where' => 
        array (
        ),
        'as' => 'generated::9va1XVOhrPcqHxkx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BJ6qYNFFdfCLmNND' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/attribute/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AttributesController@find',
        'controller' => 'App\\Http\\Controllers\\AttributesController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/attribute',
        'where' => 
        array (
        ),
        'as' => 'generated::BJ6qYNFFdfCLmNND',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0q9QUCq9JS85veNy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/attribute/action/{attribute?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AttributesController@action',
        'controller' => 'App\\Http\\Controllers\\AttributesController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/attribute',
        'where' => 
        array (
        ),
        'as' => 'generated::0q9QUCq9JS85veNy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RXutr6BYAq6lCPf3' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/attribute/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AttributesController@delete',
        'controller' => 'App\\Http\\Controllers\\AttributesController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/attribute',
        'where' => 
        array (
        ),
        'as' => 'generated::RXutr6BYAq6lCPf3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0DQh3h6eDa27haGq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/attribute-value/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AttributeValuesController@all',
        'controller' => 'App\\Http\\Controllers\\AttributeValuesController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/attribute-value',
        'where' => 
        array (
        ),
        'as' => 'generated::0DQh3h6eDa27haGq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mP33hCjxoEMeZjqG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/attribute-value/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AttributeValuesController@find',
        'controller' => 'App\\Http\\Controllers\\AttributeValuesController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/attribute-value',
        'where' => 
        array (
        ),
        'as' => 'generated::mP33hCjxoEMeZjqG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::velp6zND2QwUkoko' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/attribute-value/action/{attributeValue?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AttributeValuesController@action',
        'controller' => 'App\\Http\\Controllers\\AttributeValuesController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/attribute-value',
        'where' => 
        array (
        ),
        'as' => 'generated::velp6zND2QwUkoko',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::oOr6E2rbBHrVSUgh' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/attribute-value/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AttributeValuesController@delete',
        'controller' => 'App\\Http\\Controllers\\AttributeValuesController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/attribute-value',
        'where' => 
        array (
        ),
        'as' => 'generated::oOr6E2rbBHrVSUgh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RS6pqITY85nMnw7T' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/inventory/find/{productId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\InventoriesController@find',
        'controller' => 'App\\Http\\Controllers\\InventoriesController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/inventory',
        'where' => 
        array (
        ),
        'as' => 'generated::RS6pqITY85nMnw7T',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jf0G2WJLq8CEUzS0' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/inventory/action',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\InventoriesController@action',
        'controller' => 'App\\Http\\Controllers\\InventoriesController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/inventory',
        'where' => 
        array (
        ),
        'as' => 'generated::jf0G2WJLq8CEUzS0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PG5lYZNgYawZnVVh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/updated-inventory/find/{productId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\UpdatedInventoriesController@byProduct',
        'controller' => 'App\\Http\\Controllers\\UpdatedInventoriesController@byProduct',
        'namespace' => NULL,
        'prefix' => 'api/admin/updated-inventory',
        'where' => 
        array (
        ),
        'as' => 'generated::PG5lYZNgYawZnVVh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KFAmg2oSiHHrlycY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/updated-inventory/action/{productId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\UpdatedInventoriesController@action',
        'controller' => 'App\\Http\\Controllers\\UpdatedInventoriesController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/updated-inventory',
        'where' => 
        array (
        ),
        'as' => 'generated::KFAmg2oSiHHrlycY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FPSdaZYLnmeIFfra' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/setting/find',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@find',
        'controller' => 'App\\Http\\Controllers\\SettingsController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/setting',
        'where' => 
        array (
        ),
        'as' => 'generated::FPSdaZYLnmeIFfra',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VqTYynjMxDg1bbRq' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/setting/currency',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@currency',
        'controller' => 'App\\Http\\Controllers\\SettingsController@currency',
        'namespace' => NULL,
        'prefix' => 'api/admin/setting',
        'where' => 
        array (
        ),
        'as' => 'generated::VqTYynjMxDg1bbRq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HeOQMgVgrQjkcUE7' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/setting/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@store',
        'controller' => 'App\\Http\\Controllers\\SettingsController@store',
        'namespace' => NULL,
        'prefix' => 'api/admin/setting',
        'where' => 
        array (
        ),
        'as' => 'generated::HeOQMgVgrQjkcUE7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EpexiyFmhfGiiedh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/setting/upload-logo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@uploadLogo',
        'controller' => 'App\\Http\\Controllers\\SettingsController@uploadLogo',
        'namespace' => NULL,
        'prefix' => 'api/admin/setting',
        'where' => 
        array (
        ),
        'as' => 'generated::EpexiyFmhfGiiedh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JLiBmMIz9NJ2uqrP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/setting/convert-image/{imageName}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@convert',
        'controller' => 'App\\Http\\Controllers\\SettingsController@convert',
        'namespace' => NULL,
        'prefix' => 'api/admin/setting',
        'where' => 
        array (
        ),
        'as' => 'generated::JLiBmMIz9NJ2uqrP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3gb98HtndGxu9DR6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/vendor-store/find',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\VendorStoresController@find',
        'controller' => 'App\\Http\\Controllers\\VendorStoresController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/vendor-store',
        'where' => 
        array (
        ),
        'as' => 'generated::3gb98HtndGxu9DR6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OCeHk1WLNALq2d3m' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/vendor-store/action',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\VendorStoresController@act ion',
        'controller' => 'App\\Http\\Controllers\\VendorStoresController@act ion',
        'namespace' => NULL,
        'prefix' => 'api/admin/vendor-store',
        'where' => 
        array (
        ),
        'as' => 'generated::OCeHk1WLNALq2d3m',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bTZ8H4uOo3HOiS6x' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/vendor-store/upload-logo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\VendorStoresController@uploadLogo',
        'controller' => 'App\\Http\\Controllers\\VendorStoresController@uploadLogo',
        'namespace' => NULL,
        'prefix' => 'api/admin/vendor-store',
        'where' => 
        array (
        ),
        'as' => 'generated::bTZ8H4uOo3HOiS6x',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QyVDnsPMwNrDrE6S' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/withdrawal-account/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\WithdrawalAccountsController@all',
        'controller' => 'App\\Http\\Controllers\\WithdrawalAccountsController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/withdrawal-account',
        'where' => 
        array (
        ),
        'as' => 'generated::QyVDnsPMwNrDrE6S',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jJB0VqL7FeAEoQ71' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/withdrawal-account/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\WithdrawalAccountsController@find',
        'controller' => 'App\\Http\\Controllers\\WithdrawalAccountsController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/withdrawal-account',
        'where' => 
        array (
        ),
        'as' => 'generated::jJB0VqL7FeAEoQ71',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RRuZd7frfa0aRDnX' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/withdrawal-account/action/{withdrawalAccount?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\WithdrawalAccountsController@action',
        'controller' => 'App\\Http\\Controllers\\WithdrawalAccountsController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/withdrawal-account',
        'where' => 
        array (
        ),
        'as' => 'generated::RRuZd7frfa0aRDnX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mKqpQU1VPbEr3bgb' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/withdrawal-account/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\WithdrawalAccountsController@delete',
        'controller' => 'App\\Http\\Controllers\\WithdrawalAccountsController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/withdrawal-account',
        'where' => 
        array (
        ),
        'as' => 'generated::mKqpQU1VPbEr3bgb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UHPdKa4pruKbmUgz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/withdrawal-request/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\WithdrawalsController@all',
        'controller' => 'App\\Http\\Controllers\\WithdrawalsController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/withdrawal-request',
        'where' => 
        array (
        ),
        'as' => 'generated::UHPdKa4pruKbmUgz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::V9CJmYJoJyWswyRX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/withdrawal-request/find',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\WithdrawalsController@find',
        'controller' => 'App\\Http\\Controllers\\WithdrawalsController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/withdrawal-request',
        'where' => 
        array (
        ),
        'as' => 'generated::V9CJmYJoJyWswyRX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HNWXgnK7KjoJnEgn' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/withdrawal-request/withdraw',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\WithdrawalsController@withdrawMoney',
        'controller' => 'App\\Http\\Controllers\\WithdrawalsController@withdrawMoney',
        'namespace' => NULL,
        'prefix' => 'api/admin/withdrawal-request',
        'where' => 
        array (
        ),
        'as' => 'generated::HNWXgnK7KjoJnEgn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XlGPAXbTnn89THbh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/withdrawal-request/cancel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\WithdrawalsController@withdrawCancel',
        'controller' => 'App\\Http\\Controllers\\WithdrawalsController@withdrawCancel',
        'namespace' => NULL,
        'prefix' => 'api/admin/withdrawal-request',
        'where' => 
        array (
        ),
        'as' => 'generated::XlGPAXbTnn89THbh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::SoeUYAGOlSJj97XA' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/withdrawal-request/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\WithdrawalsController@withdrawApprove',
        'controller' => 'App\\Http\\Controllers\\WithdrawalsController@withdrawApprove',
        'namespace' => NULL,
        'prefix' => 'api/admin/withdrawal-request',
        'where' => 
        array (
        ),
        'as' => 'generated::SoeUYAGOlSJj97XA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IdQbDneaeDn0uxhy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/withdrawal-request/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\WithdrawalsController@delete',
        'controller' => 'App\\Http\\Controllers\\WithdrawalsController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/withdrawal-request',
        'where' => 
        array (
        ),
        'as' => 'generated::IdQbDneaeDn0uxhy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dQFIugRlCww2BASx' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/payment/find',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentsController@find',
        'controller' => 'App\\Http\\Controllers\\PaymentsController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/payment',
        'where' => 
        array (
        ),
        'as' => 'generated::dQFIugRlCww2BASx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aHpWxBR1TlwjQcUk' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/payment/save',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentsController@save',
        'controller' => 'App\\Http\\Controllers\\PaymentsController@save',
        'namespace' => NULL,
        'prefix' => 'api/admin/payment',
        'where' => 
        array (
        ),
        'as' => 'generated::aHpWxBR1TlwjQcUk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Xq8XZ84FoXDnFKuG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/user/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\UsersController@all',
        'controller' => 'App\\Http\\Controllers\\UsersController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/user',
        'where' => 
        array (
        ),
        'as' => 'generated::Xq8XZ84FoXDnFKuG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hazIuk4qHnsbA6Dp' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/user/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\UsersController@delete',
        'controller' => 'App\\Http\\Controllers\\UsersController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/user',
        'where' => 
        array (
        ),
        'as' => 'generated::hazIuk4qHnsbA6Dp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pSYUaycM2WdZVHSS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/subscriber/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubscriptionEmailsController@all',
        'controller' => 'App\\Http\\Controllers\\SubscriptionEmailsController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/subscriber',
        'where' => 
        array (
        ),
        'as' => 'generated::pSYUaycM2WdZVHSS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::698km2ovS95XcFzN' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/subscriber/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubscriptionEmailsController@delete',
        'controller' => 'App\\Http\\Controllers\\SubscriptionEmailsController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/subscriber',
        'where' => 
        array (
        ),
        'as' => 'generated::698km2ovS95XcFzN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ej5RL8wfRX6M4yU5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/subscriber/all-subscribers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubscriptionEmailsController@allSubscribers',
        'controller' => 'App\\Http\\Controllers\\SubscriptionEmailsController@allSubscribers',
        'namespace' => NULL,
        'prefix' => 'api/admin/subscriber',
        'where' => 
        array (
        ),
        'as' => 'generated::ej5RL8wfRX6M4yU5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Mm1GHiH99chf2LWb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/subscriber/send-subscription-email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubscriptionEmailsController@sendSubscriptionEmail',
        'controller' => 'App\\Http\\Controllers\\SubscriptionEmailsController@sendSubscriptionEmail',
        'namespace' => NULL,
        'prefix' => 'api/admin/subscriber',
        'where' => 
        array (
        ),
        'as' => 'generated::Mm1GHiH99chf2LWb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uRF6S9u7awAYBRt7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/subscription-email-format/all-subscription-email-formats',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubscriptionEmailFormatsController@allEmailFormats',
        'controller' => 'App\\Http\\Controllers\\SubscriptionEmailFormatsController@allEmailFormats',
        'namespace' => NULL,
        'prefix' => 'api/admin/subscription-email-format',
        'where' => 
        array (
        ),
        'as' => 'generated::uRF6S9u7awAYBRt7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Ttj7MVyDQVT1ts3S' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/subscription-email-format/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubscriptionEmailFormatsController@all',
        'controller' => 'App\\Http\\Controllers\\SubscriptionEmailFormatsController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/subscription-email-format',
        'where' => 
        array (
        ),
        'as' => 'generated::Ttj7MVyDQVT1ts3S',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Rv15Gt2k1M5aoXpv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/subscription-email-format/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubscriptionEmailFormatsController@find',
        'controller' => 'App\\Http\\Controllers\\SubscriptionEmailFormatsController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/subscription-email-format',
        'where' => 
        array (
        ),
        'as' => 'generated::Rv15Gt2k1M5aoXpv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Ckxseme8YhkVu1pn' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/subscription-email-format/action/{subscriptionEmailFormat?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubscriptionEmailFormatsController@action',
        'controller' => 'App\\Http\\Controllers\\SubscriptionEmailFormatsController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/subscription-email-format',
        'where' => 
        array (
        ),
        'as' => 'generated::Ckxseme8YhkVu1pn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::R9uTnJU3GWrb006T' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/subscription-email-format/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubscriptionEmailFormatsController@delete',
        'controller' => 'App\\Http\\Controllers\\SubscriptionEmailFormatsController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/subscription-email-format',
        'where' => 
        array (
        ),
        'as' => 'generated::R9uTnJU3GWrb006T',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ko13mYlq4Ka9oHQf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/user-message/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ContactUsController@all',
        'controller' => 'App\\Http\\Controllers\\ContactUsController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/user-message',
        'where' => 
        array (
        ),
        'as' => 'generated::ko13mYlq4Ka9oHQf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::AvhFoSKW77nXHS8o' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/user-message/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ContactUsController@find',
        'controller' => 'App\\Http\\Controllers\\ContactUsController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/user-message',
        'where' => 
        array (
        ),
        'as' => 'generated::AvhFoSKW77nXHS8o',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OmoBC4GQW1ThPpMp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/user-message/action/{contactUs?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ContactUsController@action',
        'controller' => 'App\\Http\\Controllers\\ContactUsController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/user-message',
        'where' => 
        array (
        ),
        'as' => 'generated::OmoBC4GQW1ThPpMp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VAS0YnG6gpjenclb' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/user-message/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ContactUsController@delete',
        'controller' => 'App\\Http\\Controllers\\ContactUsController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/user-message',
        'where' => 
        array (
        ),
        'as' => 'generated::VAS0YnG6gpjenclb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XMOy0xiNZ1xSqbjs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/page/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PagesController@all',
        'controller' => 'App\\Http\\Controllers\\PagesController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/page',
        'where' => 
        array (
        ),
        'as' => 'generated::XMOy0xiNZ1xSqbjs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::N264VoDXNLQnEEV4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/page/all-pages',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PagesController@allPages',
        'controller' => 'App\\Http\\Controllers\\PagesController@allPages',
        'namespace' => NULL,
        'prefix' => 'api/admin/page',
        'where' => 
        array (
        ),
        'as' => 'generated::N264VoDXNLQnEEV4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pSObeQLQ9auZS9cv' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/page/action/{page?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PagesController@action',
        'controller' => 'App\\Http\\Controllers\\PagesController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/page',
        'where' => 
        array (
        ),
        'as' => 'generated::pSObeQLQ9auZS9cv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8HaD2DVB7Bda8c6M' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/page/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PagesController@delete',
        'controller' => 'App\\Http\\Controllers\\PagesController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/page',
        'where' => 
        array (
        ),
        'as' => 'generated::8HaD2DVB7Bda8c6M',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DoBNznppZ4SYIwZg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/page/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PagesController@find',
        'controller' => 'App\\Http\\Controllers\\PagesController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/page',
        'where' => 
        array (
        ),
        'as' => 'generated::DoBNznppZ4SYIwZg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::F8Gbcc1e2clecFvZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/footer-link/all2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FooterLinksController@all',
        'controller' => 'App\\Http\\Controllers\\FooterLinksController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/footer-link',
        'where' => 
        array (
        ),
        'as' => 'generated::F8Gbcc1e2clecFvZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4mPMoyWbpKk1mHss' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/footer-link/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FooterLinksController@all2',
        'controller' => 'App\\Http\\Controllers\\FooterLinksController@all2',
        'namespace' => NULL,
        'prefix' => 'api/admin/footer-link',
        'where' => 
        array (
        ),
        'as' => 'generated::4mPMoyWbpKk1mHss',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DTk2ABd02q7RYqxO' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/footer-link/payment-social-action/{footerLink?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FooterLinksController@action',
        'controller' => 'App\\Http\\Controllers\\FooterLinksController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/footer-link',
        'where' => 
        array (
        ),
        'as' => 'generated::DTk2ABd02q7RYqxO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BSueW7Uo7bFqWHmb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/footer-link/service-about-action',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FooterLinksController@serviceAndAboutAction',
        'controller' => 'App\\Http\\Controllers\\FooterLinksController@serviceAndAboutAction',
        'namespace' => NULL,
        'prefix' => 'api/admin/footer-link',
        'where' => 
        array (
        ),
        'as' => 'generated::BSueW7Uo7bFqWHmb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4bQxTyMkZ6sN8Pz8' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/footer-link/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FooterLinksController@delete',
        'controller' => 'App\\Http\\Controllers\\FooterLinksController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/footer-link',
        'where' => 
        array (
        ),
        'as' => 'generated::4bQxTyMkZ6sN8Pz8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xX0hWa4wdbf9SQWu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/footer-image-link/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FooterImageLinksController@all',
        'controller' => 'App\\Http\\Controllers\\FooterImageLinksController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/footer-image-link',
        'where' => 
        array (
        ),
        'as' => 'generated::xX0hWa4wdbf9SQWu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4sbu1Jiglo0eNzAc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/footer-image-link/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FooterImageLinksController@find',
        'controller' => 'App\\Http\\Controllers\\FooterImageLinksController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/footer-image-link',
        'where' => 
        array (
        ),
        'as' => 'generated::4sbu1Jiglo0eNzAc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::26oKRkCFtAiop6Yo' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/footer-image-link/action/{footerImageLink?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FooterImageLinksController@action',
        'controller' => 'App\\Http\\Controllers\\FooterImageLinksController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/footer-image-link',
        'where' => 
        array (
        ),
        'as' => 'generated::26oKRkCFtAiop6Yo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ozICd70NVsgmuZfc' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/footer-image-link/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FooterImageLinksController@delete',
        'controller' => 'App\\Http\\Controllers\\FooterImageLinksController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/footer-image-link',
        'where' => 
        array (
        ),
        'as' => 'generated::ozICd70NVsgmuZfc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::e14otHR3fYj6zaLh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/footer-image-link/image/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FooterImageLinksController@upload',
        'controller' => 'App\\Http\\Controllers\\FooterImageLinksController@upload',
        'namespace' => NULL,
        'prefix' => 'api/admin/footer-image-link',
        'where' => 
        array (
        ),
        'as' => 'generated::e14otHR3fYj6zaLh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZMqcFVTMEuFBAF6u' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/home-slider-image/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeSlidersController@all2',
        'controller' => 'App\\Http\\Controllers\\HomeSlidersController@all2',
        'namespace' => NULL,
        'prefix' => 'api/admin/home-slider-image',
        'where' => 
        array (
        ),
        'as' => 'generated::ZMqcFVTMEuFBAF6u',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VIisuf9XND3HUm7m' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/home-slider-image/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeSlidersController@find',
        'controller' => 'App\\Http\\Controllers\\HomeSlidersController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/home-slider-image',
        'where' => 
        array (
        ),
        'as' => 'generated::VIisuf9XND3HUm7m',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uiUUbvcLpJn58pbf' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/home-slider-image/action/{homeSlider?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeSlidersController@action2',
        'controller' => 'App\\Http\\Controllers\\HomeSlidersController@action2',
        'namespace' => NULL,
        'prefix' => 'api/admin/home-slider-image',
        'where' => 
        array (
        ),
        'as' => 'generated::uiUUbvcLpJn58pbf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::n3dO64B6VfVTPx9H' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/home-slider-image/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeSlidersController@delete',
        'controller' => 'App\\Http\\Controllers\\HomeSlidersController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/home-slider-image',
        'where' => 
        array (
        ),
        'as' => 'generated::n3dO64B6VfVTPx9H',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yFBvtF1R8Ekndn6I' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/home-slider-image/image/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeSlidersController@upload',
        'controller' => 'App\\Http\\Controllers\\HomeSlidersController@upload',
        'namespace' => NULL,
        'prefix' => 'api/admin/home-slider-image',
        'where' => 
        array (
        ),
        'as' => 'generated::yFBvtF1R8Ekndn6I',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RIpEJzYn1JG6UbPE' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/home-slider-image/upload/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeSlidersController@upload',
        'controller' => 'App\\Http\\Controllers\\HomeSlidersController@upload',
        'namespace' => NULL,
        'prefix' => 'api/admin/home-slider-image',
        'where' => 
        array (
        ),
        'as' => 'generated::RIpEJzYn1JG6UbPE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HWpdD4W76PTOnRiG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/banner/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BannersController@all',
        'controller' => 'App\\Http\\Controllers\\BannersController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/banner',
        'where' => 
        array (
        ),
        'as' => 'generated::HWpdD4W76PTOnRiG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XawQEvanOB9dXlIO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/banner/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BannersController@find',
        'controller' => 'App\\Http\\Controllers\\BannersController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/banner',
        'where' => 
        array (
        ),
        'as' => 'generated::XawQEvanOB9dXlIO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zAoEeiqPwIhzjtVh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/banner/action/{banner?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BannersController@action',
        'controller' => 'App\\Http\\Controllers\\BannersController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/banner',
        'where' => 
        array (
        ),
        'as' => 'generated::zAoEeiqPwIhzjtVh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VmvvPTie4aEmCAtL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/banner/image/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BannersController@upload',
        'controller' => 'App\\Http\\Controllers\\BannersController@upload',
        'namespace' => NULL,
        'prefix' => 'api/admin/banner',
        'where' => 
        array (
        ),
        'as' => 'generated::VmvvPTie4aEmCAtL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aFlEw16Oqz6cwryG' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/banner/upload/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BannersController@upload',
        'controller' => 'App\\Http\\Controllers\\BannersController@upload',
        'namespace' => NULL,
        'prefix' => 'api/admin/banner',
        'where' => 
        array (
        ),
        'as' => 'generated::aFlEw16Oqz6cwryG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5Pls1UnXeksiS1Bh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/flash-sale/all2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FlashSalesController@all',
        'controller' => 'App\\Http\\Controllers\\FlashSalesController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/flash-sale',
        'where' => 
        array (
        ),
        'as' => 'generated::5Pls1UnXeksiS1Bh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::krXDkRsjnZnLC86n' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/flash-sale/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FlashSalesController@all2',
        'controller' => 'App\\Http\\Controllers\\FlashSalesController@all2',
        'namespace' => NULL,
        'prefix' => 'api/admin/flash-sale',
        'where' => 
        array (
        ),
        'as' => 'generated::krXDkRsjnZnLC86n',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZvhPCQyZvQTmGMoG' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/flash-sale/action2/{flashSale?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FlashSalesController@action',
        'controller' => 'App\\Http\\Controllers\\FlashSalesController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/flash-sale',
        'where' => 
        array (
        ),
        'as' => 'generated::ZvhPCQyZvQTmGMoG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ArSVbrbiDllRu3NP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/flash-sale/action/{flashSale?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FlashSalesController@action2',
        'controller' => 'App\\Http\\Controllers\\FlashSalesController@action2',
        'namespace' => NULL,
        'prefix' => 'api/admin/flash-sale',
        'where' => 
        array (
        ),
        'as' => 'generated::ArSVbrbiDllRu3NP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::M1vVGJ5lHkHh84Bx' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/flash-sale/find2/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FlashSalesController@find',
        'controller' => 'App\\Http\\Controllers\\FlashSalesController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/flash-sale',
        'where' => 
        array (
        ),
        'as' => 'generated::M1vVGJ5lHkHh84Bx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rEhmF6twVrVYNeto' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/flash-sale/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FlashSalesController@find2',
        'controller' => 'App\\Http\\Controllers\\FlashSalesController@find2',
        'namespace' => NULL,
        'prefix' => 'api/admin/flash-sale',
        'where' => 
        array (
        ),
        'as' => 'generated::rEhmF6twVrVYNeto',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TNSW0YSUJ25cPU8d' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/flash-sale/find-products/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FlashSalesController@findProducts',
        'controller' => 'App\\Http\\Controllers\\FlashSalesController@findProducts',
        'namespace' => NULL,
        'prefix' => 'api/admin/flash-sale',
        'where' => 
        array (
        ),
        'as' => 'generated::TNSW0YSUJ25cPU8d',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ahieIbFOjIwwuIwR' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/flash-sale/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\FlashSalesController@delete',
        'controller' => 'App\\Http\\Controllers\\FlashSalesController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/flash-sale',
        'where' => 
        array (
        ),
        'as' => 'generated::ahieIbFOjIwwuIwR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NDwWlYE3QmS7Znex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/tax-rule/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TaxRulesController@all',
        'controller' => 'App\\Http\\Controllers\\TaxRulesController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/tax-rule',
        'where' => 
        array (
        ),
        'as' => 'generated::NDwWlYE3QmS7Znex',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zjNn0HEWTEBYPhZ5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/tax-rule/all-tax-rules',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TaxRulesController@allList',
        'controller' => 'App\\Http\\Controllers\\TaxRulesController@allList',
        'namespace' => NULL,
        'prefix' => 'api/admin/tax-rule',
        'where' => 
        array (
        ),
        'as' => 'generated::zjNn0HEWTEBYPhZ5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CDXJzxxE8VNxOiqJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/tax-rule/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TaxRulesController@find',
        'controller' => 'App\\Http\\Controllers\\TaxRulesController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/tax-rule',
        'where' => 
        array (
        ),
        'as' => 'generated::CDXJzxxE8VNxOiqJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xPEdMQVb13e6OjhM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/tax-rule/action/{taxRules?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TaxRulesController@action',
        'controller' => 'App\\Http\\Controllers\\TaxRulesController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/tax-rule',
        'where' => 
        array (
        ),
        'as' => 'generated::xPEdMQVb13e6OjhM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QSlQIPKFv9sIDkt1' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/tax-rule/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TaxRulesController@delete',
        'controller' => 'App\\Http\\Controllers\\TaxRulesController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/tax-rule',
        'where' => 
        array (
        ),
        'as' => 'generated::QSlQIPKFv9sIDkt1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::19I987OCDdcg1PJq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/voucher/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\VouchersController@all',
        'controller' => 'App\\Http\\Controllers\\VouchersController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/voucher',
        'where' => 
        array (
        ),
        'as' => 'generated::19I987OCDdcg1PJq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::J0LKiIolXp8LLhLh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/voucher/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\VouchersController@find',
        'controller' => 'App\\Http\\Controllers\\VouchersController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/voucher',
        'where' => 
        array (
        ),
        'as' => 'generated::J0LKiIolXp8LLhLh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HbaxKnB1ATzuhcWN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/voucher/action/{voucher?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\VouchersController@action',
        'controller' => 'App\\Http\\Controllers\\VouchersController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/voucher',
        'where' => 
        array (
        ),
        'as' => 'generated::HbaxKnB1ATzuhcWN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8X7s2flzqdhAsy09' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/voucher/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\VouchersController@delete',
        'controller' => 'App\\Http\\Controllers\\VouchersController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/voucher',
        'where' => 
        array (
        ),
        'as' => 'generated::8X7s2flzqdhAsy09',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KEhxotJNJ8mczwKM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/bundle-deal/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BundleDealsController@all',
        'controller' => 'App\\Http\\Controllers\\BundleDealsController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/bundle-deal',
        'where' => 
        array (
        ),
        'as' => 'generated::KEhxotJNJ8mczwKM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IkbWEoLSFgk8pvEj' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/bundle-deal/all-bundle-deals',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BundleDealsController@allList',
        'controller' => 'App\\Http\\Controllers\\BundleDealsController@allList',
        'namespace' => NULL,
        'prefix' => 'api/admin/bundle-deal',
        'where' => 
        array (
        ),
        'as' => 'generated::IkbWEoLSFgk8pvEj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3aevd9jMDfF3cICk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/bundle-deal/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BundleDealsController@find',
        'controller' => 'App\\Http\\Controllers\\BundleDealsController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/bundle-deal',
        'where' => 
        array (
        ),
        'as' => 'generated::3aevd9jMDfF3cICk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5EjM7Gt15dGyC0gg' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/bundle-deal/action/{bundleDeal?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BundleDealsController@action',
        'controller' => 'App\\Http\\Controllers\\BundleDealsController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/bundle-deal',
        'where' => 
        array (
        ),
        'as' => 'generated::5EjM7Gt15dGyC0gg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bPa8TsYT3Uua9eCp' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/bundle-deal/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\BundleDealsController@delete',
        'controller' => 'App\\Http\\Controllers\\BundleDealsController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/bundle-deal',
        'where' => 
        array (
        ),
        'as' => 'generated::bPa8TsYT3Uua9eCp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3u3J8lDTmPIWmg5X' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/shipping-rule/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ShippingRulesController@all',
        'controller' => 'App\\Http\\Controllers\\ShippingRulesController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/shipping-rule',
        'where' => 
        array (
        ),
        'as' => 'generated::3u3J8lDTmPIWmg5X',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KTdEyuu5S03WcPCJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/shipping-rule/all-shipping-rules',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ShippingRulesController@allList',
        'controller' => 'App\\Http\\Controllers\\ShippingRulesController@allList',
        'namespace' => NULL,
        'prefix' => 'api/admin/shipping-rule',
        'where' => 
        array (
        ),
        'as' => 'generated::KTdEyuu5S03WcPCJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aGmBYDRl261OvJdM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/shipping-rule/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ShippingRulesController@find',
        'controller' => 'App\\Http\\Controllers\\ShippingRulesController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/shipping-rule',
        'where' => 
        array (
        ),
        'as' => 'generated::aGmBYDRl261OvJdM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nys8nxJWSquGhNIE' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/shipping-rule/action/{shippingRules?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ShippingRulesController@action',
        'controller' => 'App\\Http\\Controllers\\ShippingRulesController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/shipping-rule',
        'where' => 
        array (
        ),
        'as' => 'generated::nys8nxJWSquGhNIE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2pksCkFSqmfmgAHK' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/shipping-rule/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ShippingRulesController@delete',
        'controller' => 'App\\Http\\Controllers\\ShippingRulesController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/shipping-rule',
        'where' => 
        array (
        ),
        'as' => 'generated::2pksCkFSqmfmgAHK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7Xj2v0ShXHNMU1so' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/wysiwyg-image/upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\WysiwygImagesController@upload',
        'controller' => 'App\\Http\\Controllers\\WysiwygImagesController@upload',
        'namespace' => NULL,
        'prefix' => 'api/admin/wysiwyg-image',
        'where' => 
        array (
        ),
        'as' => 'generated::7Xj2v0ShXHNMU1so',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gf06iSVsIpzopuLv' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/wysiwyg-image/delete/{image_name}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\WysiwygImagesController@delete',
        'controller' => 'App\\Http\\Controllers\\WysiwygImagesController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/wysiwyg-image',
        'where' => 
        array (
        ),
        'as' => 'generated::gf06iSVsIpzopuLv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wz9RWXQUbolImc5V' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/page-wysiwyg-image/upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PageWysiwygImagesController@upload',
        'controller' => 'App\\Http\\Controllers\\PageWysiwygImagesController@upload',
        'namespace' => NULL,
        'prefix' => 'api/admin/page-wysiwyg-image',
        'where' => 
        array (
        ),
        'as' => 'generated::wz9RWXQUbolImc5V',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UmZWZiexJyogfZVW' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/page-wysiwyg-image/delete/{image_name}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PageWysiwygImagesController@delete',
        'controller' => 'App\\Http\\Controllers\\PageWysiwygImagesController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/page-wysiwyg-image',
        'where' => 
        array (
        ),
        'as' => 'generated::UmZWZiexJyogfZVW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MJCXbaGJw0dPbLCW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/product-collection/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductCollectionsController@all',
        'controller' => 'App\\Http\\Controllers\\ProductCollectionsController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/product-collection',
        'where' => 
        array (
        ),
        'as' => 'generated::MJCXbaGJw0dPbLCW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5NN7YNtxhhfh3Ftb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/product-collection/all-product-collections',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductCollectionsController@allList',
        'controller' => 'App\\Http\\Controllers\\ProductCollectionsController@allList',
        'namespace' => NULL,
        'prefix' => 'api/admin/product-collection',
        'where' => 
        array (
        ),
        'as' => 'generated::5NN7YNtxhhfh3Ftb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vi999vdZpJR6dyA6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/product-collection/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductCollectionsController@find',
        'controller' => 'App\\Http\\Controllers\\ProductCollectionsController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/product-collection',
        'where' => 
        array (
        ),
        'as' => 'generated::vi999vdZpJR6dyA6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NQqdbeYdeJCcFTBy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/product-collection/action/{productCollection?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductCollectionsController@action',
        'controller' => 'App\\Http\\Controllers\\ProductCollectionsController@action',
        'namespace' => NULL,
        'prefix' => 'api/admin/product-collection',
        'where' => 
        array (
        ),
        'as' => 'generated::NQqdbeYdeJCcFTBy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::s2xOexwspFwGyfj1' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/product-collection/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductCollectionsController@delete',
        'controller' => 'App\\Http\\Controllers\\ProductCollectionsController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/product-collection',
        'where' => 
        array (
        ),
        'as' => 'generated::s2xOexwspFwGyfj1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lVD6q8sj4AZ46Xda' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/order/all2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@all',
        'controller' => 'App\\Http\\Controllers\\OrdersController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/order',
        'where' => 
        array (
        ),
        'as' => 'generated::lVD6q8sj4AZ46Xda',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YMogmtrxuruFzfb4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/order/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@all2',
        'controller' => 'App\\Http\\Controllers\\OrdersController@all2',
        'namespace' => NULL,
        'prefix' => 'api/admin/order',
        'where' => 
        array (
        ),
        'as' => 'generated::YMogmtrxuruFzfb4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FCUud0yAWECgh4G0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/order/vendor-all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@vendorAll',
        'controller' => 'App\\Http\\Controllers\\OrdersController@vendorAll',
        'namespace' => NULL,
        'prefix' => 'api/admin/order',
        'where' => 
        array (
        ),
        'as' => 'generated::FCUud0yAWECgh4G0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DjfQtZyiTmHNnwNZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/order/find/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@find2',
        'controller' => 'App\\Http\\Controllers\\OrdersController@find2',
        'namespace' => NULL,
        'prefix' => 'api/admin/order',
        'where' => 
        array (
        ),
        'as' => 'generated::DjfQtZyiTmHNnwNZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZDTgT7SOvhH2krfv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/order/find2/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@find',
        'controller' => 'App\\Http\\Controllers\\OrdersController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/order',
        'where' => 
        array (
        ),
        'as' => 'generated::ZDTgT7SOvhH2krfv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QsieHSwiuCc9ESNs' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/order/update-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@updateStatus',
        'controller' => 'App\\Http\\Controllers\\OrdersController@updateStatus',
        'namespace' => NULL,
        'prefix' => 'api/admin/order',
        'where' => 
        array (
        ),
        'as' => 'generated::QsieHSwiuCc9ESNs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2IcNM5fYIwKqexin' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/order/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@delete',
        'controller' => 'App\\Http\\Controllers\\OrdersController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/order',
        'where' => 
        array (
        ),
        'as' => 'generated::2IcNM5fYIwKqexin',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ayJKkeftCyixVBwp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/order/send-delivered-email/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@sendDeliveredEmail',
        'controller' => 'App\\Http\\Controllers\\OrdersController@sendDeliveredEmail',
        'namespace' => NULL,
        'prefix' => 'api/admin/order',
        'where' => 
        array (
        ),
        'as' => 'generated::ayJKkeftCyixVBwp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9FugFJB6sOViOqoY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/rating-review/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\RatingReviewsController@all',
        'controller' => 'App\\Http\\Controllers\\RatingReviewsController@all',
        'namespace' => NULL,
        'prefix' => 'api/admin/rating-review',
        'where' => 
        array (
        ),
        'as' => 'generated::9FugFJB6sOViOqoY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NkRQqqiWgmBPQGBg' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/rating-review/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\RatingReviewsController@delete',
        'controller' => 'App\\Http\\Controllers\\RatingReviewsController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin/rating-review',
        'where' => 
        array (
        ),
        'as' => 'generated::NkRQqqiWgmBPQGBg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DC0VU7W40UhmaSjK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/cancellation/find/{orderId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\CancellationsController@find',
        'controller' => 'App\\Http\\Controllers\\CancellationsController@find',
        'namespace' => NULL,
        'prefix' => 'api/admin/cancellation',
        'where' => 
        array (
        ),
        'as' => 'generated::DC0VU7W40UhmaSjK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XelLvepjecAiy2Ks' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/cancellation/refund/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin',
          2 => 'scope:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\CancellationsController@refund',
        'controller' => 'App\\Http\\Controllers\\CancellationsController@refund',
        'namespace' => NULL,
        'prefix' => 'api/admin/cancellation',
        'where' => 
        array (
        ),
        'as' => 'generated::XelLvepjecAiy2Ks',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::frw6RSKGWxt9d7Ot' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/common',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\FrontendController@common',
        'controller' => 'App\\Http\\Controllers\\FrontendController@common',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::frw6RSKGWxt9d7Ot',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3yTnpWImroWF47kN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\FrontendController@home',
        'controller' => 'App\\Http\\Controllers\\FrontendController@home',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::3yTnpWImroWF47kN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aEWg61EWGDQsthZ2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/products',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\FrontendController@products',
        'controller' => 'App\\Http\\Controllers\\FrontendController@products',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::aEWg61EWGDQsthZ2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TblAPNjhYASWIJEs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/categories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\FrontendController@categories',
        'controller' => 'App\\Http\\Controllers\\FrontendController@categories',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::TblAPNjhYASWIJEs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sRJEW9Gi5oXEV1Gj' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/brands',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\FrontendController@brands',
        'controller' => 'App\\Http\\Controllers\\FrontendController@brands',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::sRJEW9Gi5oXEV1Gj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NvLOdMQxICyiRZN9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\FrontendController@search',
        'controller' => 'App\\Http\\Controllers\\FrontendController@search',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::NvLOdMQxICyiRZN9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0iZm9ZCeYCt7kFGS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/product/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\FrontendController@product',
        'controller' => 'App\\Http\\Controllers\\FrontendController@product',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::0iZm9ZCeYCt7kFGS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XIh7Kprqg6owOxoZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/flash-sale/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\FrontendController@flashSale',
        'controller' => 'App\\Http\\Controllers\\FrontendController@flashSale',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::XIh7Kprqg6owOxoZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tcjhkSQ5RAmUZnhP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/reviews/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\FrontendController@reviews',
        'controller' => 'App\\Http\\Controllers\\FrontendController@reviews',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::tcjhkSQ5RAmUZnhP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yMuaTKJ4h28TuY7Z' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/suggested-products/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\FrontendController@productSuggestion',
        'controller' => 'App\\Http\\Controllers\\FrontendController@productSuggestion',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::yMuaTKJ4h28TuY7Z',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vH4XP57Zl6l5ru4t' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/page/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\FrontendController@page',
        'controller' => 'App\\Http\\Controllers\\FrontendController@page',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::vH4XP57Zl6l5ru4t',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Opb71ZgyRsUBvH5A' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/contact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\FrontendController@contactUs',
        'controller' => 'App\\Http\\Controllers\\FrontendController@contactUs',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::Opb71ZgyRsUBvH5A',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hrUm21oJ194eQXC3' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/email-subscription',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\SubscriptionEmailsController@emailSubscription',
        'controller' => 'App\\Http\\Controllers\\SubscriptionEmailsController@emailSubscription',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::hrUm21oJ194eQXC3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tROEILRNKLVUb7Dq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/install/configured',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\InstallController@configured',
        'controller' => 'App\\Http\\Controllers\\InstallController@configured',
        'namespace' => NULL,
        'prefix' => 'api/v1/install',
        'where' => 
        array (
        ),
        'as' => 'generated::tROEILRNKLVUb7Dq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tvfclVBlpeySz9lL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/install/set-database',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\InstallController@setDatabase',
        'controller' => 'App\\Http\\Controllers\\InstallController@setDatabase',
        'namespace' => NULL,
        'prefix' => 'api/v1/install',
        'where' => 
        array (
        ),
        'as' => 'generated::tvfclVBlpeySz9lL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::w4eAarZNhgyENdZK' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/install/set-permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\InstallController@setPermission',
        'controller' => 'App\\Http\\Controllers\\InstallController@setPermission',
        'namespace' => NULL,
        'prefix' => 'api/v1/install',
        'where' => 
        array (
        ),
        'as' => 'generated::w4eAarZNhgyENdZK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::M5wU0pwfncEAYrie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/cart/by-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\CartsController@byUser',
        'controller' => 'App\\Http\\Controllers\\CartsController@byUser',
        'namespace' => NULL,
        'prefix' => 'api/v1/cart',
        'where' => 
        array (
        ),
        'as' => 'generated::M5wU0pwfncEAYrie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fdBxD0ugLwx55hjV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/cart/action',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\CartsController@action',
        'controller' => 'App\\Http\\Controllers\\CartsController@action',
        'namespace' => NULL,
        'prefix' => 'api/v1/cart',
        'where' => 
        array (
        ),
        'as' => 'generated::fdBxD0ugLwx55hjV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uEvkHuRlc7PJRDxB' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/cart/buy-now',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\CartsController@buyNow',
        'controller' => 'App\\Http\\Controllers\\CartsController@buyNow',
        'namespace' => NULL,
        'prefix' => 'api/v1/cart',
        'where' => 
        array (
        ),
        'as' => 'generated::uEvkHuRlc7PJRDxB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EDzLsGPvqoQzBA0Q' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/cart/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\CartsController@delete',
        'controller' => 'App\\Http\\Controllers\\CartsController@delete',
        'namespace' => NULL,
        'prefix' => 'api/v1/cart',
        'where' => 
        array (
        ),
        'as' => 'generated::EDzLsGPvqoQzBA0Q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hvvIqcDzU0ffwWxQ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/cart/change',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\CartsController@changeSelected',
        'controller' => 'App\\Http\\Controllers\\CartsController@changeSelected',
        'namespace' => NULL,
        'prefix' => 'api/v1/cart',
        'where' => 
        array (
        ),
        'as' => 'generated::hvvIqcDzU0ffwWxQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ywVt1WuPPR9HebGl' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/cart/update-shipping',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\CartsController@updateShipping',
        'controller' => 'App\\Http\\Controllers\\CartsController@updateShipping',
        'namespace' => NULL,
        'prefix' => 'api/v1/cart',
        'where' => 
        array (
        ),
        'as' => 'generated::ywVt1WuPPR9HebGl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vN4Y7rwykDN8n8sW' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/rating-review/action/{ratingReview?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\RatingReviewsController@action',
        'controller' => 'App\\Http\\Controllers\\RatingReviewsController@action',
        'namespace' => NULL,
        'prefix' => 'api/v1/rating-review',
        'where' => 
        array (
        ),
        'as' => 'generated::vN4Y7rwykDN8n8sW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rk6QtQ433qmiwlkD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/rating-review/find/{productId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\RatingReviewsController@find',
        'controller' => 'App\\Http\\Controllers\\RatingReviewsController@find',
        'namespace' => NULL,
        'prefix' => 'api/v1/rating-review',
        'where' => 
        array (
        ),
        'as' => 'generated::rk6QtQ433qmiwlkD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7n610O0yWsU2VJGe' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/order/by-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@byUser',
        'controller' => 'App\\Http\\Controllers\\OrdersController@byUser',
        'namespace' => NULL,
        'prefix' => 'api/v1/order',
        'where' => 
        array (
        ),
        'as' => 'generated::7n610O0yWsU2VJGe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IN5AQnkRSDlCW8sI' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/order/action',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@action',
        'controller' => 'App\\Http\\Controllers\\OrdersController@action',
        'namespace' => NULL,
        'prefix' => 'api/v1/order',
        'where' => 
        array (
        ),
        'as' => 'generated::IN5AQnkRSDlCW8sI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qwnZZ1fOvJ7jJHqe' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/order/payment-done',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@paymentDone',
        'controller' => 'App\\Http\\Controllers\\OrdersController@paymentDone',
        'namespace' => NULL,
        'prefix' => 'api/v1/order',
        'where' => 
        array (
        ),
        'as' => 'generated::qwnZZ1fOvJ7jJHqe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YqrUnUmqxU42yaUO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/order/send-order-email/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@sendOrderEmail',
        'controller' => 'App\\Http\\Controllers\\OrdersController@sendOrderEmail',
        'namespace' => NULL,
        'prefix' => 'api/v1/order',
        'where' => 
        array (
        ),
        'as' => 'generated::YqrUnUmqxU42yaUO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RbJjItH9vFZiPYkJ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/cancellation/cancel-order',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\CancellationsController@cancelOrder',
        'controller' => 'App\\Http\\Controllers\\CancellationsController@cancelOrder',
        'namespace' => NULL,
        'prefix' => 'api/v1/cancellation',
        'where' => 
        array (
        ),
        'as' => 'generated::RbJjItH9vFZiPYkJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jeT31hAed4FlUoju' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/cancellation/find/{orderId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\CancellationsController@findCancellation',
        'controller' => 'App\\Http\\Controllers\\CancellationsController@findCancellation',
        'namespace' => NULL,
        'prefix' => 'api/v1/cancellation',
        'where' => 
        array (
        ),
        'as' => 'generated::jeT31hAed4FlUoju',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kJDLQNAD8Sh6HKaS' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/voucher/validity',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\VouchersController@validity',
        'controller' => 'App\\Http\\Controllers\\VouchersController@validity',
        'namespace' => NULL,
        'prefix' => 'api/v1/voucher',
        'where' => 
        array (
        ),
        'as' => 'generated::kJDLQNAD8Sh6HKaS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::T4zbI6lfJugC8rv4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/user/social-login/redirect/{service}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'social',
          2 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\UsersController@redirectToProvider',
        'controller' => 'App\\Http\\Controllers\\UsersController@redirectToProvider',
        'namespace' => NULL,
        'prefix' => 'api/v1/user/social-login',
        'where' => 
        array (
        ),
        'as' => 'generated::T4zbI6lfJugC8rv4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KaKqzj6VZiouErpp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/user/social-login/callback/{service}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'social',
          2 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\UsersController@handleProviderCallback',
        'controller' => 'App\\Http\\Controllers\\UsersController@handleProviderCallback',
        'namespace' => NULL,
        'prefix' => 'api/v1/user/social-login',
        'where' => 
        array (
        ),
        'as' => 'generated::KaKqzj6VZiouErpp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ceF7a6pyZEGjF8fe' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/user/signin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\UsersController@login',
        'controller' => 'App\\Http\\Controllers\\UsersController@login',
        'namespace' => NULL,
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
        'as' => 'generated::ceF7a6pyZEGjF8fe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7VKhR0UCibnGh26N' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/user/signup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\UsersController@signup',
        'controller' => 'App\\Http\\Controllers\\UsersController@signup',
        'namespace' => NULL,
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
        'as' => 'generated::7VKhR0UCibnGh26N',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hvIjHmyiy3IQHwsg' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/user/verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\UsersController@verify',
        'controller' => 'App\\Http\\Controllers\\UsersController@verify',
        'namespace' => NULL,
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
        'as' => 'generated::hvIjHmyiy3IQHwsg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::crfkzJ72ZEPhp4Qx' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/user/forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\UsersController@forgotPassword',
        'controller' => 'App\\Http\\Controllers\\UsersController@forgotPassword',
        'namespace' => NULL,
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
        'as' => 'generated::crfkzJ72ZEPhp4Qx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TzlrxQfmgIGdqx0J' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/user/update-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\UsersController@updatePassword',
        'controller' => 'App\\Http\\Controllers\\UsersController@updatePassword',
        'namespace' => NULL,
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
        'as' => 'generated::TzlrxQfmgIGdqx0J',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jdk68Vtkrazb2lPh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/user/user-vouchers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\UsersController@vouchers',
        'controller' => 'App\\Http\\Controllers\\UsersController@vouchers',
        'namespace' => NULL,
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
        'as' => 'generated::jdk68Vtkrazb2lPh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yS0FDuIbpxHD3E92' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/user/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\UsersController@logout',
        'controller' => 'App\\Http\\Controllers\\UsersController@logout',
        'namespace' => NULL,
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
        'as' => 'generated::yS0FDuIbpxHD3E92',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fuadWxj104kORXS8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/user/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\UsersController@profile',
        'controller' => 'App\\Http\\Controllers\\UsersController@profile',
        'namespace' => NULL,
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
        'as' => 'generated::fuadWxj104kORXS8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JLb3CHjqX0nw8IX4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/user/update-profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\UsersController@updateProfile',
        'controller' => 'App\\Http\\Controllers\\UsersController@updateProfile',
        'namespace' => NULL,
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
        'as' => 'generated::JLb3CHjqX0nw8IX4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KURA4LUzSbyZn4gM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/user/update-user-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\UsersController@updateUserPassword',
        'controller' => 'App\\Http\\Controllers\\UsersController@updateUserPassword',
        'namespace' => NULL,
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
        'as' => 'generated::KURA4LUzSbyZn4gM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8Lu8GinAXAfO8CH3' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/user/compare-list/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\CompareListsController@all',
        'controller' => 'App\\Http\\Controllers\\CompareListsController@all',
        'namespace' => NULL,
        'prefix' => 'api/v1/user/compare-list',
        'where' => 
        array (
        ),
        'as' => 'generated::8Lu8GinAXAfO8CH3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XHmHt8RBTARY8MNb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/user/compare-list/action',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\CompareListsController@action',
        'controller' => 'App\\Http\\Controllers\\CompareListsController@action',
        'namespace' => NULL,
        'prefix' => 'api/v1/user/compare-list',
        'where' => 
        array (
        ),
        'as' => 'generated::XHmHt8RBTARY8MNb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zOogDGVG3ZU3f7SH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/user/wishlist/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\UserWishlistsController@wishlists',
        'controller' => 'App\\Http\\Controllers\\UserWishlistsController@wishlists',
        'namespace' => NULL,
        'prefix' => 'api/v1/user/wishlist',
        'where' => 
        array (
        ),
        'as' => 'generated::zOogDGVG3ZU3f7SH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TRYtoRh2X6Litiwo' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/user/wishlist/action',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\UserWishlistsController@wishlistAction',
        'controller' => 'App\\Http\\Controllers\\UserWishlistsController@wishlistAction',
        'namespace' => NULL,
        'prefix' => 'api/v1/user/wishlist',
        'where' => 
        array (
        ),
        'as' => 'generated::TRYtoRh2X6Litiwo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cO3KxHJrEqVtvQNz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/user/address/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\UsersController@addresses',
        'controller' => 'App\\Http\\Controllers\\UsersController@addresses',
        'namespace' => NULL,
        'prefix' => 'api/v1/user/address',
        'where' => 
        array (
        ),
        'as' => 'generated::cO3KxHJrEqVtvQNz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::q1tfbQSCxDMlfhpy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/user/address/action',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\UsersController@addressAction',
        'controller' => 'App\\Http\\Controllers\\UsersController@addressAction',
        'namespace' => NULL,
        'prefix' => 'api/v1/user/address',
        'where' => 
        array (
        ),
        'as' => 'generated::q1tfbQSCxDMlfhpy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FlJMoBxX8DhwZaZB' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/user/address/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:user',
          2 => 'scope:user',
        ),
        'uses' => 'App\\Http\\Controllers\\UsersController@deleteAddress',
        'controller' => 'App\\Http\\Controllers\\UsersController@deleteAddress',
        'namespace' => NULL,
        'prefix' => 'api/v1/user/address',
        'where' => 
        array (
        ),
        'as' => 'generated::FlJMoBxX8DhwZaZB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6IlGIO8J4oL2dKKh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{any}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:262:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:44:"function () {
    return \\view(\'welcome\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000005521f7da000000002a534f23";}";s:4:"hash";s:44:"NsVEqa/eJW5RpcIZWcNSG7Cu8PfGu4mWQLaSMzvXvp4=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::6IlGIO8J4oL2dKKh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'any' => '(.*)',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
