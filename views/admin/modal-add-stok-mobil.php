<div class="modal fade" id="addStockModal" tabindex="-1" aria-labelledby="addStockModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStockModalLabel">Add New Stock Car</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../logics/admin/crud-mobil.php" method="POST">
                    <input type="hidden" class="form-control" id="addStock_mobil_id" name="mobil_id" required>
                    <div class="mb-3">
                        <label for="addStock_nama_mobil" class="form-label">Car Name (preview only)</label>
                        <input type="text" id="addStock_nama_mobil" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="addStock_stok_sebelumnya" class="form-label">Stok Sebelumnya (preview)</label>
                        <input type="text" id="addStock_stok_sebelumnya" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="addStock_stok_mobil" class="form-label">Tambah Stok Mobil</label>
                        <input type="number" class="form-control" id="addStock_stok_mobil" name="stok_mobil" required>
                    </div>
                    <input type="hidden" name="action" value="addStock">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>