<?php


session_start();
session_destroy();


header("Location:kullanici/giris?durum=gulegule");
