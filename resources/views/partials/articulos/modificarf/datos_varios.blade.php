{{-- fecha de creacion --}}
<div class="col-3">
    <div class="form-group">
        <label for="artfecalt">Fecha creación</label>
        <div class="input-group">
            <input type="date" name="artfecalt" id="artfecalt" value="{{$articulo->artfeccre}}" class="form-control" placeholder="" aria-describedby="helpId" readonly>
        </div>
    </div>
</div>
{{-- fecha de modificacion --}}
<div class="col-3">
    <div class="form-group">
        <label for="artfecmod">Fecha de modificación</label>
        <div class="input-group">
            <input type="text" name="artfecmod" id="artfecmod" value="{{$articulo->artfecmod}}" class="form-control" placeholder="" aria-describedby="helpId" readonly>
        </div>
    </div>
</div>
{{-- fecha de baja  --}}
<div class="col-3">
    <div class="form-group">
        <label for="artfecbaj">Fecha de baja</label>
        <div class="input-group">
            <input type="text" name="artfecbaj" id="artfecbaj" value="{{ $articulo->artfecdes}}" class="form-control" placeholder="" aria-describedby="helpId" readonly>
        </div>
    </div>
</div>
