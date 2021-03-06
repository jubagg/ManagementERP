{{-- Marca --}}
<div class="col-4">
    <div class="form-group">
      <label for="artmar">Marca de artículo</label>
      <div class="input-group">
        <select class="form-control" name="artmar" id="artmar">
            <option value="">Seleccionar</option>
            @foreach($marca as $m)
            <option value="{{$m->mid}}" {{ ($articulo->artmarca == $m->mid &&  !old('artmarca')) ? 'selected' : ($m->mid == old('artmarca') ? 'selected' : '') }} >{{$m->mdesc}}</option>
            @endforeach
        </select>
        <div class="input-group-append">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalArtMarca" href="#modalArtMarca">
                 <i class="fas fa-plus fa-fw"></i>
            </button>
        </div>
      </div>
    </div>
</div>
{{-- Familia --}}
<div class="col-4">
    <div class="form-group">
      <label for="artfam">Familia de artículo</label>
      <div class="input-group">
        <select class="form-control" name="artfam" id="artfam">
            <option value="">Seleccionar</option>
            @foreach($familia as $f)
            <option value="{{$f->afid}}" {{ ($articulo->artfam == $f->afid &&  !old('artfam')) ? 'selected' : ($f->afid == old('artfam') ? 'selected' : '') }} >{{$f->afdesc}}</option>
            @endforeach
        </select>
        <div class="input-group-append">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalArtFamilia" href="#modalArtFamilia">
                 <i class="fas fa-plus fa-fw"></i>
            </button>
        </div>
      </div>
    </div>
</div>
{{-- Subfamilia --}}
<div class="col-4">
    <div class="form-group">
      <label for="artsubfam">Subfamilia de artículo</label>
      <div class="input-group">
        <select class="form-control" name="artsubfam" id="artsubfam">
            <option value="">Seleccionar</option>
            @foreach($subfamilia as $sf)
            <option value="{{$sf->sfid}}" {{ ($articulo->artsubfam == $sf->sfid &&  !old('artsubfam')) ? 'selected' : ($sf->sfid == old('artsubfam') ? 'selected' : '') }}>{{$sf->sfdesc}}</option>
            @endforeach
        </select>
        <div class="input-group-append">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalArtSubfamilia" href="#modalArtSubfamilia">
                 <i class="fas fa-plus fa-fw"></i>
            </button>
        </div>
      </div>
    </div>
</div>
