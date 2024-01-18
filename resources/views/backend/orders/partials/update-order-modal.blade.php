<div class="modal fade" id="updateOrderModal" data-bs-backdrop="static"
     data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateOrderModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" id="waitDialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateOrderModalLabel">Detajet e
                    Porosisë për Adex</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid px-0">
                    <div class="row mb-2">
                        <div class="col-6">
                            <label for="">Emër Mbiemër</label>
                            <input type="text" name=""
                                   value="{{ $order->name }}"
                                   class="form-control" disabled>
                        </div>
                        <div class="col-6">
                            <label for="">Adresa</label>
                            <input type="text" name=""
                                   value="{{ $order->address }}"
                                   class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label for="">Qyteti</label>
                            <input type="text" name=""
                                   value="{{ $order->city->name }}"
                                   class="form-control" disabled>
                        </div>
                        <div class="col-6">
                            <label for="">Shteti</label>
                            <input type="text" name=""
                                   value="{{ $order->country->name }}"
                                   class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label for="">Nr. Telefoni</label>
                            <input type="text" name=""
                                   value="{{ $order->mobile }}"
                                   class="form-control" disabled>
                        </div>
                        <div class="col-6">
                            <label for="">Email</label>
                            <input type="text" name=""
                                   value="{{ $order->email }}"
                                   class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label for="">Zip Kodi</label>
                            <input type="text" name=""
                                   value="{{ $order->zipcode }}"
                                   class="form-control" disabled>
                        </div>
                        <div class="col-6">
                            <label for="">Vlera e transportit</label>
                            <input type="text" name=""
                                   value="{{ $order->shipping_charges }}"
                                   class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label for="">Totali i faturës</label>
                            <input type="text" name=""
                                   value="{{ $order->grant_total }}"
                                   class="form-control" disabled>
                        </div>
                        <div class="col-6">
                            <label for="">Monedha</label>
                            <input type="text" name="" value="Lek"
                                   class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label for="">Pesha</label>
                            <input type="text" name="weight" placeholder="Pesha"
                                   class="form-control"
                                   value="0">
                        </div>
                        <div class="col-6">
                            <label for="">Copë</label>
                            <input type="number" name="pieces"
                                   placeholder="Copë" class="form-control"
                                   value="0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Anullo
                </button>
                <button type="submit" class="btn btn-primary">Dërgo Porosinë</button>
            </div>
        </div>
    </div>
</div>
