// routes/api.php
<?php 

use App\Http\Controllers\process_registration;



Route::get('/pendaftaran/{transactionId}', [process_registration::class, 'getSnapToken'])->name('api.pendaftaran');

