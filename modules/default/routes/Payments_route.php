<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Payments Route
Route::prefix("api", function() {
  Route::get("payments", "payments/all");
  Route::prefix("payments", function() {
    Route::get("list-live", "payments/all/live");

    Route::get("add", "payments/add");
    Route::post("add", "payments/add/create");

  });
});
