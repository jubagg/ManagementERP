{{-- Comprobante --}}
<div class="form-row">
    <div class="col-3">
        <div class="form-group">
            <label for="tipcom">Tipo comprobante</label>
            <select class="form-control" name="tipcom" id="tipcom">
                <option>Seleccionar</option>
                @foreach(TiposC::getComprobantes() as $tc)
                    <option value="{{$tc->comid}}" {{$tc->comid == '091' ? 'selected' : ''}}>{{$tc->comid.' | '.$tc->comdesc}} </option>
                @endforeach
            </select>
        </div>
    </div>
    {{-- Deposito --}}
    <div class="col-3">
        <div class="form-group">
            <label for="deposito">Deposito</label>
            <select class="form-control" name="deposito" id="deposito">
                <option>Seleccionar</option>
                @foreach(Depositos::getDepositos() as $dep)
                    <option value="{{$dep->depid}}">{{$dep->depid.' | '.$dep->depdesc}} </option>
                @endforeach
            </select>
        </div>
    </div>
    {{-- Centro emisor --}}
    <div class="col-1">
        <div class="form-group">
            <label for="cememisor">C. Emisor</label>
            <input type="text" class="form-control" name="cememisor" id="cememisor" aria-describedby="helpId" placeholder="">
        </div>
    </div>
    {{-- Num comprobante --}}
    <div class="col-2">
        <div class="form-group">
            <label for="numcom">Núm. Comprobante</label>
            <input type="text" class="form-control" name="numcom" id="numcom" aria-describedby="helpId" placeholder="">
        </div>
    </div>
    {{-- Fecha movimiento --}}
    <div class="col-2">
        <div class="form-group">
            <label for="fecmov">Fecha movimiento</label>
            <input type="date" class="form-control" name="fecmov" id="fecmov" aria-describedby="helpId" placeholder="">
        </div>
    </div>
</div>
