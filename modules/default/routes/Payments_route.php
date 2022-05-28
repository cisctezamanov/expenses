<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Payments Route
Route::prefix("api", function() {
  Route::prefix("payments", function() {
    // Payment Read
    Route::get("list-live", "payments/all/live");
  });
});

Route::get("payments", "payments/all");
Route::prefix("payments", function() {
  // Payment Create
  Route::get("add", "payments/add");
  Route::post("add", "payments/add/create");

  Route::prefix("{id}", function() {
    // Payment Update
    Route::get("edit", "payments/edit/getPayment/$1");
    Route::put("edit", "payments/edit/action/$1");

    // Payment Delete
    Route::delete("delete", "payments/edit/delete/$1");
  });
});
