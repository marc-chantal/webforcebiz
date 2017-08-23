<?php
	
	$w_routes = array(
		['GET',        '/', 'Default#home', 'home'],
		['GET|POST',   '/contact', 'Default#contact', 'contact'],

		['GET',        '/products', 'Products#index', 'products_index'],
		['GET|POST',   '/product/add', 'Products#add', 'products_add'],
		['GET',        '/product/[i:id]', 'Products#view', 'products_view'],
		['GET|POST',   '/product/[i:id]/edit', 'Products#edit', 'products_edit'],
		['GET',        '/product/[i:id]/delete', 'Products#delete', 'products_delete'],
	);