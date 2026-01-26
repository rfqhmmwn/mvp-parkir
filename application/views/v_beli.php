<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Item - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets_pesan/assets/favicon.ico'); ?>" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url('assets_pesan/css/styles.css'); ?>" rel="stylesheet" />
    </head>
    <body>
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder"><?php echo $list_slot->nomer; ?></h1>
                        <div class="fs-5 mb-5">
                        </div>
                        <div class="d-flex">
							<form 
								action="<?= site_url('index/do_beli'); ?>" 
								method="post" 
								class="d-flex align-items-center gap-3 flex-wrap"
							>

								<div class="d-flex align-items-center gap-1">
									<label for="plat" class="mb-0">Plat</label>
									<input 
										id="plat"
										type="text"
										name="plat"
										class="form-control"
										placeholder="Plat Nomor"
										required
										style="max-width: 200px;"
									>
								</div>

								<div class="d-flex align-items-center gap-1">
									<label for="jenis" class="mb-0">Kendaraan</label>
									<select 
										id="jenis"
										name="jenis"
										class="form-select"
										required
										style="max-width: 150px;"
									>
										<option value="">Pilih</option>
										<option value="mobil(5000)">mobil</option>
										<option value="motor(2000)">motor</option>
									</select>
								</div>

								<input 
									type="hidden" 
									name="slot_id" 
									value="<?php echo $list_slot->id ?>"
								>

								<!-- Submit -->
								<button 
									type="submit" 
									class="btn btn-outline-dark flex-shrink-0"
								>
									<i class="bi-cart-fill me-1"></i>
									Buy 
								</button>

							</form>
						</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo base_url('assets_pesan/js/scripts.js'); ?>"></script>
    </body>
</html>
