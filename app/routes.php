<?php
	
	$w_routes = array(
		// pages d'accueil et de contact
		['GET',        '/', 'Default#home', 'home'],
		['GET|POST',   '/contact', 'Default#contact', 'contact'],

		// sécurité / gestion des utilisateurs
		['GET|POST',   '/login', 'Security#signin', 'signin'],
		['GET|POST',   '/register', 'Security#signup', 'signup'],
		['GET',        '/logout', 'Security#signout', 'signout'],
		['GET|POST',   '/lost-password', 'Security#lostPwd', 'lost_pwd'],
		['GET|POST',   '/reset-password', 'Security#resetPwd', 'reset_pwd'],
		['GET',        '/profile', 'Security#profile', 'profile'],

		// gestion des produits
		['GET',        '/products', 'Products#index', 'products_index'],
		['GET|POST',   '/product/add', 'Products#add', 'products_add'],
		['GET',        '/product/[i:id]', 'Products#view', 'products_view'],
		['GET|POST',   '/product/[i:id]/edit', 'Products#edit', 'products_edit'],
		['GET|POST',   '/product/[i:id]/delete', 'Products#delete', 'products_delete'],
	);