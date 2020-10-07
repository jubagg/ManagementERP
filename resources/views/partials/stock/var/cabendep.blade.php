<div id="endepos">
    {{-- Movimiento entre deposito --}}
    <legend>Movimiento entre depositos</legend>
    <div class="form-row">
        {{-- Dep origen --}}
        <div class="col-3">
            <div class="form-group">
                <label for="depori">Depósito origen</label>
                <select class="form-control" name="depori" id="depori">
                    <option>Seleccionar</option>
                    @foreach(Depositos::getDepositos() as $dep)
                    <option value="{{$dep->depid}}">{{$dep->depid.' | '.$dep->depdesc}} </option>
                @endforeach
                </select>
            </div>
        </div>
        {{-- Deposito destino --}}
        <div class="col-3">
            <div class="form-group">
                <label for="depdes">Depósito destino</label>
                <select class="form-control" name="depdes" id="depdes">
                    <option>Seleccionar</option>
                    @foreach(Depositos::getDepositos() as $dep)
                    <option value="{{$dep->depid}}">{{$dep->depid.' | '.$dep->depdesc}} </option>
                @endforeach
                </select>
            </div>
        </div>
        {{-- Fecha movimiento --}}
        <div class="col-2">
            <div class="form-group">
                <label for="fecmovint">Fecha comprobante</label>
                <input type="date" class="form-control" name="fecmovint" id="fecmovint" aria-describedby="helpId" placeholder="">
            </div>
        </div>
    </div>
</div>
