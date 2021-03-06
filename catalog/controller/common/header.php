<?php
class ControllerCommonHeader extends Controller {
	public function index() {
		// Analytics
		$this->load->model('setting/extension');

		$data['analytics'] = array();

		$analytics = $this->model_setting_extension->getExtensions('analytics');

		foreach ($analytics as $analytic) {
			if ($this->config->get('analytics_' . $analytic['code'] . '_status')) {
				$data['analytics'][] = $this->load->controller('extension/analytics/' . $analytic['code'], $this->config->get('analytics_' . $analytic['code'] . '_status'));
			}
		}

		if ($this->request->server['HTTPS']) {
			$server = $this->config->get('config_ssl');
		} else {
			$server = $this->config->get('config_url');
		}

		if (is_file(DIR_IMAGE . $this->config->get('config_icon'))) {
			$this->document->addLink($server . 'image/' . $this->config->get('config_icon'), 'icon');
		}

		$data['title'] = $this->document->getTitle();

		$data['base'] = $server;
		$data['description'] = $this->document->getDescription();
		$data['keywords'] = $this->document->getKeywords();
		$data['links'] = $this->document->getLinks();
		$data['styles'] = $this->document->getStyles();
		$data['scripts'] = $this->document->getScripts('header');
		$data['lang'] = $this->language->get('code');
		$data['direction'] = $this->language->get('direction');

		$data['name'] = $this->config->get('config_name');

		if (is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
			$data['logo'] = $server . 'image/' . $this->config->get('config_logo');
		} else {
			$data['logo'] = '';
		}

		$language = $this->load->language('common/header');

		// Wishlist
		if ($this->customer->isLogged()) {
			$this->load->model('account/wishlist');

			$data['text_wishlist'] = sprintf($this->language->get('text_wishlist'), $this->model_account_wishlist->getTotalWishlist());
		} else {
			$data['text_wishlist'] = sprintf($this->language->get('text_wishlist'), (isset($this->session->data['wishlist']) ? count($this->session->data['wishlist']) : 0));
		}
		unset($language['text_wishlist']);

		$data['text_logged'] = sprintf($this->language->get('text_logged'), $this->url->link('account/account', '', true), $this->customer->getFirstName(), $this->url->link('account/logout', '', true));
        unset($language['text_logged']);
		
		$data['home'] = '/';
		$data['wishlist'] = '/account/wishlist';
		$data['logged'] = $this->customer->isLogged();
		$data['account'] = '/account/account';
		$data['register'] = '/account/register';
		$data['login'] = '/account/login';
		$data['order'] = '/account/order';
		$data['transaction'] = '/account/transaction';
		$data['download'] = '/account/download';
		$data['logout'] = '/account/logout';
		$data['shopping_cart'] = '/checkout/cart';
		$data['checkout'] = '/checkout/checkout';
		$data['contact'] = '/information/contact';
		$data['telephone'] = $this->config->get('config_telephone');
		
//		$data['language'] = $this->load->controller('common/language');
//		$data['currency'] = $this->load->controller('common/currency');
//		$data['search'] = $this->load->controller('common/search');
//		$data['cart'] = $this->load->controller('common/cart');
//		$data['menu'] = $this->load->controller('common/menu');

//		return $this->load->view('common/header', $data);
        $this->response->setOutput(json_encode(array_merge((array) $language, (array) $data)));
	}
}
