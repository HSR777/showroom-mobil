<div class="modal fade" id="updateCarModal" tabindex="-1" aria-labelledby="updateCarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateCarModalLabel">Update Car</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../../logics/admin/crud-mobil.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="id_mobil" name="id_mobil">
                    <div class="mb-3">
                        <label for="updateNamaMobil" class="form-label">Car Name</label>
                        <input type="text" class="form-control" id="updateNamaMobil" name="nama_mobil" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateMerekMobil" class="form-label">Car Brand</label>
                        <select class="form-select" id="updateMerekMobil" name="merek_mobil" required>
                            <option value="bmw">BMW</option>
                            <option value="ferrari">Ferrari</option>
                            <option value="lamborghini">Lamborghini</option>
                            <option value="mercedes">Mercedes-Benz</option>
                            <option value="porsche">Porsche</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="updateTipeMobil" class="form-label">Car Type</label>
                        <select class="form-select" id="updateTipeMobil" name="tipe_mobil" required>
                            <option value="sedan">Sedan</option>
                            <option value="hatchback">Hatchback</option>
                            <option value="suv">SUV</option>
                            <option value="supercar">Super car</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="updateDeskripsiMobil" class="form-label">Car Description Overview</label>
                        <textarea class="form-control" id="updateDeskripsiMobil" name="deskripsi_mobil" rows="3" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="updateCarPrice" class="form-label">Car Price (Rp)</label>
                            <input type="number" class="form-control" id="updateCarPrice" name="carPrice" required>
                        </div>
                        <div class="col mb-3">
                            <label for="updateStokMobil" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="updateStokMobil" name="stok_mobil" required>
                        </div>
                    </div>
                    <input type="hidden" name="action" value="updateCar">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Car</button>
                </div>
            </form>
        </div>
    </div>
</div>