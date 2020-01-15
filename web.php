<?php

use Damin\Route;

Route::get("/", "MainController@index");
Route::get("/stage", "StageController@index");
Route::get("/logout", "MainController@logout");

Route::post("/login", "MainController@login");
Route::post("/register", "MainController@register");