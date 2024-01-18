<!-- add address  modal -->
<div class="modal fade" id="exampleModalgrid1" tabindex="-1" aria-labelledby="exampleModalgridLabel1" aria-modal="true">
    <form action="{{ route('app.pos.storeCustomer') }}" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel1">Adresa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3" id="guest-form">
                        <div class="col-xxl-12">
                            <div>
                                <label for="name" class="form-label">{{__('Emri')}}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Emri dhe mbiemri">
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="country_id" class="form-label">{{__('Shteti')}}</label>
                                <select name="country_id"  class="form-control">
                                    <option value="">Zgjidhni...</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="city_id" class="form-label">{{__('Qyteti')}}</label>
                                <select name="city_id"  class="form-control">
                                    <option value="">Zgjidhni...</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-12">
                            <div>
                                <label for="address" class="form-label">{{__('Adresa')}}<span class="text-danger">*</span></label>
                                <textarea type="text" class="form-control" id="address" name="address" placeholder="Adresa e Plotë"></textarea>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="phone" class="form-label">{{ __('Numër Telefoni') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" name="mobile" placeholder="+355 6x xxx xxxx">
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="emailInput" class="form-label">{{ __('Email') }}</label>
                                <input type="email" class="form-control" name="email" id="emailInput" placeholder="jane.doe@email.com">
                            </div>
                        </div>

                    </div><!--end row-->
                    <div class="row g-3 pt-2">
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Mbyll</button>
                                <button type="submit" name="submit" class="btn btn-primary">Ruaj</button>
                            </div>
                        </div><!--end col-->
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

