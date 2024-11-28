<?php

//Inclui a rota de Home
@include  __DIR__.'/../routes/admin/Home.php';

//Inclui a rota de Login
@include  __DIR__.'/../routes/admin/login.php';

//Inclui a rota dos depoimentos de Admin
@include __DIR__.'/../routes/admin/Testimonies.php';

//Inclui a rota dos Usuarios
@include __DIR__.'/../routes/admin/User.php';
?>