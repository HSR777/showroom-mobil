<div class="modal fade" id="addCarModal" tabindex="-1" aria-labelledby="addCarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCarModalLabel">Add New Car</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../../logics/admin/crud-mobil.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_mobil" class="form-label">Car Name</label>
                        <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" placeholder="Enter car name" required>
                    </div>
                    <div class="mb-3">
                        <label for="merek_mobil" class="form-label">Car Brand</label>
                        <select class="form-select" name="merek_mobil" id="merek_mobil" required>
                            <option value="" disabled selected>Select car brand</option>
                            <option value="bmw">BMW</option>
                            <option value="ferrari">Ferrari</option>
                            <option value="lamborghini">Lamborghini</option>
                            <option value="mercedes">Mercedes-Benz</option>
                            <option value="porsche">Porsche</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tipe_mobil" class="form-label">Car Type</label>
                        <select class="form-select" id="tipe_mobil" name="tipe_mobil" required>
                            <option value="" disabled selected>Select car type</option>
                            <option value="sedan">Sedan</option>
                            <option value="hatchback">Hatchback</option>
                            <option value="suv">SUV</option>
                            <option value="supercar">Super car</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_mobil" class="form-label">Car Description Overview</label>
                        <textarea class="form-control" id="deskripsi_mobil" name="deskripsi_mobil" rows="3" placeholder="Enter a brief description of the car" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="carPrice" class="form-label">Car Price (Rp)</label>
                            <input type="number" class="form-control" id="carPrice" name="carPrice" placeholder="Enter car price" required>
                        </div>
                        <div class="col mb-3">
                            <label for="stok_mobil" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stok_mobil" name="stok_mobil" placeholder="Enter car stock" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="gambar_mobil" class="form-label">Main Car Image</label>
                        <input type="file" class="form-control" id="gambar_mobil" name="gambar_mobil" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar_mobil_overview" class="form-label">Overview Car Image</label>
                        <input type="file" class="form-control" id="gambar_mobil_overview" name="gambar_mobil_overview" accept="image/*" required>
                    </div>
                    <input type="hidden" name="action" value="addCar">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Car</button>
                </div>
            </form>
        </div>
    </div>
</div>