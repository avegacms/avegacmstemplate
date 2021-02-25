<?php namespace App\Controllers;

use http\Env\Request;

class Home extends BaseController
{
    public $themeSrc = 'themes/template/views/';

	public function index( $segment1 = '', $segment2 = '' )
	{
	    $viewData = [

            'isMain'          => TRUE,

            'breadcrumb'      => [

                ''            => 'Главная'
            ],

            'segment'         => $this->request->uri->getSegments()
        ];

	    $view = 'main_view';

	    if ( !empty($segment1) ) {

	        switch ($segment1) {

                case 'product':

                    $view = 'shop/products/products_page_view';

                    $viewData['breadcrumb'] += [

                        'catalog'      => 'Каталог',
                        'catalog/test' => 'Тестовая категория',
                        '/'            => 'Тестовый товар'
                    ];

                    break;

                case 'news':

                    $view = 'news/news_list_view';

                    $viewData['breadcrumb'] += [

                        'news' => 'Новости'
                    ];

                    if ($segment2)
                    {
                        $view = 'news/news_page_view';

                        $viewData['breadcrumb'] += [

                          '/' => 'Страница новости'
                        ];
                    }

                    break;

                case 'catalog':

                    $view = 'shop/categories/categories_list_view';

                    $viewData['breadcrumb'] += [

                        'catalog' => 'Каталог'
                    ];

                    if ($segment2)
                    {
                        $view = 'shop/categories/category_page_view';

                        $viewData['breadcrumb'] += [

                          '/' => 'Тестовая категория'
                        ];
                    }

                    break;

                case 'cart':

                    $view = 'shop/cart/cart_page_view';

                    $viewData['breadcrumb'] += [

                        'cart' => 'Корзина'
                    ];

                    break;

                case 'order':

                    $view = 'shop/order/order_page_view';

                    $viewData['breadcrumb'] += [

                        'order' => 'Оформление заказа'
                    ];

                    break;

                default:

                    $viewData['breadcrumb'] += [

                        '/' => 'Страница не найдена'
                    ];

                    $view = '404';

                    break;
            }

            $viewData['isMain'] = FALSE;
        }

	    $viewData['view'] = view($this->themeSrc . 'ui_elements/' . $view, $viewData);

		return view($this->themeSrc . 'theme_template_view', $viewData);
	}

	public function pageRender() {

	    return view($this->themeSrc . $view, $viewData);
    }
	//--------------------------------------------------------------------
}